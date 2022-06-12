<?php

namespace Database\Seeders;

use App\Models\JenisKontrakan;
use App\Models\Kontrakan;
use App\Models\KontrakanDetail;
use App\Models\KontrakanIsi;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();

        JenisKontrakan::factory(2)->create();
        KontrakanDetail::factory(4)->create();
        KontrakanIsi::factory(4)->create();
        Kontrakan::factory(6)->create();
        UserProfile::factory(5)->create();
    }
}
