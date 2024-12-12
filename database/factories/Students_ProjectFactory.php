<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Students_Project>
 */
class Students_ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'image'=> ('aaaa.png'),
        'status' => $this->faker->randomElement(['Good', 'Normal', 'Bad']),
        'project_id' => Project::factory(),
        ];
    }
}