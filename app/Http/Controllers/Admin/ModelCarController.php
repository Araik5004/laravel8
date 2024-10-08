<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ModelCarOrderingRequest;
use App\Http\Requests\Admin\ModelCarRequest;
use App\Http\Requests\Admin\ModelChangeStatusRequest;
use App\Models\Brand;
use App\Models\ModelCar;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\Response;

class ModelCarController extends BaseController
{
    public function index(): View
    {
        return view('administrator.model_car.index', [
            'items' => ModelCar::GetAll(),
        ]);
    }

    public function create(): View
    {
        return view('administrator.model_car.add', [
            'brands' => Brand::getAll()
        ]);
    }

    public function store(ModelCarRequest $request): Response
    {
        $modelCarInsert = ModelCar::AddModelCars($request);

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

    public function edit(int $id): View|Response
    {
        $item = ModelCar::find($id);

        if ( ! $item) {
            return redirect()->back();
        }
        $brands = Brand::getAll();

        return view('administrator.model_car.edit', [
            'item' => $item,
            'brands' => $brands
        ]);
    }

    public function update(ModelCarRequest $request, int $id): Response
    {
        $modelCar = ModelCar::find($id);

        if ( ! $modelCar) {
            return redirect()->back();
        }

        $modelCarUpdate = ModelCar::UpdateModelCar($request, $modelCar);

        if ( ! $modelCarUpdate) {
            $request->session()->flash('error_add', trans('admin.error_add'));
            return redirect()->back();
        }

        $request->session()->flash('dane_add', trans('admin.dane_add'));

        return redirect()->route('modelcars.index');
    }

    public function destroy(int $id): Response
    {
        $modelCar = ModelCar::find($id);
        if ( ! $modelCar || ! $modelCar->delete()) {
            return response()->json(['status' => 0]);
        }
        return response()->json(['status' => 1]);
    }

    public function changeStatus(ModelChangeStatusRequest $request): Response
    {
        $id = $request->get('id');
        $modelCar = ModelCar::find($id);
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
            $question = ModelCar::find($value[0]);
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
