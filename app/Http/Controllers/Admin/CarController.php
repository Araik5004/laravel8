<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CarRequest;
use App\Models\Car;
use App\Models\Modelcar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarController extends BaseController
{
    public function index(): View
    {
        return view('administrator.car.index', [
            'items' => Car::GetAll(),
        ]);
    }

    public function create(): View
    {
        return view('administrator.car.add', [
            'modelcars' => Modelcar::GetAll()
        ]);
    }

    public function store(CarRequest $request): Response
    {
        $carInsert = Car::AddCars($request);
        if ( ! $carInsert) {
            $request->session()->flash('error_add', trans('admin.error_add'));
            return redirect()->back();
        }

        $request->session()->flash('dane_add', trans('admin.dane_add'));

        return redirect()->route('cars.index');
    }

    public function show(int $id): void
    {
    }

    /**
     * @return View | Response
     */
    public function edit(int $id)
    {
        $item = Car::find($id);

        if ( ! $item) {
            return redirect()->back();
        }

        return view('administrator.car.edit', [
            'item' => $item,
            'modelcars' => Modelcar::GetAll()
        ]);
    }

    public function update(CarRequest $request, int $id): Response
    {
        $car = Car::find($id);

        if ( ! $car) {
            return redirect()->back();
        }

        $carUpdate = Car::UpdateCars($request, $car);

        if ( ! $carUpdate) {
            $request->session()->flash('error_add', trans('admin.error_add'));
            return redirect()->back();
        }

        $request->session()->flash('dane_add', trans('admin.dane_add'));

        return redirect()->route('cars.index');
    }

    public function destroy(int $id): Response
    {
        $car = Car::find($id);
        if ( ! $car || ! $car->delete()) {
            return response()->json(['status' => 0]);
        }
        return response()->json(['status' => 1]);
    }

    public function changeStatus(Request $request): Response
    {
        $id = $request->get('id');
        $car = Car::find($id);
        if ( ! $car) {
            return response()->json(['status' => 0]);
        }

        $car->status = ! $car->status;
        if ( ! $car->update()) {
            return response()->json(['status' => 0]);
        }

        return response()->json(['status' => 1]);
    }

    public function orderingCar(Request $request): bool
    {
        $orders = json_decode($request->get('ordering'));
        foreach ($orders as $value) {
            $question = Car::find($value[0]);
            if ($question) {
                $question->sort = $value[1];
            }

            if ( ! $question->save()) {
                return false;
            }
        }

        return true;
    }
}
