<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->sorting == 'date') {
            $products = Product::where('name', 'like', '%' . $request->search . '%')->where('category_id', 'like', '%' . $request->product_cat_id . '%')->orderBy('created_at', 'DESC')->paginate($request->pagesize);
        } else if ($request->sorting == 'price') {
            $products = Product::where('name', 'like', '%' . $request->search . '%')->where('category_id', 'like', '%' . $request->product_cat_id . '%')->orderBy('regular_price', 'ASC')->paginate($request->pagesize);
        } else if ($request->sorting == 'price-desc') {
            $products = Product::where('name', 'like', '%' . $request->search . '%')->where('category_id', 'like', '%' . $request->product_cat_id . '%')->orderBy('regular_price', 'DESC')->paginate($request->pagesize);
        } else {
            $products =  Product::where('name', 'like', '%' . $request->search . '%')->where('category_id', 'like', '%' . $request->product_cat_id . '%')->orderBy('created_at', 'DESC')->paginate($request->pagesize);
        }


        $categories = Category::all();
        return view('livewire.search-component', ['products' => $products, 'categories' => $categories])->layout("layouts.base");
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
