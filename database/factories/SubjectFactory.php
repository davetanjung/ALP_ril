<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Subject::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Algorithm & Programming', 'Web Development', 'Web Programming', 'Computer Network', 'Mobile Application Development', 'Object-Oriented Programming']),
            'subject_image' => $this->faker->imageUrl()       
        ];
    }
}
