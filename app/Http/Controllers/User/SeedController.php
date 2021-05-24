<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Seed;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\SeedOrders;
use App\Models\Address;
use App\Mail\OrderShipped;
use App\Interfaces\PurchaseBill;
use Maatwebsite\Excel\Facades\Excel;
class SeedController extends Controller
{



    public function cart(Request $request)
    {
        $data = [];
        $data["title"] = "Store seeds";
        $data["addresses"] = [];

        if (Auth::check()) {
            $userID = Auth::id();
            $addresses = Address::where('user', $userID)->get();
            $data["addresses"] = $addresses;
        }

        $data["total"] = $request->session()->get("total", 0);
        $data["seeds"] = $request->session()->get("seeds", []);


        return view('user.seed.cart')->with("data", $data);
    }

    public function add($id, Request $request)
    {
        $seedID = (int) $id;
        $seed = Seed::firstWhere('id', $seedID);

        if ($seed != null) {
            $request->session()->push(
                'seeds',
                [$seed->getID(), $seed->getName(), $seed->getPrice()]
            );
            
            $total = $request->session()->get('total', 0);
            $total += $seed->getPrice();
            $request->session()->put('total', $total);
        }

        return back();
    }


    public function removeAll(Request $request)
    {
        $request->session()->forget('seeds');
        $request->session()->forget('total');
        return back();
    }



    public function buy(Request $request)
    {
        $data = [];
        $data['title'] = "Buy";

        $amount = $request->session()->get('amount');
        $seeds = $request->session()->get('seeds');
        $total = $request->session()->get('total', 0);

        if ($seeds != null) {
            $order = Order::validate([
                'total' => $total,
                'user' => Auth::id(),
                'ship_addr' => $request['ship_addr'],
            ]);
        
            
            foreach ($seeds as $s) {
                $seedID = $s[0];
                $price = $s[2]*$amount;
                SeedOrders::validate([
                    'seed' => $seedID,
                    'order' => $order->getId(),
                    'amount' => $price,
                ]);
            }
        }

        $request->session()->forget('seeds');
        $request->session()->forget('total');
        $data['seeds'] = Seed::byPop();
        return view('home.index')->with("data", $data);
    }

    public function bill($id, Request $request)
    {
        $factura = app()->makewith(PurchaseBill::class, ['type'=> $request['bill']]);
        return $factura->generate($id);
    }


}
