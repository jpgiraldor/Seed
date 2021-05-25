<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
//use PHPUnit\Framework\TestCase; //actually useless garbage for database testing lmao 
use Tests\TestCase; // literally wont work without this lmao laravel be like 'what is a fuckin namespace lol'
use App\Models\Seed;
use App\Models\User;
use App\Models\Review;

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

    public function test_by_score() {
        $numUsers = 8;
        $numSeeds = 20;
        $numReviews = 12;
        User::factory()->count($numUsers)->create();
        Seed::factory()->count($numSeeds)->create();
        Review::factory()->count($numReviews)->create();

        $reviews = Review::all();
        $revCount = array();
        $scores = array();

        $this->assertTrue(count($reviews) > 0);

        foreach($reviews as $rev) {
            $seed = $rev->getSeed();
            if(array_key_exists($seed, $revCount)) {
                $revCount[$seed] += 1;
                $scores[$seed] += $rev->getScore();
            } else {
                $revCount[$seed] = 1;
                $scores[$seed] = $rev->getScore();
            }
        }
        
        foreach($scores as $key => $score) {
            $scores[$key] /= $revCount[$key];
        }

        $byScore = Seed::byScore();
        $this->assertTrue(count($byScore) > 0);
        
        $last = -1;
        foreach($byScore as $s) {
            $count = $score[$s->getId()];
            if($last == -1) {
                $last = $count;
            } else {
                $this->assertTrue($count <= $last);
            }
        }

    }
    
}
