<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make(1234),
            'role_id' => 1
        ]);
        User::create([
            'name' => 'developer',
            'email' => 'developer@gmail.com',
            'password' => Hash::make(1234),
            'role_id' => 2
        ]);
        User::create([
            'name' => 'developer2',
            'email' => 'developer2@gmail.com',
            'password' => Hash::make(1234),
            'role_id' => 2
        ]);

    }
}
