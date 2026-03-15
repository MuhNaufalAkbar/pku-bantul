<?php
// file: database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use App\Models\User;
use App\Models\CheckHarian;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        CheckHarian::truncate();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        // Buat satu user Admin
        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'PKU',
            'birth_date' => '1995-05-18', // Perbaiki format tanggal di sini
            'username' => 'admin',
            'email' => 'admin@pkubantul.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        // Buat 9 user Pengguna biasa dan data check-in untuk mereka
        User::factory(9)->create()->each(function ($user) {
            $treatmentStartDate = Carbon::instance(fake()->dateTimeBetween('-6 months', 'now'));
            $treatmentEndDate = $treatmentStartDate->copy()->addDays(29);

            for ($i = 0; $i < 30; $i++) {
                CheckHarian::factory()->create([
                    'user_id' => $user->id,
                    'tanggal' => fake()->dateTimeBetween($treatmentStartDate, $treatmentEndDate),
                ]);
            }
        });
    }
}