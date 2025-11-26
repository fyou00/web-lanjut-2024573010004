<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
{
    User::create([
        'name' => 'Admin User',
        'email' => 'admin@ilmudata.id',
        'password' => Hash::make('password123'),
        'role' => 'admin',
    ]);

    User::create([
        'name' => 'Manager User',
        'email' => 'manager@ilmudata.id',
        'password' => Hash::make('password123'),
        'role' => 'manager',
    ]);

    User::create([
        'name' => 'General User',
        'email' => 'user@ilmudata.id',
        'password' => Hash::make('password123'),
        'role' => 'user',
    ]);
}
}
