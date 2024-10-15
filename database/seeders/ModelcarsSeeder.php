<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ModelcarsSeeder extends Seeder
{
    public function run(): void
    {
        $brands = DB::table('brands')->select('id')->get();
        $brands_id = [];
        if ($brands->count()) {
            foreach ($brands as $brand) {
                $brands_id[] = $brand->id;
            }
        }

        $models = [];
        for ($i = 1; $i <= 3; $i++) {
            $brand_id = 0;
            if ($brands_id) {
                $brand_id = Arr::random($brands_id);
            }
            $models[] = [
                'brand' => $brand_id,
                'name' => 'model '.$i,
                'status' => 1,
                'sort' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        DB::table('model_cars')->insert($models);
    }
}
