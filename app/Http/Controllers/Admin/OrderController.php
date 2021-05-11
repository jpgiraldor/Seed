<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function list()
    {
        $data = [];
        $data["orders"] = Order::all();
        return view('admin.order.list')->with("data", $data);
    }
}