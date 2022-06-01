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
        User::create([
            'name' => 'Muhammad Yusuf Ridlo',
            'email' => 'yusufridlo16@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'Pengurus Pondok'
        ]);

        User::create([
            'name' => 'Rifki Hakim Pradana',
            'email' => 'rhp@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'Pengurus Asrama'
        ]);

        User::create([
            'name' => 'Abdul Hamit',
            'email' => 'ahap@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'Pengurus Asrama'
        ]);

        User::create([
            'name' => 'Afandy',
            'email' => 'afap@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'Pengurus Asrama'
        ]);

        User::create([
            'name' => 'Muhammad Galih Riskiawan',
            'email' => 'mgr@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'Ketua Kamar'
        ]);
        
        User::create([
            'name' => 'Arif Khoirudin',
            'email' => 'akh@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'Ketua Kamar'
        ]);

        User::create([
            'name' => 'Oky Pratama Saputra',
            'email' => 'ops@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'Ketua Kamar'
        ]);

        User::create([
            'name' => 'Robingu Adi Guna',
            'email' => 'rag@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'Ketua Kamar'
        ]);

        User::create([
            'name' => 'Revan Eka Saputra',
            'email' => 'res@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'Ketua Kamar'
        ]);

        User::create([
            'name' => 'Aulia Pratama Putra',
            'email' => 'app@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'Ketua Kamar'
        ]);

        Dormitory::create([
            'name' => 'Al-Bariyah',
            'user_id' => 2,
        ]);

        Dormitory::create([
            'name' => "Al-Ja'fariyah",
            'user_id' => 3,
        ]);

        Dormitory::create([
            'name' => 'Al-Banjaryah',
            'user_id' => 4,
        ]);

        Room::create([
            'name' => 'Sunan Giri',
            'user_id' => 5,
            'dormitory_id' => 1
        ]);

        Room::create([
            'name' => 'Sunan Bonang',
            'user_id' => 6,
            'dormitory_id' => 1
        ]);

        Room::create([
            'name' => 'Sunan Kudus',
            'user_id' => 7,
            'dormitory_id' => 2
        ]);

        Room::create([
            'name' => 'Sunan Kalijaga',
            'user_id' => 8,
            'dormitory_id' => 2
        ]);

        Room::create([
            'name' => 'Umar Bin Khattab',
            'user_id' => 9,
            'dormitory_id' => 3
        ]);

        Room::create([
            'name' => 'Usman Bin Affan',
            'user_id' => 10,
            'dormitory_id' => 3
        ]);

        Student::create([
            'nis'  => 2021001500,
            'name' => 'Ahmad Anshori Yahya',
            'address' => 'Bangun Jaya',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Rian',
            'room_id' => 1
        ]);

        Student::create([
            'nis'  => 2021001501,
            'name' => 'Agus Ansyory',
            'address' => 'Bangun Jaya',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Agus',
            'room_id' => 1
        ]);

        Student::create([
            'nis'  => 2021001502,
            'name' => 'Dimas Lucky Pradana',
            'address' => 'Sungai Rangit',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Dimas',
            'room_id' => 1
        ]);

        Student::create([
            'nis'  => 2021001502,
            'name' => 'Lutpy Septiansyah',
            'address' => 'Sawit Kusuma',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Lutpy',
            'room_id' => 2
        ]);

        Student::create([
            'nis'  => 2021001502,
            'name' => 'Halim',
            'address' => 'Nanga Bulik',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Kusuma',
            'room_id' => 2
        ]);

        Student::create([
            'nis'  => 2021001502,
            'name' => 'Krida Prigel Nugroho',
            'address' => 'Pangkalan Lada',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Krida',
            'room_id' => 2
        ]);
        
        Student::create([
            'nis'  => 2021001502,
            'name' => 'Widi',
            'address' => 'Lamandau',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Joko',
            'room_id' => 3
        ]);

        Student::create([
            'nis'  => 2021001502,
            'name' => 'Muhammad Aflah Azmi Ramadhan',
            'address' => 'Pembuang Hulu',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Azmi',
            'room_id' => 3
        ]);

        Student::create([
            'nis'  => 2021001502,
            'name' => 'Rizaldi Kurniawan',
            'address' => 'Kumai',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Rizal',
            'room_id' => 3
        ]);

        Student::create([
            'nis'  => 2021001502,
            'name' => 'Solihin',
            'address' => 'Sandul',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Lihin',
            'room_id' => 4
        ]);

        Student::create([
            'nis'  => 2021001502,
            'name' => 'Muhammad Fani Rahman',
            'address' => 'Natai Kondang',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Rahman',
            'room_id' => 4
        ]);

        Student::create([
            'nis'  => 2021001502,
            'name' => 'Muhammad Daniel Septiansyah',
            'address' => 'Madurejo',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Daniel',
            'room_id' => 4
        ]);

        Student::create([
            'nis'  => 2021001502,
            'name' => 'Erick Ardiansyah',
            'address' => 'Pesisir',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Ardi',
            'room_id' => 5
        ]);

        Student::create([
            'nis'  => 2021001502,
            'name' => 'Adi Kurniawan',
            'address' => 'Pangkalan Lima',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Kurni',
            'room_id' => 5
        ]);

        Student::create([
            'nis'  => 2021001502,
            'name' => 'Yordy',
            'address' => 'Batu Ampar',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Toni',
            'room_id' => 5
        ]);

        Student::create([
            'nis'  => 2021001502,
            'name' => 'Nur Ali Gupron',
            'address' => 'Sukamandang',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Ali',
            'room_id' => 6
        ]);

        Student::create([
            'nis'  => 2021001502,
            'name' => 'Abdul Rahmanto',
            'address' => 'Madurejo',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Manto',
            'room_id' => 6
        ]);

        Student::create([
            'nis'  => 2021001502,
            'name' => 'Ahmad Imam Sarbini',
            'address' => 'Pantai Lunci',
            'date_of_birth' => '2004-05-14',
            'gender' => 'Laki-laki',
            'wali' => 'Aim',
            'room_id' => 6
        ]);



    }
}
