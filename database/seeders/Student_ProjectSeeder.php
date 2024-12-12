<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Students_Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Student_ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Students_Project::factory(100)
        ->recycle(Project::factory(10)->create())        
        ->create();
    }
}
