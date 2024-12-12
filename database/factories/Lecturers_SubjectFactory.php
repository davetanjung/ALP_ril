<?php

namespace Database\Factories;

use App\Models\Lecturer;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lecturers_Subject>
 */
class Lecturers_SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'year' => $this->faker->year('now'),
            'semester' => $this->faker->randomElement(['Ganjil', 'Genap']),   
            'lecturer_id' => Lecturer::factory(),
            'subject_id' => Subject::factory()
        ];
    }
}
