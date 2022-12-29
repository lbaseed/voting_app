<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\{Voter, Lga, Ward, State};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voter>
 */
class VoterFactory extends Factory
{
    protected $model = Voter::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'lga_id' => Lga::inRandomOrder()->first(),
            'ward_id' => Ward::inRandomOrder()->first(),
            'state_id' => State::inRandomOrder()->first(),
            'phone' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(["male", "female"]),
            'age' => rand(35, 75)
        ];
    }
}
