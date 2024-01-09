<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::count() === 0) {
            
            User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'number' => '01795828708',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'status' => 'active',
                'validated_at' => now(),
            ]);

            User::create([
                'name' => 'Senior Accountant',
                'email' => 'senioraccountant@gmail.com',
                'number' => '01795828700',
                'password' => Hash::make('password'),
                'role' => 'senior_accountant',
                'status' => 'active',
                'validated_at' => now(),
            ]);

            User::create([
                'name' => 'Support Team Leader',
                'email' => 'supportteamleader@gmail.com',
                'number' => '01795828701',
                'password' => Hash::make('password'),
                'role' => 'support_team_leader',
                'status' => 'active',
                'validated_at' => now(),
            ]);

            User::create([
                'name' => 'Controller',
                'email' => 'controller@gmail.com',
                'number' => '01795828701',
                'password' => Hash::make('password'),
                'role' => 'support_team_leader',
                'status' => 'controller',
                'validated_at' => now(),
            ]);
        }
    }
}
