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
        $seeds = Seed::byPrice();
        $this->assertTrue(count($seeds) == $numIns);
        
        $last = -1;
        foreach($seeds as $seed) {
            if ($last == -1) {
                $last = $seed->getPrice();    
            } else {
                $this->assertTrue($seed->getPrice() <= $last);
            }
        }
    }


    public function test_by_water() {
        $numIns = 10;
        Seed::factory()->count($numIns)->create();
        $seeds = Seed::byWater();
        $this->assertTrue(count($seeds) == $numIns);
        
        $last = -1;
        foreach($seeds as $seed) {
            if ($last == -1) {
                $last = $seed->getWater();    
            } else {
                $this->assertTrue($seed->getWater() <= $last);
            }
        }
    }

    public function test_by_germination() {
        $numIns = 10;
        Seed::factory()->count($numIns)->create();
        $seeds = Seed::byGermination();
        $this->assertTrue(count($seeds) == $numIns);
        
        $last = -1;
        foreach($seeds as $seed) {
            if ($last == -1) {
                $last = $seed->getGermination();    
            } else {
                $this->assertTrue($seed->getGermination() <= $last);
            }
        } 
    }
    
}
