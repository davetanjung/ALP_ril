<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            ]);
    }
}
