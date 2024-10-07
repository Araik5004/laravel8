<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ModelCarOrderingRequest;
use App\Http\Requests\Admin\ModelChangeStatusRequest;
use App\Http\Requests\ModelCarRequest;
use App\Models\Brand;
use App\Models\Modelcar;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\Response;

class ModelCarController extends BaseController
{
    public function index(): View
    {
        return view('Administrator.model_car.index', [
            'items' => Modelcar::GetAll(),
        ]);
    }

    public function create(): View
    {
        return view('Administrator.model_car.add', [
            'brands' => Brand::getAll()
        ]);
    }

    public function store(ModelCarRequest $request): Response
    {
        $modelCarInsert = Modelcar::AddModelcars($request);

        if ( ! $modelCarInsert) {
            $request->session()->flash('error_add', trans('admin.error_add'));
            return redirect()->route('AdminPageModelCar');
        }

        $request->session()->flash('dane_add', trans('admin.dane_add'));

        return redirect()->route('modelcars.index');
    }

    public function show(int $id): void
    {
    }

    /**
     * @return View | Response
     */
    public function edit(int $id)
    {
        $item = Modelcar::find($id);

        if ( ! $item) {
            return redirect()->back();
        }
        $brands = Brand::getAll();

        return view('Administrator.model_car.edit', [
            'item' => $item,
            'brands' => $brands
        ]);
    }

    public function update(ModelCarRequest $request, int $id): Response
    {
        $modelCar = Modelcar::find($id);

        if ( ! $modelCar) {
            return redirect()->back();
        }

        $modelCarUpdate = Modelcar::UpdateModelcars($request, $modelCar);

        if ( ! $modelCarUpdate) {
            $request->session()->flash('error_add', trans('admin.error_add'));
            return redirect()->back();
        }

        $request->session()->flash('dane_add', trans('admin.dane_add'));

        return redirect()->route('modelcars.index');
    }

    public function destroy(int $id): Response
    {
        $modelCar = Modelcar::find($id);
        if ( ! $modelCar || ! $modelCar->delete()) {
            return response()->json(['status' => 0]);
        }
        return response()->json(['status' => 1]);
    }

    public function changeStatus(ModelChangeStatusRequest $request): Response
    {
        $id = $request->get('id');
        $modelCar = Modelcar::find($id);
        if ( ! $modelCar) {
            return response()->json(['status' => 0]);
        }

        $modelCar->status = ! $modelCar->status;
        if ( ! $modelCar->update()) {
            return response()->json(['status' => 0]);
        }

        return response()->json(['status' => 1]);
    }

    public function orderingModelCar(ModelCarOrderingRequest $request): bool
    {
        $orders = json_decode($request->get('ordering'));
        foreach ($orders as $value) {
            $question = Modelcar::find($value[0]);
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
