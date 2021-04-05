<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Seed;
use App\Models\Review;

class SeedController extends Controller
{


    public function show($id){
        try{
        $data = []; //to be sent to the view
        $data["reviews"] = Review::where('seed',$id)->get();
        $seed = Seed::findOrFail($id);
        return view('user.seed.show')
            ->with("seed",$seed)
            ->with("data",$data);    
        }catch(ModelNotFoundException  $e){
            return redirect()->route('home.index');
        }
    }
}
            