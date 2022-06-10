<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $subcategories = Subcategory::orderBy('id','DESC')->get();
        $categories = Category::all();

        return view('livewire.admin.SubCategory.index', ['subcategories' => $subcategories,'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->slug = str_replace(' ', '-', $request->slug);
        DB::table('subcategories')->insert($request->except('_token'));
        session()->flash('message', 'Subcategory has been added successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categores = Category::all();
        $subcategores = Subcategory::find($id);

        return view('livewire.admin.SubCategory.update', ['categories' => $categores, 'subcategores' => $subcategores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            DB::table('subcategories')->where('id', $request->id)->update($request->except('_token'));
            session()->flash('message', 'Subcategory has been Updated successfully');
            return redirect()->route('admin.subcategories');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('subcategories')->delete($id);
        session()->flash('message', 'Subcategory has been Deleted successfully');
        return redirect()->back()->with('delete', 'Data Deleted successfully');
    }
}
