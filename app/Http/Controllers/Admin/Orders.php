<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\Product;

class Orders extends Controller
{
    public function index()
    {
        $orders = Order::with("details")->get();
        foreach ($orders as $order){
            $total=0;
            foreach($order->details as $detail){
                $total+=$detail->price*$detail->quantity;
            }

            $order->total=$total;
        }
        return view("admin.orders", [
            "orders"=>$orders
        ]);
    }

    public function show($id)

    {
        $orders=OrderDetail::where('order_id', $id)->get();
        $products=Product::with("details")->get();

        foreach ($products as $product){
            foreach($product->details as $detail){
                foreach ($orders as $order) {

                    if ($detail->product_id === $order->product_id) {
                        $order->image = $product->image;
                        $order->product_id = $product->name;
                        break;
                    }
                }
            }
        }

        $total=0;
        foreach($orders as $order){
            $total+=$order->price*$order->quantity;
        }

        $orders->total=$total;
        $orders->id=$id;

        return view("admin.orderdetail",[
            "orders"=> $orders,
            "id"=>$id
        ]);

    }
}
