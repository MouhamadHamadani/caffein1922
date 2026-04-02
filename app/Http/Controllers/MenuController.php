<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;

class MenuController extends Controller
{
    public function index()
    {
        $categories = MenuCategory::active()
            ->with(['menuItems' => fn($q) => $q->available()->ordered()->with('media')])
            ->get();
            
        return view('menu.index', compact('categories'));
    }
}
