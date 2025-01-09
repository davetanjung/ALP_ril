<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory(100)->create();

            User::create([
                'name' => 'Dave Tanjung',
                'email' => 'davegtanjung@gmail.com',
                'password' => '123', 
                'profile_image' => 'https://i.pinimg.com/236x/f3/85/d7/f385d78eba93e8b768bcc04bf96fe5a5.jpg',
                'remember_token' => Str::random(10),
                'role' => 'student'              
            ]);
    }
}
