<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function approval(){}

    public function destroy($id){
        $pr = Review::whereId($id);
        $pr->delete();
        return back();
    }
}
