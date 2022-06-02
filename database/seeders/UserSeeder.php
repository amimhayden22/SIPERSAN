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
                'id' => 1,
                'name' => 'Gus Khamim',
                'email' => 'khamim@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'Pengurus Pondok'
            ],
            [
                'id' => 2,
                'name' => 'Admin Pengurus Pondok',
                'email' => 'pengurus_pondok@gmail.com',
                'password' => Hash::make('passwordAdmin123'),
                'role' => 'Pengurus Pondok'
            ],
            [
                'id' => 3,
                'name' => 'Admin Pengurus Asrama',
                'email' => 'pengurus_asrama@gmail.com',
                'password' => Hash::make('passwordAdmin123'),
                'role' => 'Pengurus Asrama'
            ],
            [
                'id' => 4,
                'name' => 'Admin Ketua kamar',
                'email' => 'ketua_kamar@gmail.com',
                'password' => Hash::make('passwordAdmin123'),
                'role' => 'Ketua kamar'
            ],
            [
                'id' => 5,
                'name' => 'Muhammad Yusuf Ridlo',
                'email' => 'yusufridlo16@gmail.com',
                'password' => Hash::make('password123!'),
                'role' => 'Pengurus Pondok'
            ],
            [
                'id' => 6,
                'name' => 'Rifki Hakim Pradana',
                'email' => 'rhp@gmail.com',
                'password' => Hash::make('password123!'),
                'role' => 'Pengurus Asrama'
            ],
            [
                'id' => 7,
                'name' => 'Abdul Hamit',
                'email' => 'ahap@gmail.com',
                'password' => Hash::make('password123!'),
                'role' => 'Pengurus Asrama'
            ],
            [
                'id' => 8,
                'name' => 'Afandy',
                'email' => 'afap@gmail.com',
                'password' => Hash::make('password123!'),
                'role' => 'Pengurus Asrama'
            ],
            [
                'id' => 9,
                'name' => 'Muhammad Galih Riskiawan',
                'email' => 'mgr@gmail.com',
                'password' => Hash::make('password123!'),
                'role' => 'Ketua Kamar'
            ],
            [
                'id' => 10,
                'name' => 'Arif Khoirudin',
                'email' => 'akh@gmail.com',
                'password' => Hash::make('password123!'),
                'role' => 'Ketua Kamar'
            ],
            [
                'id' => 11,
                'name' => 'Oky Pratama Saputra',
                'email' => 'ops@gmail.com',
                'password' => Hash::make('password123!'),
                'role' => 'Ketua Kamar'
            ],
            [
                'id' => 12,
                'name' => 'Robingu Adi Guna',
                'email' => 'rag@gmail.com',
                'password' => Hash::make('password123!'),
                'role' => 'Ketua Kamar'
            ],
            [
                'id' => 13,
                'name' => 'Revan Eka Saputra',
                'email' => 'res@gmail.com',
                'password' => Hash::make('password123!'),
                'role' => 'Ketua Kamar'
            ],
            [
                'id' => 14,
                'name' => 'Aulia Pratama Putra',
                'email' => 'app@gmail.com',
                'password' => Hash::make('password123!'),
                'role' => 'Ketua Kamar'
            ],
        ])->each(function ($user){
            DB::table('users')->insert($user);
        });
    }
}
