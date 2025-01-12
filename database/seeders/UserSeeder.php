<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Sample data for seeding
        $users = [
            [
                'name' => 'Dave Tanjung',
                'email' => 'dtanjung01@student.ciputra.ac.id',
                'password' => 'password123',
                'role' => 'student',
                'nim' => '0706012310022', // NIM for Dave Tanjung
                'image' => 'uploads/profile.jpg',  // Default profile image
            ],
            [
                'name' => 'Goldwin Halim',
                'email' => 'goldwin@student.ciputra.ac.id',
                'password' => 'password123',
                'role' => 'student',
                'nim' => '0706012310002', // NIM for Goldwin Halim
                'image' => 'uploads/profile.jpg',  // Default profile image
            ],
            [
                'name' => 'Suryanto',
                'email' => 'suryanto@student.ciputra.ac.id',
                'password' => 'password123',
                'role' => 'student',
                'nim' => '0706012310004', // NIM for Suryanto
                'image' => 'uploads/profile.jpg',  // Default profile image
            ],
            [
                'name' => 'Theressa Thebez',
                'email' => 'tnatasha02@student.ciputra.ac.id',
                'password' => 'password123',
                'role' => 'student',
                'nim' => '0706012310001', // NIM for Theressa Thebez
                'image' => 'uploads/profile.jpg',  // Default profile image
            ],
            [
                'name' => 'Valentino Manuel Gunawan',
                'email' => 'valentino@student.ciputra.ac.id',
                'password' => 'password123',
                'role' => 'student',
                'nim' => '0706012310009', // NIM for Valentino Manuel Gunawan
                'image' => 'uploads/profile.jpg',  // Default profile image
            ],
            [
                'name' => 'Charlene Tirto Kusumo',
                'email' => 'charlene@student.ciputra.ac.id',
                'password' => 'password123',
                'role' => 'student',
                'nim' => '0706012310008', // NIM for Charlene Tirto Kusumo
                'image' => 'uploads/profile.jpg',  // Default profile image
            ],
            [
                'name' => 'Darren Pandiangan',
                'email' => 'dpandiangan@student.ciputra.ac.id',
                'password' => 'password123',
                'role' => 'student',
                'nim' => '0706012310020', // NIM for Darren Pandiangan
                'image' => 'uploads/profile.jpg',  // Default profile image
            ],
            [
                'name' => 'Dipl.-Inf. Laura Mahendratta Tjahjono',
                'email' => 'laura@ciputra.ac.id',
                'password' => 'webdev2025@uc',
                'role' => 'lecturer',
                'image' => 'uploads/profile.jpg',  // Default profile image
            ],
            [
                'name' => 'Elizabeth Nathania Witanto, S.Kom., M.Sc., Ph.D',
                'email' => 'elizabeth.nathania@ciputra.ac.id',
                'password' => 'password123',
                'role' => 'lecturer',
                'image' => 'uploads/profile.jpg',  // Default profile image
            ],
        ];

        foreach ($users as $userData) {
            if ($userData['role'] === 'student') {
                // Create a student
                $student = Student::create([
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'nim' => $userData['nim'],
                    'image' => $userData['image'],  // Image column for student
                ]);

                User::create([
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'password' => Hash::make($userData['password']),
                    'role' => $userData['role'],
                    'student_id' => $student->student_id,
                    'lecturer_id' => null,
                    'profile_image' => $userData['image'], 
                    'remember_token' => Str::random(10),   
                ]);
            } elseif ($userData['role'] === 'lecturer') {
                // Create a lecturer
                $lecturer = Lecturer::create([
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'profile_image' => $userData['image'],  // Image column for lecturer
                ]);

                // Create a user associated with the lecturer
                User::create([
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'password' => Hash::make($userData['password']),
                    'role' => $userData['role'],
                    'student_id' => null,
                    'lecturer_id' => $lecturer->id,
                    'profile_image' => $userData['image'],  // Profile image for lecturer
                    'remember_token' => Str::random(10),    // Random remember token
                ]);
            }
        }
    }
}
