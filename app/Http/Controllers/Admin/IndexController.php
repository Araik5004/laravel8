<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Modelcar;
use Illuminate\Contracts\View\View;

class IndexController extends BaseController
{
    public $data = [];

    public function index(): View
    {
        $brands = Brand::all();
        $models = Modelcar::all();
        $cars = Car::all();
        return view('administrator.index.index', [
            'brands' => $brands->count(),
            'models' => $models->count(),
            'cars' => $cars->count(),
        ]);
    }
}
