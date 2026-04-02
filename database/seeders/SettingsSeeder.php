<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'phone',        'value' => '+961 3 113 169', 'group' => 'contact'],
            ['key' => 'address_en',   'value' => 'Mar Elias, Beirut, Lebanon', 'group' => 'contact'],
            ['key' => 'address_ar',   'value' => 'مار الياس، بيروت، لبنان', 'group' => 'contact'],
            ['key' => 'facebook',     'value' => 'https://www.facebook.com/caffeine1922', 'group' => 'social'],
            ['key' => 'instagram',    'value' => '', 'group' => 'social'],
            ['key' => 'google_maps',  'value' => 'https://maps.app.goo.gl/M4GbRKwp1ykTE9NC9', 'group' => 'contact'],
            ['key' => 'hours_en',     'value' => "Mon–Sat: 7:00 AM – 12:00 AM\nSunday: 11:00 AM – 12:00 AM", 'group' => 'hours'],
            ['key' => 'hours_ar',     'value' => "الاثنين–السبت: ٧ص – ١٢م\nالأحد: ١١ص – ١٢م", 'group' => 'hours'],
            ['key' => 'rating',       'value' => '4.5', 'group' => 'general'],
            ['key' => 'reviews_count','value' => '349', 'group' => 'general'],
            ['key' => 'tagline_en',   'value' => 'Roasted with passion since 1922', 'group' => 'general'],
            ['key' => 'tagline_ar',   'value' => 'محمّص بشغف منذ ١٩٢٢', 'group' => 'general'],
            ['key' => 'meta_desc_en', 'value' => 'Caffeine 1922 — specialty coffee shop and roastery in Mar Elias, Beirut. Authentic coffee experience since 1922.', 'group' => 'seo'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
