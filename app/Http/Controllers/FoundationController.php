<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FoundationController extends Controller
{
    public function list()
    {
        $data = Http::get("http://ec2-18-209-63-217.compute-1.amazonaws.com/public/api/huellistas/foundations")->json();
        #dd($data['data']);
        return view('foundation.semaanth')->with("data", $data['data']);
    }
}
