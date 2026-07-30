<?php

namespace Tests\Feature;

use App\Livewire\Reservations;
use App\Mail\ReservationConfirmation;
use App\Mail\ReservationReceived;
use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class ReservationFormTest extends TestCase
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
            'name' => 'Layla Haddad',
            'email' => 'layla@example.test',
            'phone' => '+961 3 123 456',
            'party_size' => 4,
            'date' => now()->addDays(3)->toDateString(),
            'time_slot' => '18:30',
            'notes' => 'Window table please.',
        ];
    }

    /** Mount, then wait long enough to look human. */
    private function openForm()
    {
        $component = Livewire::test(Reservations::class);

        $this->travel(5)->seconds();

        return $component;
    }

    public function test_it_stores_the_reservation_and_queues_both_emails(): void
    {
        $this->openForm()
            ->set($this->validPayload())
            ->call('submit')
            ->assertHasNoErrors();

        $this->assertDatabaseCount('reservations', 1);

        Mail::assertQueued(ReservationReceived::class, fn ($mail) => $mail->hasTo('owner@example.test'));
        Mail::assertQueued(ReservationConfirmation::class, fn ($mail) => $mail->hasTo('layla@example.test'));
    }

    public function test_it_skips_the_owner_email_when_no_admin_address_is_configured(): void
    {
        config(['mail.admin_address' => null]);

        $this->openForm()
            ->set($this->validPayload())
            ->call('submit')
            ->assertHasNoErrors();

        Mail::assertQueued(ReservationConfirmation::class);
        Mail::assertNotQueued(ReservationReceived::class);
    }

    public function test_a_filled_honeypot_is_rejected_silently(): void
    {
        $this->openForm()
            ->set($this->validPayload())
            ->set('website', 'http://spam.example')
            ->call('submit')
            ->assertHasNoErrors();

        $this->assertDatabaseCount('reservations', 0);
        Mail::assertNothingQueued();
    }

    public function test_a_submission_faster_than_a_human_is_rejected_silently(): void
    {
        Livewire::test(Reservations::class)
            ->set($this->validPayload())
            ->call('submit')
            ->assertHasNoErrors();

        $this->assertDatabaseCount('reservations', 0);
        Mail::assertNothingQueued();
    }

    public function test_it_rate_limits_submissions_from_the_same_ip(): void
    {
        $component = Livewire::test(Reservations::class);

        for ($i = 0; $i < 5; $i++) {
            $this->travel(5)->seconds();
            $component->set($this->validPayload())->call('submit')->assertHasNoErrors();
        }

        $this->travel(5)->seconds();
        $component->set($this->validPayload())
            ->call('submit')
            ->assertHasErrors('form');

        $this->assertDatabaseCount('reservations', 5);
    }

    public function test_both_reservation_mailables_render(): void
    {
        $reservation = Reservation::create($this->validPayload());

        $this->assertStringContainsString('Layla Haddad', (new ReservationReceived($reservation))->render());
        $this->assertStringContainsString('Layla Haddad', (new ReservationConfirmation($reservation))->render());
    }
}
