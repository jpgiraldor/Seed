<?php

namespace App\Http\Controllers;

use App\Models\Seed;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{
    public function list($order = null) {   
        $data = [];
        if ($order == null){
            $data["seeds"] = Seed::all();
        }else if ($order == 'price'){
            $data["seeds"] = Seed::by_price();
        }else if ($order == 'water'){
            $data["seeds"] = Seed::by_water();
        }else if ($order == 'germination'){
            $data['seeds'] = Seed::by_germination();
        }else{
            $data['seeds'] = Seed::search($order);
        }

        return view('shop.list')->with("data",$data);
    }

    public function cart(Request $request){
        $data = []; //to be sent to the view
        $data["title"] = "Store seeds";

        $total = 0;
        $items = $request->session()->get("seeds");
        
        if($items == null){
            $items = [];
        }

        foreach ($items as $sp) {
            $total += $sp[2];           
        }

        $data["total"] = $total;
        $data["seeds"] = $items;

        return view('shop.cart')->with("data",$data);
    }

    public function add($seed, Request $request) {   

        /*
        $seedID = (int) $id;
        $seedName = $seed->getName();
        $seedPrice = (int) $seed->getPrice(); */
        $request->session()->push('seeds', [$seed, 0, 0]); 
        

        return back();
    }

    public function removeAll(Request $request) {
        $request->session()->forget('seeds');
        return back();
    }

    public function buy(Request $request)
    {
        $data = []; //to be sent to the view
        $data['title'] = "Buy";




        return view('shop.buy')->with("data",$data);
    }
}
