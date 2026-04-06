<?php

namespace App\Livewire;

use App\Models\GalleryAlbum;
use Livewire\Component;

class Gallery extends Component
{
    public function render()
    {
        $albums = GalleryAlbum::where('is_active', true)->orderBy('order')->get();
        return view('livewire.gallery', ['albums' => $albums])->layout('layouts.app');
    }
}
