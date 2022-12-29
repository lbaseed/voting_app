<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\{Election, ElectionDetail, PoliticalParty};

class ElectionDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $elections = Election::all();
        $parties = PoliticalParty::all();
        foreach ($elections as $key => $election) {
            if ($election->active == true)
            {
                foreach ($parties as $key => $party) {
    
                    $votings = $election->votings;
                    foreach ($votings as $key => $voting) {
    
                        $voteCounts = $voting->voteCounts;
                        foreach ($voteCounts as $key => $voteCount) {
    
                                $totalPartyVotes = $voteCount->where('political_party_id', $party->id)
                                ->get()->sum->votes;
                        }
                    }
    
                    ElectionDetail::factory()->create([
                        'election_id' => $election->id,
                        'political_party_id' => $party->id,
                        'total_votes' => isset($totalPartyVotes) ? $totalPartyVotes : 0
                        ]);
                }
            }

        }
    }
}
