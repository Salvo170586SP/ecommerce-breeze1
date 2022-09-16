<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::with('brand')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('admin.products.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:2',
            'description' => 'required|string',
            'image' => 'required|string',
        ],[
            'nome.required' => 'il campo titolo è obbligatorio',
            'nome.min' => 'il campo Titolo deve avere almeno 2 caratteri',
            'description.required' => 'il campo Titolo è obbligatorio',
            'image.required' => 'il campo Immagine è obbligatorio',
        ]);

        $data = $request->all();

        $new_product = new Product();
        $new_product->fill($data);
        $new_product->save();

        return redirect()->route('admin.products.index')->with('success', 'Il prodotto è stato aggiunto' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        return view('admin.products.edit', compact('product','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {   
        $request->validate([
            'nome' => 'required|min:2',
            'description' => 'required|string',
            'image' => 'required|string',
        ],[
            'nome.required' => 'il campo titolo è obbligatorio',
            'nome.min' => 'il campo Titolo deve avere almeno 2 caratteri',
            'description.required' => 'il campo Titolo è obbligatorio',
            'image.required' => 'il campo Immagine è obbligatorio',
        ]);

        $data = $request->all();    
        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Il prodotto è stato aggiornato' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
