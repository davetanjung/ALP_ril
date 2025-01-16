<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use App\Models\Lecturers_Subject;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class Lecturer_SubjectSeeder extends Seeder
{
    public function run()
    {
        $subjects = Subject::all();
        $lecturers = Lecturer::all();

        $semesterOptions = ['Odd', 'Even'];

        foreach ($lecturers as $index => $lecturer) {
            foreach ($subjects as $subjectIndex => $subject) {
                $semester = $semesterOptions[$subjectIndex % 2];

                $exists = Lecturers_Subject::where('lecturer_id', $lecturer->id)
                    ->where('subject_id', $subject->id)
                    ->exists();

                if (!$exists) {
                    Lecturers_Subject::create([
                        'year' => now()->year,
                        'semester' => $semester,
                        'lecturer_id' => $lecturer->id,
                        'subject_id' => $subject->id,
                    ]);
                }
            }
        }
    }
}
