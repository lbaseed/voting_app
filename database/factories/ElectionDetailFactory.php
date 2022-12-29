<?php

namespace Database\Factories;

use App\Models\{Election, ElectionDetail, PoliticalParty, Candidate};

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ElectionDetailFactory extends Factory
{
    protected $model = ElectionDetail::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'political_party_id' => PoliticalParty::inRandomOrder()->first(),
            'candidate_id' => function (array $attributes){
                return Candidate::where('political_party_id', $attributes['political_party_id'])->first();
            },
            'total_votes' => rand(1, 800)
        ];
    }
}
