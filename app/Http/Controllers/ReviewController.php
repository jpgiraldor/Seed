<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function approval(){
    }

    public function destroy($id){
        $pr = Review::whereId($id);
        $pr->delete();
        return back();
    }

    public function create(){
        $data = []; //to be sent to the view
        $data["title"] = "Create review"; 
        $data["reviews"] = Review::all();
        return view('review.create')->with("data",$data);
    }

    public function save(Request $request)
    { 
        Review::validate($request);
        Review::create($request->only(['customer','seed','score','content','acc']));
        return back()->with('success','Elemento creado satifactoriamente!');
        //here goes the code to call the model and save it to the database
    }


}
