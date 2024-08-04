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
     */
    public function run(): void
    {
        //
        User::insert(
            [
                [
                    'name' => 'Super Admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('123123'), // Hash genetaror ile 123123 şifresini hash'ledm
                    'user_type' => 'admin'
                ],
                [
                    'name' => 'Normal User',
                    'email' => 'user@gmail.com',
                    'password' => Hash::make('123123'), // Hash genetaror ile 123123 şifresini hash'ledm
                    'user_type' => 'user'
                ],
            ]
                );
    }
}
