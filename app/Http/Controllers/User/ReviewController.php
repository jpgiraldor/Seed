<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Lang;

class ReviewController extends Controller
{
    public function create()
    {
        $data = [];
        $data["title"] = "Create review";
        $data["reviews"] = Review::all();
        return view('user.review.create')->with("data", $data);
    }

    public function save(Request $request)
    {
        Review::validate($request);
        return back()->with('success', Lang::get('text.element.created'));
    }

    public function list($id)
    {
        $data = [];
        $data["reviews"] = Review::where('seed', $id);
        return view('user.review.list')->with("data", $data);
    }
}
