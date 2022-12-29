<?php

namespace Database\Factories;

use App\Models\{State, Lga, Ward};

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lga>
 */
class LgaFactory extends Factory
{
    protected $model = Lga::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->city,
            'state_id' => State::inRandomOrder()->First(),
            'inec_ref' => $this->faker->word
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Lga $lga) {
            Ward::factory()->times(9)->create([
                'lga_id' => $lga->id
            ]);
        });
    }
    
}
