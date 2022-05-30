<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Exception;
use Illuminate\Http\Request;
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

    public function storeCategory(Request $request)
    {
        try {
            $category = new Category();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->save();
            session()->flash('message', 'Category Has Been Successfully');
            return redirect()->route('admin.categories');
        } catch (Exception $e) {
            session()->flash('message', $e->getMessage());
            return redirect()->route('admin.addcategory');
        }
    }
    public function render()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('livewire.admin.category.admin-add-category-component', ['categories' => $categories, 'subcategories' => $subcategories])->layout('layouts.dashboard');
    }
}
