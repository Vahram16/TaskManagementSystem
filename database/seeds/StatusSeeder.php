<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusNames = [
            ['name' => 'assigned'],
            ['name' => 'in_progress'],
            ['name' => 'done']


        ];
        foreach ($statusNames as $statusName) {
            Status::create([
                'name' => $statusName['name']
            ]);
        }
    }
}
