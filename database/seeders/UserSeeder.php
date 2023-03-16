<?php

namespace Database\Seeders;

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
        User::crete([
            'nama' => 'admin',
            'email' => 'ibjan@gmail.com',
            'password' => Hash::make('ibjan123')
        ]);
    }
}