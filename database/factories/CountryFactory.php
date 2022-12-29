<?php

namespace Database\Factories;

use App\Models\{Country, State};

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    protected $model = Country::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Country $country) {
            State::factory()->times(2)->create([
                'country_id' => $country->id
            ]);
        });
    }
}
