<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Club>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Team::class;

    public function definition()
    {
        return [
            'club_id'=>50,
            'name' => $this->faker->sentence(3,false),
            'category' => $this->faker->randomElement(['Juvenil', 'Infantil'])
        ];
    }
}
