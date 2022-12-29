<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Election;

class ElectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $elections = [
            "Presidential", "Senatorial", "National Assembly", "Gubernotorial", "State Assembly"
        ];

        foreach ($elections as $key => $election) {
            Election::factory()->create(['name' => $election, 'type' => 'secondary']);
        }
    }
}
