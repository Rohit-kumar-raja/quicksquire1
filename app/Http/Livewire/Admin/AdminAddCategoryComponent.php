<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subcategory2;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{

    public $name;
    public $slug;
    public $category_id;
    public $subcategory_id;

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        // if ($this->category_id) {
        //     $category = new Subcategory();
        //     $category->name = $this->name;
        //     $category->slug = $this->slug;
        //     $category->category_id = $this->category_id;
        //     $category->save();
        // } else {
        //     $category = new Category();
        //     $category->name = $this->name;
        //     $category->slug = $this->slug;
        //     $category->save();
        // }

        // if ($this->category_id) {
        //     $subcategory = new Subcategory2();
        //     $subcategory->name = $this->name;
        //     $subcategory->slug = $this->slug;
        //     $subcategory->subcategory_id = $this->subcategory_id;
        //     $subcategory->save();
        // } else {
        //     $subcategory = new Subcategory();
        //     $subcategory->name = $this->name;
        //     $subcategory->slug = $this->slug;
        //     $subcategory->save();
        // }

        if ($this->category_id) {
            $scategory = new Subcategory();
            $scategory->name = $this->name;
            $scategory->slug = $this->slug;
            $scategory->category_id = $this->category_id;
            $scategory->save();
        } else {
            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            //$category->category_id = $this->category_id;
            $category->save();
        }




        session()->flash('message', 'Category Has Been Added Successfully');
    }
    public function render()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('livewire.admin.admin-add-category-component', ['categories' => $categories, 'subcategories' => $subcategories])->layout('layouts.dashboard');
    }
}
