<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use Illuminate\Database\Seeder;

class MenuCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => ['en' => 'Espresso Drinks', 'ar' => 'مشروبات إسبريسو'], 'order' => 1],
            ['name' => ['en' => 'Cold Brew', 'ar' => 'كولد برو'], 'order' => 2],
            ['name' => ['en' => 'Specialty Coffee', 'ar' => 'قهوة مختصة'], 'order' => 3],
            ['name' => ['en' => 'Hot Drinks', 'ar' => 'مشروبات ساخنة'], 'order' => 4],
            ['name' => ['en' => 'Cold Drinks', 'ar' => 'مشروبات باردة'], 'order' => 5],
            ['name' => ['en' => 'Food', 'ar' => 'طعام'], 'order' => 6],
        ];

        foreach ($categories as $category) {
            MenuCategory::create($category);
        }
    }
}
