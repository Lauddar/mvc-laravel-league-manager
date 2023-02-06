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
            'club_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8]),
            'name' => $this->faker->sentence(3,false),
            'category' => $this->faker->randomElement(['Juvenil', 'Infantil', 'Alevín'])
        ];
    }
}
