<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seed;

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
        $seed = Seed::findOrFail($id);
        return view('customer.seed.show')->with("seed",$seed);    
        }catch(ModelNotFoundException  $e){
            return redirect()->route('home.index');
        }
    }
}