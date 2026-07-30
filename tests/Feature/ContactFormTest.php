<?php

namespace Tests\Feature;

use App\Livewire\Contact;
use App\Mail\ContactAcknowledgement;
use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Mail::fake();
        config(['mail.admin_address' => 'owner@example.test']);
    }

    private function validPayload(): array
    {
        return [
            'name' => 'Karim Nasr',
            'email' => 'karim@example.test',
            'phone' => '+961 3 999 888',
            'subject' => 'Private event',
            'message' => 'Do you host private events on Sundays?',
        ];
    }

    /** Mount, then wait long enough to look human. */
    private function openForm()
    {
        $component = Livewire::test(Contact::class);

        $this->travel(5)->seconds();

        return $component;
    }

    public function test_it_stores_the_message_and_queues_both_emails(): void
    {
        $this->openForm()
            ->set($this->validPayload())
            ->call('submit')
            ->assertHasNoErrors();

        $this->assertDatabaseCount('contact_messages', 1);

        Mail::assertQueued(ContactMessageReceived::class, fn ($mail) => $mail->hasTo('owner@example.test'));
        Mail::assertQueued(ContactAcknowledgement::class, fn ($mail) => $mail->hasTo('karim@example.test'));
    }

    public function test_it_skips_the_owner_email_when_no_admin_address_is_configured(): void
    {
        config(['mail.admin_address' => null]);

        $this->openForm()
            ->set($this->validPayload())
            ->call('submit')
            ->assertHasNoErrors();

        Mail::assertQueued(ContactAcknowledgement::class);
        Mail::assertNotQueued(ContactMessageReceived::class);
    }

    public function test_a_filled_honeypot_is_rejected_silently(): void
    {
        $this->openForm()
            ->set($this->validPayload())
            ->set('website', 'http://spam.example')
            ->call('submit')
            ->assertHasNoErrors();

        $this->assertDatabaseCount('contact_messages', 0);
        Mail::assertNothingQueued();
    }

    public function test_a_submission_faster_than_a_human_is_rejected_silently(): void
    {
        Livewire::test(Contact::class)
            ->set($this->validPayload())
            ->call('submit')
            ->assertHasNoErrors();

        $this->assertDatabaseCount('contact_messages', 0);
        Mail::assertNothingQueued();
    }

    public function test_it_rate_limits_submissions_from_the_same_ip(): void
    {
        $component = Livewire::test(Contact::class);

        for ($i = 0; $i < 5; $i++) {
            $this->travel(5)->seconds();
            $component->set($this->validPayload())->call('submit')->assertHasNoErrors();
        }

        $this->travel(5)->seconds();
        $component->set($this->validPayload())
            ->call('submit')
            ->assertHasErrors('form');

        $this->assertDatabaseCount('contact_messages', 5);
    }

    public function test_both_contact_mailables_render(): void
    {
        $message = ContactMessage::create($this->validPayload());

        $this->assertStringContainsString('Karim Nasr', (new ContactMessageReceived($message))->render());
        $this->assertStringContainsString('Karim Nasr', (new ContactAcknowledgement($message))->render());
    }
}
