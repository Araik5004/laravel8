<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [];
        for ($i = 1; $i <= 3; $i++) {
            $brands[] = [
                'name' => 'brand '.$i,
                'status' => 1,
                'sort' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        DB::table('brands')->insert($brands);
    }
}
