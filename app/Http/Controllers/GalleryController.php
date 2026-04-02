<?php

namespace App\Http\Controllers;

use App\Models\GalleryAlbum;
use App\Models\GalleryPhoto;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = GalleryAlbum::where('is_active', true)
            ->orderBy('order')
            ->with(['galleryPhotos.media'])
            ->get();
            
        return view('gallery.index', compact('albums'));
    }

    public function album($slug)
    {
        $album = GalleryAlbum::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $photos = $album->galleryPhotos()->paginate(24);
        
        return view('gallery.album', compact('album', 'photos'));
    }
}
