<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        'name' => 'njeri',
        'email' => 'njeri@gmail.com',
        'role' => 'admin',
        'isActive' => 1,
        'password' => Hash::make('njeri')
        ]);

        User::create([
            'name' => 'jane',
            'email' => 'jane@gmail.com',
            'role' => 'user',
            'isActive' => 1,
            'password' => Hash::make('jane')
            ]);
        User::create([
            'name' => 'peter',
            'email' => 'peter@gmail.com',
            'role' => 'user',
            'isActive' => 1,
            'password' => Hash::make('peter')
            ]);
        User::create([
            'name' => 'isaac',
            'email' => 'isaac@gmail.com',
            'role' => 'user',
            'isActive' => 1,
            'password' => Hash::make('isaac')
            ]);
    }
}
