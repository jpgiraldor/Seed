<?php

namespace App\Http\Controllers;

use App\Models\Seed;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{
    public function list(Request $request = null) {   
        if ($request == null){
            $data = []; //to be sent to the view
            $data["seeds"] = Seed::all();
        }else if ($request == 'price'){

        }

        return view('shop.list')->with("data",$data);
    }

    public function cart(Request $request){
        $data = []; //to be sent to the view
        $data["title"] = "Store seeds";

        $listSeedsInCart = array();
        $total = 0;
        $ids = $request->session()->get("seeds"); 
        if($ids){
            $listSeedsInCart = Seed::findMany($ids);
            foreach ($listSeedsInCart as $seed) {
                $total = $total + $seed->getPrice();
            }
        }
        $data["total"] = $total;
        $data["seeds"] = $listSeedsInCart;

        return view('shop.cart')->with("data",$data);
    }

    public function add($id, Request $request)
    {
        $seeds = $request->session()->get("seeds");
        $seeds[$id] = $id;
        $request->session()->put('seeds', $seeds);
        return back();
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('seeds');
        return back();
    }

    public function buy(Request $request)
    {
        $data = []; //to be sent to the view
        $data["title"] = "Buy";
        $order = new Order();
        $order->setTotal(0);
        $order->save();
        
        $total = 0;
        $ids = $request->session()->get("seeds"); 
        if($ids){
            $listSeedsInCart = Seed::findMany($ids);
            foreach ($listSeedsInCart as $seed) {
                $item = new Item();
                $item->setQuantity(1);
                $item->setSubTotal($seed->getPrice());
                $item->setSeedId($seed->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total = $total + $seed->getPrice();
            }
        }

        $order->setTotal($total);
        $order->save();

        return view('shop.buy')->with("data",$data);
    }
}
