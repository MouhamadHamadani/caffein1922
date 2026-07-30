<?php
/**
 * @see https://github.com/artesaos/seotools
 *
 * Per-page values are set from the Livewire components; these are the
 * fallbacks used when a page does not set its own.
 */

return [
    'inertia' => env('SEO_TOOLS_INERTIA', false),
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => 'Caffeine 1922', // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'A Beirut coffee institution since 1922 — specialty roasts, all-day food and a table waiting for you.', // set false to total remove
            'separator'    => ' — ',
            'keywords'     => ['coffee', 'Beirut', 'cafe', 'Caffeine 1922', 'specialty coffee'],
            'canonical'    => 'full', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => 'index,follow', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => env('SEO_GOOGLE_SITE_VERIFICATION'),
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Caffeine 1922', // set false to total remove
            'description' => 'A Beirut coffee institution since 1922 — specialty roasts, all-day food and a table waiting for you.', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'website',
            'site_name'   => 'Caffeine 1922',
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary_large_image',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Caffeine 1922', // set false to total remove
            'description' => 'A Beirut coffee institution since 1922 — specialty roasts, all-day food and a table waiting for you.', // set false to total remove
            'url'         => 'full', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'CafeOrCoffeeShop',
            'images'      => [],
        ],
    ],
];
