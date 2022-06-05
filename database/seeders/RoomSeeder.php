<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
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
                'name' => 'Sunan Giri',
                'user_id' => 4,
                'dormitory_id' => 1
            ],
    
            [
                'name' => 'Sunan Bonang',
                'user_id' => 4,
                'dormitory_id' => 1
            ],
    
            [
                'name' => 'Sunan Kudus',
                'user_id' => 4,
                'dormitory_id' => 2
            ],
    
            [
                'name' => 'Sunan Kalijaga',
                'user_id' => 4,
                'dormitory_id' => 2
            ],
    
            [
                'name' => 'Umar Bin Khattab',
                'user_id' => 4,
                'dormitory_id' => 3
            ],
    
            [
                'name' => 'Usman Bin Affan',
                'user_id' => 4,
                'dormitory_id' => 3
            ],
        ])->each(function ($room){
            DB::table('rooms')->insert($room);
        });
    }
}
