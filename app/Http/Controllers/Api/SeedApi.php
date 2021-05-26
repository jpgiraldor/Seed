<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Seed;

class SeedApi extends Controller
{

    public function index()
    {
        return Seed::all();
    }

    public function show($id)
    {
        return Seed::findOrFail($id);
    }

    public function price()
    {
        return Seed::by_price();
    }

    public function water()
    {
        return Seed::by_water();
    }

    public function germination()
    {
        return Seed::by_germination();
    }

    public function popular()
    {
        return Seed::by_pop();
    }

    public function score()
    {
        return Seed::by_score();
    }
}
