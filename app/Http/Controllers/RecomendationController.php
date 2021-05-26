<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Seed;

class RecomendationController extends Controller
{

    public function search()
    {
        /* $city = $request->input('city'); */
        return view('recomendation.search');
    }
    public function list(Request $request)
    {
        $data = Http::get("http://api.worldweatheronline.com/premium/v1/weather.ashx?key=a2b4d8d1d82942388bc223153212405&q={$request['city']},co&fx=no&cc=no&mca=yes&format=json")->json();
        $data = $data['data']['ClimateAverages'][0]['month'];
        $anualrain=0;
        foreach ($data as $month) {
            $times=$month['avgDailyRainfall'];
            $anualrain += $times;
        }
        $seed['seeds'] = Seed::where('water', '>', $anualrain)->get();
        #dd($seed['seeds'][0]['name']);
        return view('recomendation.list')->with("api", $seed);
    }
}
