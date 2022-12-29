<?php

namespace Database\Factories;

use App\Models\{VoteCount, PollingUnit, PoliticalParty, User, Election, Voting};

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VoteCount>
 */
class VoteCountFactory extends Factory
{
    protected $model = VoteCount::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'polling_unit_id' => PollingUnit::inRandomOrder()->first(),
            'political_party_id' => PoliticalParty::inRandomOrder()->first(),
            'election_id' => Election::inRandomOrder()->first(),
            'voting_id' => Voting::inRandomOrder()->first(),
            'user_id' => User::inRandomOrder()->first(),
            'votes' => rand(200, 999)
        ];
    }
}
