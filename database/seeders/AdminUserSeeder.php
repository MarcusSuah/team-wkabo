<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'fname' => 'Admin',
            'mid_name' => 'S',
            'lname' => 'User',
            'email' => 'admin@project29.rw',
            'username' => 'admin',
            'phone' => '+250788000000',
            'password' => Hash::make('password'),
            'status' => 'active'
        ]);

        $admin->assignRole('admin');

        $manager = User::create([
            'fname' => 'Manager',
            'mid_name' => 'M',
            'lname' => ' User',
            'email' => 'manager@project29.rw',
            'username' => 'manager',
            'phone' => '+250788000001',
            'password' => Hash::make('password'),
            'status' => 'active'
        ]);

        $manager->assignRole('manager');

    }
}
