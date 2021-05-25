<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use App\Models\Address;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $user = User::inRandomOrder()->first();    
        $address = Address:inRandomOrder()->first();

        return [
            'total' => $this->faker->randomFloat(3, 1, 100),
            'user' => $user->getId(),
            'ship_addr' => $address->getId(),
            'date' => now(),
        ];
    }
}
