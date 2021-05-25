<?php

namespace Database\Factories;

use App\Models\Seed;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Provider\Base;

class SeedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seed::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $brands =  ['A', 'B', 'C', 'D', 'E'];
        $groundVals = ['gA', 'gB', 'gC', 'gD', 'gE'];
        $droughtVals = ['dA', 'dB', 'dC', 'dD', 'dE'];
        $typeVals = ['tA', 'tB', 'tC', 'tD', 'tE'];
        $kwVals = ['kwA', 'kwB', 'kwC', 'kwD', 'kwE'];
        $catVals = ['cA', 'cB', 'cC', 'cD', 'cE'];
        
        // randomElements de faker no funciona

        return [
            'name' => Str::random(10),
            'brand' => $brands[rand(0, count($brands) - 1)],
            'weight'=> $this->faker->randomFloat(3, 1, 100),
            'water' => $this->faker->randomFloat(3, 1, 100), 
            'ground'=> $groundVals[rand(0, count($groundVals) - 1)],
            'drought'=> $droughtVals[rand(0, count($droughtVals) - 1)],
            'germination'=> $this->faker->randomFloat(3, 1, 100),
            'type' => $typeVals[rand(0, count($typeVals) - 1)],
            'keywords' => $kwVals[rand(0, count($kwVals) - 1)],
            'category' => $catVals[rand(0, count($catVals) - 1)],
            'price' => $this->faker->randomFloat(3, 1, 100)
        ];
    }
}
