<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DormitorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'Al-Bariyah',
                'user_id' => 3,
            ],
    
            [
                'name' => "Al-Ja'fariyah",
                'user_id' => 3,
            ],
    
            [
                'name' => 'Al-Banjaryah',
                'user_id' => 3,
            ]
        ])->each(function ($dormitory){
            DB::table('dormitories')->insert($dormitory);
        });
    }
}
