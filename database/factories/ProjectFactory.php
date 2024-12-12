<?php

namespace Database\Factories;

use App\Models\Lecturers_Subject;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->text(10),
            'assignment_type' => $this->faker->randomElement(['AFL 1', 'AFL 2', 'AFL 3', 'ALP']),
            'lecturer_subject_id' => Lecturers_Subject::factory()
        ];
    }
}
