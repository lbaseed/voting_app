<?php

namespace Database\Factories;

use App\Models\{State, Lga};

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\State>
 */
class StateFactory extends Factory
{
    protected $model = State::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->state,
            'inec_ref' => $this->faker->word
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (State $state) {
            Lga::factory()->times(6)->create([
                'state_id' => $state->id
            ]);
        });
    }
}
