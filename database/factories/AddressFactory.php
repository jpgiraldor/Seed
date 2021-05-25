<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $user = User::inRandomOrder()->first();    
        $regions = ['rA', 'rB', 'rC', 'rD', 'rE'];
        $cities = ['cA', 'cB', 'cC', 'cD', 'cE'];
        

        return [
            'user' => $user->getId(),
            'region' => $regions[rand(0, count($regions) - 1)],
            'city' => $cities[rand(0, count($cities) - 1)],
            'street' => Str::random(10),
            'phone' => Str::random(10),
            'additional_info' => Str::random(10),
        ];
    }
}
