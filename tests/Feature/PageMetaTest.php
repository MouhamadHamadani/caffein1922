<?php

namespace Tests\Feature;

use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PageMetaTest extends TestCase
{
    use RefreshDatabase;

    public static function pages(): array
    {
        return [
            'home' => ['/', 'Caffeine 1922 — Coffee Roasted in Beirut Since 1922'],
            'menu' => ['/menu', 'Menu — Caffeine 1922'],
            'about' => ['/about', 'Our Story — Caffeine 1922'],
            'gallery' => ['/gallery', 'Gallery — Caffeine 1922'],
            'reserve' => ['/reserve', 'Reserve a Table — Caffeine 1922'],
            'blog' => ['/blog', 'Blog — Caffeine 1922'],
            'contact' => ['/contact', 'Contact Us — Caffeine 1922'],
        ];
    }

    #[DataProvider('pages')]
    public function test_each_page_renders_exactly_one_unique_title_and_description(string $uri, string $title): void
    {
        $html = $this->get($uri)->assertOk()->getContent();

        $this->assertSame(1, substr_count($html, '<title>'), "Expected exactly one <title> on {$uri}");
        $this->assertStringContainsString("<title>{$title}</title>", $html);
        $this->assertMatchesRegularExpression('/<meta name="description" content="[^"]{20,}">/', $html);
    }

    public function test_every_page_offers_a_skip_to_content_link(): void
    {
        $html = $this->get('/')->assertOk()->getContent();

        $this->assertStringContainsString('href="#main-content"', $html);
        $this->assertStringContainsString('id="main-content"', $html);
    }

    public function test_the_mobile_menu_toggle_is_labelled_and_reports_its_state(): void
    {
        $html = $this->get('/')->assertOk()->getContent();

        $this->assertStringContainsString('aria-expanded="false"', $html);
        $this->assertStringContainsString('aria-controls="mobile-menu"', $html);
        $this->assertStringContainsString('aria-label="Open main menu"', $html);
    }

    public function test_it_publishes_local_business_structured_data_from_settings(): void
    {
        Setting::create(['key' => 'phone', 'value' => '+961 3 113 169', 'group' => 'contact']);
        Setting::create(['key' => 'address_en', 'value' => 'Mar Elias, Beirut, Lebanon', 'group' => 'contact']);
        Setting::create(['key' => 'opening_hours_schema', 'value' => 'Mo-Sa 07:00-23:59, Su 11:00-23:59', 'group' => 'hours']);

        $html = $this->get('/')->assertOk()->getContent();

        $this->assertStringContainsString('application/ld+json', $html);
        $this->assertStringContainsString('CafeOrCoffeeShop', $html);
        $this->assertStringContainsString('+961 3 113 169', $html);
        $this->assertStringContainsString('Mar Elias, Beirut, Lebanon', $html);
        $this->assertStringContainsString('Mo-Sa 07:00-23:59', $html);
        $this->assertStringContainsString('Su 11:00-23:59', $html);
    }

    public function test_the_footer_hides_social_links_that_are_not_configured(): void
    {
        Setting::create(['key' => 'facebook', 'value' => 'https://facebook.com/caffeine1922', 'group' => 'social']);
        Setting::create(['key' => 'instagram', 'value' => '', 'group' => 'social']);

        $html = $this->get('/')->assertOk()->getContent();

        $this->assertStringContainsString('https://facebook.com/caffeine1922', $html);
        $this->assertStringNotContainsString('>Instagram</a>', $html);
    }

    public function test_the_footer_shows_a_whatsapp_link_built_from_the_phone_setting(): void
    {
        Setting::create(['key' => 'phone', 'value' => '+961 3 113 169', 'group' => 'contact']);

        $html = $this->get('/')->assertOk()->getContent();

        $this->assertStringContainsString('https://wa.me/9613113169', $html);
    }

    public function test_the_footer_omits_whatsapp_when_no_phone_is_configured(): void
    {
        $html = $this->get('/')->assertOk()->getContent();

        $this->assertStringNotContainsString('wa.me', $html);
    }
}
