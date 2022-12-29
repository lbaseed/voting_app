<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PoliticalParty;

class PoliticalPartiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parties = ["APC" => "All Progressive Congress", "PDP" => "Peoples Democratic Party"];

        foreach ($parties as $key => $party) {
            PoliticalParty::factory()->create([
                'name' => $party,
                'abreviation' => $key
            ]);
        }
    }
}
