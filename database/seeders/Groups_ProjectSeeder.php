<?php

namespace Database\Seeders;

use App\Models\Groups_Project;
use App\Models\Student;
use App\Models\Students_Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Groups_ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Groups_Project::factory(100)
        ->recycle(Students_Project::factory(10)->create())
        ->recycle(Student::factory(100)->create())
        ->create();
    }
}
