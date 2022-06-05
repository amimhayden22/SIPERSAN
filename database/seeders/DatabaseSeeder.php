<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\User;
use \App\Models\Dormitory;
use \App\Models\Room;
use \App\Models\Student;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);

        $this->call(DormitorySeeder::class);

        $this->call(RoomSeeder::class);

        Student::factory(100)->create();
    }
}
