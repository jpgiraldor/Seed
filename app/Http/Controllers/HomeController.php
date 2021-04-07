<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seed;

class HomeController extends Controller
{
    public function index()
    {
        $data['seeds'] = Seed::by_pop();
        return view('home.index')->with("data",$data);
    }

    public function home()
    {
        $data['seeds'] = Seed::by_pop();
        return redirect()->route('home.index')->with("data",$data);
    }
}
