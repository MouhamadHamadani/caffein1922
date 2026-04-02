<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            ['author_name' => 'Google Reviewer', 'content' => 'Great authentic coffee spot with lovely decoration, super friendly service, and a strong caffeine dose. Highly recommended for coffee lovers.', 'rating' => 5, 'source' => 'google', 'is_featured' => true],
            ['author_name' => 'Google Reviewer', 'content' => 'One of the best coffee tasting experiences in Lebanon. I hope to come back soon and have the same welcoming smile and coffee taste.', 'rating' => 5, 'source' => 'google', 'is_featured' => true],
            ['author_name' => 'Google Reviewer', 'content' => 'This little coffee shop is an absolute gem. The atmosphere is cozy and welcoming, making it the perfect spot to relax or catch up with friends. The drinks are expertly crafted and full of flavor.', 'rating' => 5, 'source' => 'google', 'is_featured' => true],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
