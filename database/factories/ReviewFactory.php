<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use App\Models\Seed;    
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        $seed = Seed::inRandomOrder()->first();
        return [
            'user' => $user->getId(),
            'seed' => $seed->getId(),
            'score' => $this->faker->randomFloat(1, 0, 5),
            'content' => Str::random(10),
        ];
    }
}
