<?php

namespace Database\Factories;

use App\Models\PoliticalParty;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PoliticalParty>
 */
class PoliticalPartyFactory extends Factory
{
    protected $model = PoliticalParty::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'logo' => $this->faker->imageUrl,
            'abreviation' => $this->faker->word
        ];
    }
}
