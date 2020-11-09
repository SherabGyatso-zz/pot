<?php

namespace Database\Factories;

use App\Models\Prisoner;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PrisonerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Prisoner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'gender' => $this->faker->randomElement($arry = array('M','F','O')),
            'phone_number' => $this->faker->phoneNumber,
        ];
    }
}