<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function create(){
        $data = []; //to be sent to the view
        $data["title"] = "Create review"; 
        $data["reviews"] = Review::all();
        dd($data);
        return view('user.review.create')->with("data",$data);
    }

    public function save(Request $request)
    {   
        Review::validate($request);
        return back()->with('success','Elemento creado satifactoriamente!');
        //here goes the code to call the model and save it to the database
    }

    public function list($id)
    {
        $data = []; //to be sent to the view
        $data["reviews"] = Review::where('seed',$id);
        return view('user.review.list')->with("data",$data);
    }


}
