<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOTools;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()->with(['user', 'media'])->paginate(12);
        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();
        
        SEOTools::setTitle($post->translated_title);
        SEOTools::setDescription($post->translated_excerpt);
        
        return view('blog.show', compact('post'));
    }
}
