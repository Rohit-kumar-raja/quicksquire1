<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class MegaMenuComponent extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.mega-menu-component', ['categories' => $categories])->layout('layouts.base');
    }
}
