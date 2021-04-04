<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Seed;
use App\Models\Review;

class SeedController extends Controller
{
    public function list()
    {
        $data = []; //to be sent to the view
        $data["seeds"] = Seed::all();
        return view('customer.seed.list')->with("data",$data);
    }

    public function show($id){
        try{
        $data = []; //to be sent to the view
        $data["reviews"] = Review::where('seed',$id)->get();
        $seed = Seed::findOrFail($id);
        return view('customer.seed.show')
            ->with("seed",$seed)
            ->with("data",$data);    
        }catch(ModelNotFoundException  $e){
            return redirect()->route('home.index');
        }
    }
}