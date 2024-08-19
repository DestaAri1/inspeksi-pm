<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => "Admin",
            'role' => "admin",
            'email' => "admin_kso@gmail.com",
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'name' => "Safety",
            'role' => "safety",
            'email' => "safety_kso@gmail.com",
            'password' => bcrypt('safety'),
        ]);
        User::create([
            'name' => "Mekanik",
            'role' => "mekanik",
            'email' => "mekanik_kso@gmail.com",
            'password' => bcrypt('mekanik'),
        ]);
        User::create([
            'name' => "Operator",
            'role' => "operator",
            'email' => "operator_kso@gmail.com",
            'password' => bcrypt('operator'),
        ]);
        User::create([
            'name' => "Supervisor",
            'role' => "supervisor",
            'email' => "supervisor_kso@gmail.com",
            'password' => bcrypt('supervisor'),
        ]);
    }
}
