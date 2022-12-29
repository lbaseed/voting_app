<?php

namespace Database\Factories;

use App\Models\{Lga, Ward, PollingUnit};

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ward>
 */
class WardFactory extends Factory
{
    protected $model = Ward::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'lga_id' => Lga::inRandomOrder()->First(),
            'inec_ref' => $this->faker->word
        ];
    }

    public function Configure()
    {
        return $this->afterCreating(function (Ward $ward) {
            PollingUnit::factory()->times(5)->create([
                'ward_id' => $ward->id
            ]);
        });
    }
}
