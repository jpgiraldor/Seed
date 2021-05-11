<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{

    public function create()
    {
        $data["addresses"] = [];
        if (Auth::check()) {
            $userID = Auth::id();
            $addresses = Address::where('user', $userID)->get();
            $data["addresses"] = $addresses;
        }
        
        
        return view('user.address.create')->with("data", $data);
    }


    public function save(Request $request)
    {
        Address::validate($request);
        return back()->with('success', 'Elemento creado satifactoriamente!');
    }
}
