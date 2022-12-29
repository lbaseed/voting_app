<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\{Voting, PollingUnit, Election};

class VotingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pollingUnits = PollingUnit::all();
        $election = Election::firstWhere('name', 'Senatorial');

        foreach ($pollingUnits as $key => $pollingUnit) {

            Voting::factory()->create([
                'polling_unit_id' => $pollingUnit->id,
                'election_id' => $election->id
            ]);
        }
    }
}
