<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminsSeeder::class,
            BrandsSeeder::class,
            ModelcarsSeeder::class,
            CarsSeeder::class,
        ]);
    }
}
