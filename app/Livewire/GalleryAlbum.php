<?php

namespace App\Livewire;

use App\Models\GalleryAlbum as Album;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;
use Livewire\WithPagination;

class GalleryAlbum extends Component
{
    use WithPagination;

    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $album = Album::where('slug', $this->slug)->where('is_active', true)->firstOrFail();
        $photos = $album->galleryPhotos()->paginate(24);

        SEOTools::setTitle($album->translated_title);
        SEOTools::setDescription(__('site.seo.gallery_album.description', ['album' => $album->translated_title]));

        return view('livewire.gallery-album', [
            'album' => $album,
            'photos' => $photos,
        ])->layout('layouts.app');
    }
}
