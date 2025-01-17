<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Subject;
use App\Models\Lecturer;
use App\Models\Lecturers_Subject;
use App\Models\Student;
use App\Models\Students_Project;
use App\Models\Groups_Project;
use Carbon\Carbon;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        // Create a Faker instance to generate realistic data
        $faker = Faker::create();

        // Fetch all subjects to associate with projects
        $subjects = Subject::all();

        // Fetch all students to associate with projects
        $students = Student::all();

        // Assignment types (randomly assign one of these to each project)
        $assignmentTypes = ['AFL 1', 'AFL 2', 'AFL 3', 'ALP'];

        // Example project names and descriptions to use for each subject
        $projectsData = [
            1 => [ // Subject 1 - Web Development
                ['title' => 'Financefriend', 'description' => 'A finance app to help people manage their expenses using Java.'],
                ['title' => 'TaskMaster', 'description' => 'A task management system built using Node.js and Express.'],
                ['title' => 'E-ComShop', 'description' => 'A web-based e-commerce platform developed using PHP and MySQL.'],
                ['title' => 'DevTools', 'description' => 'A set of tools for developers to manage their coding projects and environments.'],
            ],
            2 => [ // Subject 2 - Algorithm & Programming
                ['title' => 'AlgoSort', 'description' => 'An app for teaching sorting algorithms using visual representations in Python.'],
                ['title' => 'CodeAnalyzer', 'description' => 'A software for analyzing and optimizing code performance in C++.'],
                ['title' => 'DataStructures', 'description' => 'A program that demonstrates various data structures and their real-world applications.'],
                ['title' => 'Python3Web', 'description' => 'A web application built using Flask to demonstrate Python web development skills.'],
            ]
        ];

        // List of images for the projects
        $images = [
            'financefriend.jpeg',
            'taskmaster.jpeg',
            'ecommshop.jpeg',
            'devtools.jpeg',
            'algosort.jpeg',
            'codeanalyzer.jpeg',
            'datastructures.jpeg',
            'python3web.jpeg'
        ];

        // Loop through subjects
        foreach ($subjects as $subject) {
            // Fetch projects for the current subject
            $subjectProjects = $projectsData[$subject->id] ?? [];

            // Assign lecturers for the subject
            if ($subject->id == 1) {
                $lecturerSubject = $subject->lecturer_subject()->first();  // Fetch the first lecturer_subject for this subject

                // Check if there's an associated lecturer_subject record
                if ($lecturerSubject && $lecturerSubject->lecturer) {
                    $lecturer = $lecturerSubject->lecturer;

                    foreach ($subjectProjects as $projectData) {
                        // Randomly choose assignment type
                        $assignmentType = $assignmentTypes[array_rand($assignmentTypes)];

                        // Create the lecturer_subject relationship first
                        $lecturerSubject = Lecturers_Subject::create([
                            'year' => Carbon::now()->year,
                            'semester' => 'Odd',  // Example semester
                            'lecturer_id' => $lecturer->id,
                            'subject_id' => $subject->id,
                        ]);

                        // Create the project and associate it with the lecturer_subject
                        $project = Project::create([
                            'title' => $projectData['title'],
                            'description' => $projectData['description'],
                            'assignment_type' => $assignmentType,
                            'lecturer_subject_id' => $lecturerSubject->lecturer_subject_id,  // Link to lecturer_subject
                        ]);

                        $assignedStudents = $students->random(rand(2, 5)); // Randomly assign 2 to 5 students to the project
                        foreach ($assignedStudents as $student) {
                            // Choose an image for the student project from the list
                            $imagePath = 'uploads/' . $images[array_rand($images)];  // Image stored inside 'storage/app/public/uploads/'

                            // Create the Students_Project record to associate the student with the project
                            Students_Project::create([
                                'project_id' => $project->project_id,
                                'image' => $imagePath,  // Assign a random image to the student's project
                                'status' => 'assigned',  // Example status, modify as per requirements
                                'link' => $faker->url
                            ]);

                            // Optionally, assign the student to a group (if using Groups_Project)
                            Groups_Project::create([
                                'student_id' => $student->student_id,
                                'student_project_id' => $project->students_projects->last()->student_project_id, // Link to the last assigned student project
                            ]);
                        }
                    }
                } else {
                    // Handle case where no lecturer is associated with this subject
                    echo "No lecturer found for subject ID: {$subject->id}\n";
                }
            }
            // You can continue this pattern for other subjects if needed
        }
    }
}
