<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use App\Models\Lecturers_Subject;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Lecturer_SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subject1 = Subject::find(1);  // Assuming subject with ID 1 exists
        $subject2 = Subject::find(2);  // Assuming subject with ID 2 exists

        // Get the lecturers
        $lecturer1 = Lecturer::find(1);  // Lecturer 1
        $lecturer2 = Lecturer::find(2);  // Lecturer 2

        // Create lecturer-subject relationships
        Lecturers_Subject::create([
            'year' => '2025',
            'semester' => 'Spring',  
            'lecturer_id' => $lecturer1->id,
            'subject_id' => $subject1->id,
        ]);

        Lecturers_Subject::create([
            'year' => '2025',
            'semester' => 'Spring',  
            'lecturer_id' => $lecturer2->id,
            'subject_id' => $subject2->id,
        ]);

    }
}
