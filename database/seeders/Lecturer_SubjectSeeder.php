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
        $subjects = Subject::factory(6)->create();

        Lecturers_Subject::factory()->count(100)
            ->recycle($subjects)
            ->recycle(Lecturer::factory())
            ->create();
    }
}
