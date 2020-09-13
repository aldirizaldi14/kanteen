<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Developer Sistem',
            'username' => 'developer',
            'password' => bcrypt('H0r0binobusterstream'),
            'departement' => 'Developer',
            'role' => 'developer'
        ]);
        User::create([
            'name' => 'Admin Sistem',
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'departement' => 'HR',
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'User Sistem',
            'username' => 'user',
            'password' => bcrypt('user123'),
            'departement' => 'HR',
            'role' => 'user'
        ]);
    }
}
