<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seed;
use App\Interfaces\PurchaseBill;
class HomeController extends Controller
{
    public function index()
    {
        $factura = app(PurchaseBill::class);
        $factura->generate();
        $data['seeds'] = Seed::by_pop();
        return $factura->generate();
        #return view('home.index')->with("data",$data);
    }

    public function home()
    {
        $data['seeds'] = Seed::by_pop();
        return redirect()->route('home.index')->with("data",$data);
    }
}
