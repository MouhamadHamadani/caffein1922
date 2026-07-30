<?php

namespace App\Livewire;

use App\Models\MenuCategory;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class Menu extends Component
{
    public function render()
    {
        SEOTools::setTitle(__('site.seo.menu.title'), false);
        SEOTools::setDescription(__('site.seo.menu.description'));

        $categories = MenuCategory::active()
            ->with(['menuItems' => fn($q) => $q->available()->ordered()->with('media')])
            ->get();

        return view('livewire.menu', [
            'categories' => $categories,
        ])->layout('layouts.app');
    }
}
