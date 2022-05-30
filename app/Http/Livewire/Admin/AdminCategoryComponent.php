<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    public function deleteCategory($id)
    {
        DB::table('categories')->delete($id);

        session()->flash('message', 'Category Has Been Deleted Successfully!!');
        return redirect()->back();
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.category.admin-category-component', ['categories' => $categories])->layout('layouts.dashboard');
    }
}
