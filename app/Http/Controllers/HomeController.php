<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Testimonial;
use App\Models\GalleryPhoto;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $featuredItems = MenuItem::featured()->available()->with('media')->take(6)->get();
        $testimonials = Testimonial::featured()->take(5)->get();
        $galleryPhotos = GalleryPhoto::with('media')->latest()->take(6)->get();
        
        return view('home.index', compact('featuredItems', 'testimonials', 'galleryPhotos'));
    }
}
