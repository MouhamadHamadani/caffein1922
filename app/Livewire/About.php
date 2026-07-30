<?php

namespace App\Livewire;

use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class About extends Component
{
    public function render()
    {
        SEOTools::setTitle(__('site.seo.about.title'), false);
        SEOTools::setDescription(__('site.seo.about.description'));

        return view('livewire.about')->layout('layouts.app');
    }
}
