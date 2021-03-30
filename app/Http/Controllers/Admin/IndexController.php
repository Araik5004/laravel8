<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Modelcar;
use App\Models\Car;


class IndexController extends BaseController
{

    public $data = [];

    public function index()
    {

        $brands = Brand::all();
        $models = Modelcar::all();
        $cars = Car::all();
        return view('Administrator.index.index' , [
            'brands' => $brands->count(),
            'models' => $models->count(),
            'cars' => $cars->count(),
        ]);
    }


}
