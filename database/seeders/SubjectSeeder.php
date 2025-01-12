<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'name' => 'Web Development',
                'subject_image' => 'uploads/webdev.jpeg',
            ],
            [
                'name' => 'Algorithm & Programming',
                'subject_image' => 'uploads/Algorithm-in-Programming.jpg',
            ],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
