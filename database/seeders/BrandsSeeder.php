<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BrandsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [];
        for ( $i = 1; $i <= 3; $i++ )
        {
            $brands[] = [
                'name' => 'brand ' . $i,
                'status' => 1,
                'sort' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        \DB::table( 'brands' )->insert( $brands );
    }

}
