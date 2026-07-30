<?php

namespace App\Livewire;

use App\Models\MenuItem;
use App\Models\Testimonial;
use App\Models\GalleryPhoto;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        SEOTools::setTitle(__('site.seo.home.title'), false);
        SEOTools::setDescription(__('site.seo.home.description'));

        $featuredItems = MenuItem::featured()->available()->with('media')->take(6)->get();
        $testimonials = Testimonial::featured()->take(5)->get();
        $galleryPhotos = GalleryPhoto::with('media')->latest()->take(6)->get();

        return view('livewire.home', [
            'featuredItems' => $featuredItems,
            'testimonials' => $testimonials,
            'galleryPhotos' => $galleryPhotos,
        ])->layout('layouts.app');
    }
}
