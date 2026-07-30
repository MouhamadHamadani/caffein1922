<?php

namespace App\Livewire;

use App\Models\GalleryAlbum;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class Gallery extends Component
{
    public function render()
    {
        SEOTools::setTitle(__('site.seo.gallery.title'), false);
        SEOTools::setDescription(__('site.seo.gallery.description'));

        $albums = GalleryAlbum::where('is_active', true)->orderBy('order')->get();

        return view('livewire.gallery', ['albums' => $albums])->layout('layouts.app');
    }
}
