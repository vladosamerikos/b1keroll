<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SponsorSeeder::class,
            RaceSeeder::class,
            InsuranceSeeder::class,
        ]);
    }
}
