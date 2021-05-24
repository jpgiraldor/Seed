<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seed;
use phpDocumentor\Reflection\Types\Null_;
use App\Models\Review;
use App\Models\SeedOrders;
use Lang;

class SeedController extends Controller
{

    public function create()
    {
        $data = [];
        $data["title"] = "Create seed";
        $data["seeds"] = Seed::all();
        return view('admin.seed.create')->with("data", $data);
    }

    public function save(Request $request)
    {
        Seed::validate($request);
        return back()->with('success', Lang::get('text.element.created'));
    }

    public function delete($id)
    {
        $sords = SeedOrders::where('seed', $id);
        $sords->delete();

        $revs = Review::where('seed', $id);
        $revs->delete();

        $pr = Seed::whereId($id);
        $pr->delete();

        return redirect()->route('home.index');
    }
}
