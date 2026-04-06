<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Artesaos\SEOTools\Facades\SEOTools;

class BlogPost extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $post = Post::published()->where('slug', $this->slug)->firstOrFail();
        
        SEOTools::setTitle($post->translated_title);
        SEOTools::setDescription($post->translated_excerpt);

        return view('livewire.blog-post', ['post' => $post])->layout('layouts.app');
    }
}
