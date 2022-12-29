<?php

namespace Database\Factories;

use App\Models\{PollingUnit, Ward};

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PollingUnit>
 */
class PollingUnitFactory extends Factory
{
    protected $model = PollingUnit::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ward_id' => Ward::inRandomOrder()->first(),
            'name' => $this->faker->word,
            'registered_voters' => rand(400, 1987),
            'inec_ref' => $this->faker->word
        ];
    }
}
