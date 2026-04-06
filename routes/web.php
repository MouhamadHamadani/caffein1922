<?php

use App\Http\Controllers\LanguageController;
use App\Livewire\About;
use App\Livewire\Blog;
use App\Livewire\BlogPost;
use App\Livewire\Contact;
use App\Livewire\Gallery;
use App\Livewire\GalleryAlbum;
use App\Livewire\Home;
use App\Livewire\Menu;
use App\Livewire\Reservations;
use Illuminate\Support\Facades\Route;

Route::get('/lang/{locale}', [LanguageController::class, 'switch'])
    ->name('lang.switch')
    ->whereIn('locale', ['en', 'ar']);

Route::get('/', Home::class)->name('home');
Route::get('/menu', Menu::class)->name('menu');
Route::get('/about', About::class)->name('about');
Route::get('/gallery', Gallery::class)->name('gallery');
Route::get('/gallery/{slug}', GalleryAlbum::class)->name('gallery.album');
Route::get('/reserve', Reservations::class)->name('reserve');
Route::get('/blog', Blog::class)->name('blog');
Route::get('/blog/{slug}', BlogPost::class)->name('blog.show');
Route::get('/contact', Contact::class)->name('contact');
