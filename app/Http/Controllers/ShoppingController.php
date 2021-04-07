<?php

namespace App\Http\Controllers;

use App\Models\Seed;
use App\Models\Order;
use App\Models\Seed_order;
use App\Models\Address;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Review;

class ShoppingController extends Controller
{   

    public function list( Request $request, $order = null) {   
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
        }else if ($order == 'popularity'){
            $data['seeds'] = Seed::by_pop();
        }

        if (is_null($request['query']) !=1){
            $data['seeds'] = Seed::search($request['query']);
        }

        return view('shop.list')->with("data",$data);
    }

    public function pop() {   

            $data['seeds'] = Seed::by_pop();

        return view('home.index')->with("data",$data);
    }


    
    public function show($id){
        try{
            $data = []; 
            $data["reviews"] = Review::where('seed',$id)->get();
            $data["seed"] = Seed::findOrFail($id);

            return view('shop.show')->with("data",$data);    
        }catch(ModelNotFoundException  $e){
            return redirect()->route('home.index');
        }
    }

}
