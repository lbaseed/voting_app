<?php

namespace Database\Factories;

use App\Models\{Election, ElectionDetail, PoliticalParty};

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Election>
 */
class ElectionFactory extends Factory
{
    protected $model = Election::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'active' => function (array $attributes){
                if($attributes['name']=="Senatorial")
                    return 1;
                else
                    return 0;
            },
            'year' => 2023,
        ];
    }
}
