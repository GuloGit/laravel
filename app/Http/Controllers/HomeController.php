<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Library\Cart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //$this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $cart=new Cart();
        return view('home', [
            "products"=>$products,
            "totalItemsInCart"=> $cart->count()
        ]);
    }

    public function product($id)
    {
        $product=Product::find($id);
      return view("product",[
          "product"=>$product
      ]);

    }

    public function addToCart($id)
    {
        $product=Product::find($id);
        $cart=new Cart();
        $cart->add($product, 1);
        return ["total"=> $cart->count()];
    }

    public function cart()
    {
        $cart=new Cart();
        $info=$cart->getProducts();
        return view("cart",[
            "products"=>$info["products"],
            "total"=>$info["total"]
        ]);
    }

    public function updateCart(Request $req)
    {
        $cart=new Cart();
        $id=$req->input("remove");
        if($id>0){
            $cart->remove($id);
        }
        $ids=$req->input("ids");
        if(isset($ids) && count($ids)>0){
            foreach ($ids as $data){
                $cart->changeQuantity($data["id"], $data["quantity"]);
            }
            return $cart->getProducts();
        }

        return redirect(route("cart"));
    }
    public function order(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "phone"=>"required",
            "comment"=>"max:255"
        ]);
    }
}
