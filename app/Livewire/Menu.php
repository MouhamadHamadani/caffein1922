<?php

namespace App\Livewire;

use App\Models\MenuCategory;
use Livewire\Component;

class Menu extends Component
{
    public function render()
    {
        $categories = MenuCategory::active()
            ->with(['menuItems' => fn($q) => $q->available()->ordered()->with('media')])
            ->get();

        return view('livewire.menu', [
            'categories' => $categories,
        ])->layout('layouts.app');
    }
}
