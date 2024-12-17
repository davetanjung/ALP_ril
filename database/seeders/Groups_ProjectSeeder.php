<?php

namespace Database\Seeders;

use App\Models\Groups_Project;
use App\Models\Student;
use App\Models\Students_Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Groups_ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentsProjects = Students_Project::factory(100)->create();

        Groups_Project::factory()->count(50)
            ->recycle($studentsProjects)
            ->create();
    }
}
