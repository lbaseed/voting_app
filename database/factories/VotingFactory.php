<?php

namespace Database\Factories;

use App\Models\{Voting, Election, PollingUnit, User, PoliticalParty, VoteCount};
use Illuminate\Support\Carbon;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voting>
 */
class VotingFactory extends Factory
{
    protected $model = Voting::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'election_id' => Election::inRandomOrder()->first(),
            'polling_unit_id' => PollingUnit::inRandomOrder()->first(),
            'user_id' => User::inRandomOrder()->first(),
            'registered_voters' => rand(2, 879),
            'accredited_voters' => function (array $attributes) {
                return rand(2, $attributes['registered_voters']);
            },
            'votes_casted' => function (array $attributes) {
                return rand(2, $attributes['accredited_voters']);
            },
            'valid_votes' => function (array $attributes) {
                return rand(2, $attributes['votes_casted']);
            },
            'ivalid_votes' => function (array $attributes) {

                return $attributes['votes_casted'] - $attributes['valid_votes'];
            },
            'date' => Carbon::now()
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Voting $voting) {
            $parties = PoliticalParty::all();
            foreach ($parties as $key => $party) {
                VoteCount::factory()->create([
                    'voting_id' => $voting->id,
                    'election_id' => $voting->election_id,
                    'political_party_id' => $party->id,
                    'polling_unit_id' => $voting->polling_unit_id,
                    'user_id' => $voting->user_id
                ]);
            }
        });
    }
}
