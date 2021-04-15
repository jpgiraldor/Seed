<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function list($id)
    {
        $data = [];
        $data["orders"] = Order::where('user', $id)->get();
        return view('user.order.list')->with("data", $data);
    }
}