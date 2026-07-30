<?php

namespace App\Livewire;

use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithPagination;

    public function render()
    {
        SEOTools::setTitle(__('site.seo.blog.title'), false);
        SEOTools::setDescription(__('site.seo.blog.description'));

        $posts = Post::published()->with(['user', 'media'])->paginate(12);

        return view('livewire.blog', ['posts' => $posts])->layout('layouts.app');
    }
}
