<?php

namespace Database\Factories;

use App\Models\Developers;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DevelopersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Developers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'sex' => $this->faker->randomElement($array = array ('F','M')),
            'birthdate' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'age' => $this->faker->numberBetween(0, 100),
            'hobby' => $this->faker->sentence(3),
        ];
    }
}
