<?php

namespace Database\Seeders;

use App\Models\Lecturers_Subject;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory(100)
        ->recycle(Lecturers_Subject::factory(10)->create())
        ->create();
    }
}
