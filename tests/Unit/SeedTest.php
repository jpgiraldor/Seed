<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase; 
use App\Models\Seed;
use App\Models\User;
use App\Models\Review;
use App\Models\Order;
use App\Models\SeedOrders;
use App\Models\Address;

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

    public function test_by_pop() {
        $numUsers = 8;
        $numAddress = 10;
        $numSeeds = 20;
        $numOrder = 5;
        $numSeedOrders = 12;
        User::factory()->count($numUsers)->create();
        Address::factory()->count($numAddress)->create();
        Seed::factory()->count($numSeeds)->create();
        Order::factory()->count($numOrder)->create();
        SeedOrders::factory()->count($numSeedOrders)->create();

        $orders = SeedOrders::all();
        $this->assertTrue(count($orders) > 0);

        $count = array();
        foreach($orders as $or) {
            $seed = $or->getSeed();
            if (isset($count[$seed]) == null) {
                $count[$seed] = 0;
            }
            $count[$seed] += 1;
        }


        $byPop = Seed::byPop();
        $this->assertTrue(count($byPop) > 0);

        $last = -1;
        foreach($byPop as $s) {
            $c = $count[$s->getId()];
            if($last == -1) {
                $last = $c;
            } else {
                $this->assertTrue($c <= $last);
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

            if (isset($revCount[$seed]) == null) {
                $revCount[$seed] = 0;
                $scores[$seed] = 0;
            }
            
            $revCount[$seed] += 1;
            $scores[$seed] += $rev->getScore();
            
        }
        
        foreach($scores as $key => $score) {
            $scores[$key] /= $revCount[$key];
        }

        $byScore = Seed::byScore();
        $this->assertTrue(count($byScore) > 0);
        
        $last = -1;
        foreach($byScore as $s) {
            $count = $scores[$s->getId()];
            if($last == -1) {
                $last = $count;
            } else {
                $this->assertTrue($count <= $last);
            }
        }

    }
    
}
