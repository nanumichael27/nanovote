<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $admins = [
            [
                'name' => 'Oghenetega Nanu',
                'email' => 'nanumicahael27@gmail.com',
                'role' => 'admin',
                'code' => '',
                'email_verified_at' => now(),
                'password' => Hash::make('nanumicahael27@gmail.com')
            ],
            [
                'name' => 'aigbokhanfrances@gmail.com',
                'email' => 'aigbokhanfrances@gmail.com',
                'role' => 'admin',
                'code' => '',
                'email_verified_at' => now(),
                'password' => Hash::make('aigbokhanfrances@gmail.com')
            ],
            [
                'name' => 'nwaghodohemmanuel@gmail.com',
                'email' => 'nwaghodohemmanuel@gmail.com',
                'role' => 'admin',
                'code' => '',
                'email_verified_at' => now(),
                'password' => Hash::make('nwaghodohemmanuel@gmail.com')
            ],
            [
                'name' => 'mhizphaevour@gmail.com',
                'email' => 'mhizphaevour@gmail.com',
                'role' => 'admin',
                'code' => '',
                'email_verified_at' => now(),
                'password' => Hash::make('mhizphaevour@gmail.com')
            ],
            [
                'name' => 'florencechizobamu20@gmail.com',
                'email' => 'florencechizobamu20@gmail.com',
                'role' => 'admin',
                'code' => '',
                'email_verified_at' => now(),
                'password' => Hash::make('florencechizobamu20@gmail.com')
            ],
            [
                'name' => 'hakhanoba@gmail.com',
                'email' => 'hakhanoba@gmail.com',
                'role' => 'admin',
                'code' => '',
                'email_verified_at' => now(),
                'password' => Hash::make('hakhanoba@gmail.com')
            ],
            [
                'name' => 'venerablechris3899@gmail.com',
                'email' => 'venerablechris3899@gmail.com',
                'role' => 'admin',
                'code' => '',
                'email_verified_at' => now(),
                'password' => Hash::make('venerablechris3899@gmail.com')
            ],
        ];

        User::insert($admins);
    }
}
