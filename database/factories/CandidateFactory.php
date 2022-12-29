<?php

namespace Database\Factories;

use App\Models\{Candidate, PoliticalParty};

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    protected $model = Candidate::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->randomElement(["male", "female"]),
            'photo' => $this->faker->imageUrl,
            'age' => rand(35, 70),
            'political_party_id' => PoliticalParty::inRandomOrder()->first()
        ];
    }
}
