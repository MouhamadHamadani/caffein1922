<?php

namespace App\Livewire;

use App\Models\GalleryAlbum as Album;
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

        return view('livewire.gallery-album', [
            'album' => $album,
            'photos' => $photos,
        ])->layout('layouts.app');
    }
}
