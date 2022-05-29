<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
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
                'name' => 'Gus Khamim',
                'email' => 'khamim@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'Pengurus Pondok'
            ],
            [
                'name' => 'Admin Pengurus Pondok',
                'email' => 'pengurus_pondok@gmail.com',
                'password' => Hash::make('passwordAdmin123'),
                'role' => 'Pengurus Pondok'
            ],
            [
                'name' => 'Admin Pengurus Asrama',
                'email' => 'pengurus_asrama@gmail.com',
                'password' => Hash::make('passwordAdmin123'),
                'role' => 'Pengurus Asrama'
            ],
            [
                'name' => 'Admin Ketua kamar',
                'email' => 'ketua_kamar@gmail.com',
                'password' => Hash::make('passwordAdmin123'),
                'role' => 'Ketua kamar'
            ]
        ])->each(function ($user){
            DB::table('users')->insert($user);
        });
    }
}
