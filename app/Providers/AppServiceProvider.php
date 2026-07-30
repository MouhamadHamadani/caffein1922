<?php

namespace App\Providers;

use App\Models\Setting;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(125);

        // Business-level structured data for every public page.
        View::composer('layouts.app', fn () => $this->shareStructuredData());
    }

    private function shareStructuredData(): void
    {
        $locale = app()->getLocale();

        JsonLd::setType('CafeOrCoffeeShop');
        JsonLd::setTitle('Caffeine 1922');
        JsonLd::setDescription(
            Setting::get('meta_desc_'.$locale) ?: Setting::get('tagline_'.$locale)
        );
        JsonLd::setUrl(route('home'));

        if ($phone = Setting::get('phone')) {
            JsonLd::addValue('telephone', $phone);
        }

        if ($address = Setting::get('address_'.$locale)) {
            JsonLd::addValue('address', [
                '@type' => 'PostalAddress',
                'streetAddress' => $address,
                'addressLocality' => 'Beirut',
                'addressCountry' => 'LB',
            ]);
        }

        // Stored as a schema.org-formatted string, e.g. "Mo-Sa 07:00-23:59, Su 11:00-23:59".
        if ($hours = Setting::get('opening_hours_schema')) {
            JsonLd::addValue('openingHours', array_values(array_filter(array_map('trim', explode(',', $hours)))));
        }

        $social = array_values(array_filter([Setting::get('facebook'), Setting::get('instagram')]));

        if ($social) {
            JsonLd::addValue('sameAs', $social);
        }
    }
}
