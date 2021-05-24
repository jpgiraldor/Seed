<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\SeedOrders;

class OrderController extends Controller
{
    public function list()
    {
        $data = [];
        $data["orders"] = Order::all();
        return view('admin.order.list')->with("data", $data);
    }

    public function delete($id)
    {
        $sord = SeedOrders::where('order',$id);
        $sord->delete();
        
        $ord = Order::where('id', $id);
        $ord->delete();

        

        return redirect()->route('admin.order.list');
    }

    public function modify($id)
    {
        
        $ord = Order::where('id', $id);
        $ord->delete();

        

        return redirect()->route('admin.order.list');
    }
}