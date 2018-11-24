<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Library\Cart;
use App\Order;
use App\OrderDetail;

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
            "name"=>"required|max:255",
            "phone"=>"required|max:255",
            "comment"=>"max:255"
        ]);

        $order = new Order();
        $order->name=$request->input("name");
        $order->phone=$request->input("phone");
        $order->comment=$request->input("comment");

        $order->save();

        $cart=new Cart();
        $info = $cart->getProducts();

        foreach($info["products"] as $product){
            $detail = new OrderDetail();
            $detail->product_id= $product->id;
            $detail->order_id= $order->id;
            $detail->price= $product->price;
            $detail->quantity= $product->countInCart;

            $detail->save();
            $cart->remove($product->id);
        }

        return view("success");
    }
}
