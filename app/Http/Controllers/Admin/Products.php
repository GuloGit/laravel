<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Products extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::all();
        return view("admin.products",[
            "products"=>Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Return view("admin.productsform");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(Product::rules());
        $data= $request->all();
       $data["image"]=$request->image->store("public/images");


        $request->session()->flash("message", "Товар успешно добавлен");
        $request->session()->flash("message-type", "success");

        $product= Product::create($data);

       return redirect(route("products.index"));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)

    {
        return view("admin.productsform",[
            "product"=>$product
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

       $request->validate(Product::rules());
      $product->fill($request->all());

      if($request->has("image")){
          $product->image=$request->image->store("public/images");
      }

      $product->save();

      $request->session()->flash("message", "изменения успешно сохранены");
      $request->session()->flash("message-type", "success");

       return redirect(route("products.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        Session()->flash("message", "Товар успешно удален");
        Session()->flash("message-type", "danger");

        return redirect(route("products.index"));

    }
}
