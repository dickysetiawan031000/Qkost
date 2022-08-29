<?php

namespace Database\Seeders;

use App\Models\JenisKontrakan;
use App\Models\Kontrakan;
use App\Models\KontrakanDetail;
use App\Models\KontrakanIsi;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(5)->create();

        // JenisKontrakan::factory(2)->create();
        // KontrakanDetail::factory(6)->create();
        // KontrakanIsi::factory(4)->create();
        // Kontrakan::factory(6)->create();
        // UserProfile::factory(5)->create();
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 1,
            'status' => 'aktif'

        ]);

        DB::table('jenis_kontrakans')->insert([
            'nama' => '1 Pintu',
            'alamat' => 'Jl.Bintara 14 Kp.Bojong RT 006/RW 004',
            'harga' => 500000,
        ]);

        DB::table('jenis_kontrakans')->insert([
            'nama' => '2 Pintu',
            'alamat' => 'Jl.Bintara 14 Kp.Bojong RT 006/RW 004',
            'harga' => 700000,
        ]);

        DB::table('jenis_kontrakans')->insert([
            'nama' => '3 Pintu',
            'alamat' => 'Jl.Bintara 14 Kp.Bojong RT 003/RW 001',
            'harga' => 1000000,
        ]);

        DB::table('users')->insert([
            'name' => 'Dicky Setiawan',
            'email' => 'dickysetiawan031000@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 2,
            'status' => 'aktif'
        ]);

        DB::table('users')->insert([
            'name' => 'Zaqi Setiawan',
            'email' => 'dwizaqisetiawan101212@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 2,
            'status' => 'aktif'
        ]);

        // DB::table('user_profiles')->insert([
        //     'user_id' => 1,
        //     'pekerjaan', 'Mahasiswa',
        //     'no_telp' => '02139231750',
        //     'ktp_nik' => '327502031000018',
        //     'ktp_image' => 'https://www.loveindonesia.com/viral/assets/images/news/20201225/5fe5e95a67f6076f7a8b4567.jpg',
        //     'avatar' => 'https://www.kindpng.com/picc/m/52-526237_avatar-profile-hd-png-download.png'
        // ]);
    }
}
