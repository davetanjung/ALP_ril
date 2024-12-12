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
        Lecturers_Subject::factory(100)
        ->recycle(Subject::factory(10)->create())
        ->recycle(Lecturer::factory(20)->create())
        ->create();
    }
}
