<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
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

    public function show($id){
        try{
        $review = Review::findOrFail($id);
        return view('admin.review.show')->with("review",$review);    
        }catch(ModelNotFoundException  $e){
            return redirect()->route('home.index');
        }
    }

    public function list()
    {
        $data = []; //to be sent to the view
        $data["reviews"] = Review::all();
        return view('admin.review.list')->with("data",$data);
    }





}
