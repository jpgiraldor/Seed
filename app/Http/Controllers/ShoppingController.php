<?php

namespace App\Http\Controllers;

use App\Models\Seed;
use App\Models\Order;
use App\Models\Seed_order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{

    public function search(Request $request){
        $search = $request['query'];
        $hola = "asas";
        dd($search);
        return redirect()->action(
            [ShoppingController::class, 'list', ['order' => $search]]
        );
    }

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
        }else if ($order == 'score'){
            $data['seeds'] = Seed::by_score();
        }else{
            $data['seeds'] = Seed::search($order);
        }

        return view('shop.list')->with("data",$data);
    }

    public function cart(Request $request){
        $data = []; //to be sent to the view
        $data["title"] = "Store seeds";

        $data["total"] = $request->session()->get("total", 0);
        $data["seeds"] = $request->session()->get("seeds", []);

        return view('shop.cart')->with("data",$data);
    }

    public function add($id, Request $request) {   
        $seedID = (int) $id;
        $seed = Seed::firstWhere('id', $seedID);

        if ($seed != null) {
            $request->session()->push('seeds', 
                [$seed->getName(), $seed->getPrice()]);

            $total = $request->session()->get('total', 0);
            $total += $seed->getPrice();
            $request->session()->put('total', 0);
        }

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

        $seeds = $request->session()->get('seeds');
        $total = $request->session()->get('total', 0);

        if ($seeds != null) {
            $currUser = Auth::user();
            $order = Order::create([
                'total' => $total,
                'user' => Auth::id(),
                'date' => date("Y-m-d H:i:s"),
                'ship_addr' => '',            
            ]);
        
            
            foreach($seeds as $s) {
                Seed_order::create([
                    'seed' => $s[0],
                    'order' => $order->getId(),
                    'amount' => $s[1],
                ]);  
            }
        }
        


        return view('shop.buy')->with("data",$data);
    }
}
