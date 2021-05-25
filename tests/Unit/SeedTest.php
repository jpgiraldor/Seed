<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
//use PHPUnit\Framework\TestCase; //actually useless garbage for database testing lmao 
use Tests\TestCase; // literally wont work without this lmao laravel be like 'what is a fuckin namespace lol'
use App\Models\Seed;

class SeedTest extends TestCase
{
    use RefreshDatabase;


    public function test_by_price() 
    {   
        $numIns = 10;
        Seed::factory()->count($numIns)->create();
        $seeds = Seed::all();

        $this->assertTrue(count($seeds) == $numIns);
     
        foreach($seeds as $seed) {
            echo "hello";

        }



    }


    
}
