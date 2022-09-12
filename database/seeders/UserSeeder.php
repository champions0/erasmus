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
                'name' => 'Admin',
                'email' => 'asa4you@outlook.com',
                'email_verified_at' => now(),
                'password' => Hash::make('asa4you*0A5'),
            ],
            [
                'name' => 'Admin',
                'email' => 'mvngo@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('mvngo7*E6'),
            ],
            [
                'name' => 'Admin',
                'email' => 'contact@asociatiasepoate.ro',
                'email_verified_at' => now(),
                'password' => Hash::make('contact9J*4'),
            ],
            [
                'name' => 'Admin',
                'email' => 'info@intercambia.org',
                'email_verified_at' => now(),
                'password' => Hash::make('infoS7*4'),
            ],
            [
                'name' => 'Admin',
                'email' => 'sophie.holub@ucu.edu.ua',
                'email_verified_at' => now(),
                'password' => Hash::make('sophie.holub2T4*'),
            ],

        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
