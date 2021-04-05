<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seed;
use phpDocumentor\Reflection\Types\Null_;

class SeedController extends Controller
{
    public function create(){
        $data = []; //to be sent to the view
        $data["title"] = "Create seed"; 
        $data["seeds"] = Seed::all();
        return view('admin.seed.create')->with("data",$data);
    }

    public function save(Request $request)
    {   
        Seed::validate($request);
        return back()->with('success','Elemento creado satifactoriamente!');
        //here goes the code to call the model and save it to the database
    }

    public function delete($id){
        $pr = Seed::whereId($id);
        $pr->delete();
        return redirect()->route('home.index');
    }

    public function show($id){
        try{
        $seed = Seed::findOrFail($id);
        return view('admin.seed.show')->with("seed",$seed);    
        }catch(ModelNotFoundException  $e){
            return redirect()->route('home.index');
        }
    }
}