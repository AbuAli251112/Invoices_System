<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\sections;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = products::all();
        $sections = sections::all();
        return view('products.products', compact('sections', 'products'));

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

        $validateData = $request->validate([
            'Product_name' => 'required|unique:products|max:255',
            'description' => 'required'
        ], [
            'Product_name.required' =>'يرجي ادخال اسم المنتج',
            'Product_name.unique' =>'اسم المنتج مسجل مسبقا',
            'description.required' =>'يرجي ادخال البيان',
        ]);

        Products::create([
            'product_name' => $request->Product_name,
            'section_id' => $request->section_id,
            'description' => $request->description,
        ]);

        session()->flash('Add', 'تم اضافة المنتج بنجاح ');

        return redirect('/products');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $products)
    {

        $id = $request->id;
        $validateData = $request->validate([
            'Product_name' => 'max:255|unique:products'
        ], [
            'Product_name.unique' =>'اسم المنتج مسجل مسبقا'
        ]);
        
        Products::where('id', $request->pro_id)->update([
            'product_name' => $request->Product_name,
            'section_id' => $request->section_id,
            "description" => $request->description
        ]);

        session()->flash('Edit', 'تم تعديل المنتج بنجاح');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $id = $request->pro_id;
        Products::find($id)->delete();

        session()->flash('delete', 'تم حذف المنتج بنجاح');

        return back();

    }
}
