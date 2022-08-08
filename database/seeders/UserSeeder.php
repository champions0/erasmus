<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Admin 0',
                'email' => 'admin0@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Admin 1',
                'email' => 'admin1@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Admin 2',
                'email' => 'admin2@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ],

        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
