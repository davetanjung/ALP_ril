<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Students_Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Groups_Project>
 */
class Groups_ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
        'student_project_id' => Students_Project::factory()
        ];
    }
}
