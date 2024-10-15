<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CarsSeeder extends Seeder
{
    public function run(): void
    {
        $models = DB::table('modelcars')->select('id')->get();
        $models_id = [];
        if ($models->count()) {
            foreach ($models as $model) {
                $models_id[] = $model->id;
            }
        }

        $cars = [];
        $colors = [
            'red',
            'green',
            'black'
        ];
        for ($i = 1; $i <= 3; $i++) {
            $model_id = 0;
            if ($models_id) {
                $model_id = Arr::random($models_id);
            }
            shuffle($colors);
            $cars[] = [
                'model' => $model_id,
                'image' => '/uploads/car/default_image.png',
                'year' => rand(1950, 2021),
                'number' => rand(1000, 99999),
                'color' => $colors[0],
                'transmission' => rand(1, 2),
                'rent_price_per_day' => rand(100, 200) / 10,
                'status' => 1,
                'sort' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        DB::table('cars')->insert($cars);
    }
}
