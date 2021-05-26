<?php

namespace App\Http\Controllers;

use App\Models\Seed;
use App\Models\Order;
use App\Models\Seed_orders;
use App\Models\Address;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Review;

class ShoppingController extends Controller
{

   

    public function list(Request $request, $order = null)
    {
        $data = [];
        if ($order == null) {
            $data["seeds"] = Seed::all();
        } elseif ($order == 'price') {
            $data["seeds"] = Seed::byPrice();
        } elseif ($order == 'water') {
            $data["seeds"] = Seed::byWater();
        } elseif ($order == 'germination') {
            $data['seeds'] = Seed::byGermination();
        } elseif ($order == 'score') {
            $data['seeds'] = Seed::byScore();
        } elseif ($order == 'popularity') {
            $data['seeds'] = Seed::byPop();
        }

        if (is_null($request['query']) !=1) {
            $data['seeds'] = Seed::search($request['query']);
        }

        return view('shop.list')->with("data", $data);
    }

    public function pop()
    {
        $data['seeds'] = Seed::byPop();
        return view('home.index')->with("data", $data);
    }


    
    public function show($id)
    {
        try {
            $data = [];
            $data["reviews"] = Review::where('seed', $id)->get();
            $data["seed"] = Seed::findOrFail($id);

            return view('shop.show')->with("data", $data);
        } catch (ModelNotFoundException  $e) {
            return redirect()->route('home.index');
        }
    }
}
