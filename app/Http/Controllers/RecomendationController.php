<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\http;

class RecomendationController extends Controller
{

    public function search()
    {
        /* $city = $request->input('city'); */
        return view('recomendation.search');

    }
    function list(Request $request)
    {   
        $data = Http::get("http://api.worldweatheronline.com/premium/v1/weather.ashx?key=a2b4d8d1d82942388bc223153212405&q={$request['city']},co&fx=no&cc=no&mca=yes&format=json")->json();
        #dd($data['data']['ClimateAverages'][0]['month'][0]['avgDailyRainfall']);
        return view('recomendation.list')->with("data",$data);
        
    }
}
//https://history.openweathermap.org/data/2.5/aggregated/day?lat=25.2975&lon=91.5826&month=7&day=10&appid=f213d44a29429cecbcda752dbbb8e385
//https://history.openweathermap.org/data/2.5/aggregated/year?q=London&appid={API key}
//https://history.openweathermap.org/data/2.5/aggregated/day?q={$city},co&month=2&day=1&appid=f213d44a29429cecbcda752dbbb8e385
//history.openweathermap.org/data/2.5/aggregated/year?q={Medellin},{country code}&appid={API key}
//f213d44a29429cecbcda752dbbb8e385

//a2b4d8d1d82942388bc223153212405
//http://api.worldweatheronline.com/premium/v1/weather.ashx?key=a2b4d8d1d82942388bc223153212405&q=London&fx=no&cc=no&mca=yes&format=json
//http://api.worldweatheronline.com/premium/v1/weather.ashx?key=a2b4d8d1d82942388bc223153212405&q=Marsella&fx=no&cc=no&mca=yes&format=json