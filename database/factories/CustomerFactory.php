<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'FirstName' => $this->faker->firstName,
            'LastName'  => $this->faker->lastName,
            'Shop'      => self::factoryForModel( Shop::class),
            'Company'   => 2,
            'Email'     => $this->faker->unique()->safeEmail,
            'Phone'     => $this->faker->phoneNumber
        ];
    }
}
