<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleNames = [
            ['name' => 'manager'],
            ['name' => 'developer']

        ];
        foreach ($roleNames as $roleName) {
            Role::create([
                'name' => $roleName['name']
            ]);
        }
    }
}
