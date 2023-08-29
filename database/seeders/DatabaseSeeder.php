<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
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

        Admin::create([
            'name' => 'Test User',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'image' => 'notavailable',
            'password' => bcrypt('premlamsal'),
            'last_login_at' => date('Y:m:d H:i:s'),
            'status' => 'active',
            'email_verified_at' => date('Y:m:d H:i:s'),
            'created_at' => date('Y:m:d H:i:s'),
            'updated_at' => date('Y:m:d H:i:s'),

        ]);
    }
}
