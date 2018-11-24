<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class Orders extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view("admin.orders", [
            "orders"=>$orders
        ]);
    }

    public function show($id)
    {
        echo "test{$id}";
    }
}
