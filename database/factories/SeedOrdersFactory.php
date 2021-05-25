<?php

namespace Database\Factories;

use App\Models\SeedOrders;
use App\Models\Seed;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeedOrdersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SeedOrders::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $seed = Seed::inRandonOrder()->first();
        $order = Order::inRandomOrder()->first();

        return [
            'seed' => $seed->getId(),
            'order' => $order->getId(),
            'amount' => $this->faker->randomFloat(3, 1, 100),
        ];
    }
}
