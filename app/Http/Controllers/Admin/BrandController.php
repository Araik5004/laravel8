<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends BaseController
{
    public function index(): View
    {
        $items = Brand::getAll();
        return view('Administrator.brand.index', [
            'items' => $items
        ]);
    }

    public function create(): View
    {
        return view('Administrator.brand.add');
    }

    public function store(BrandRequest $request): Response
    {
        $BrandInsert = Brand::AddBrands($request);

        if ( ! $BrandInsert) {
            $request->session()->flash('error_add', trans('admin.error_add'));
            return redirect()->back();
        }

        $request->session()->flash('dane_add', trans('admin.dane_add'));

        return redirect()->route('brands.index');
    }

    public function show(int $id): void
    {
    }

    /**
     * @return Response | View
     */
    public function edit(int $id)
    {
        $item = Brand::find($id);

        if ( ! $item) {
            return redirect()->back();
        }

        return view('Administrator.brand.edit', ['item' => $item]);
    }

    public function update(BrandRequest $request, int $id): Response
    {
        $Brand = Brand::find($id);

        if ( ! $Brand) {
            return redirect()->back();
        }

        $BrandUpdate = Brand::UpdateBrands($request, $Brand);

        if ( ! $BrandUpdate) {
            $request->session()->flash('error_add', trans('admin.error_add'));
            return redirect()->back();
        }

        $request->session()->flash('dane_add', trans('admin.dane_add'));

        return redirect()->route('brands.index');
    }

    public function destroy(int $id): Response
    {
        $Brand = Brand::find($id);
        if ( ! $Brand || ! $Brand->delete()) {
            return response()->json(['status' => 0]);
        }

        return response()->json(['status' => 1]);
    }

    public function changeStatus(Request $request): Response
    {
        $id = $request->get('id');
        $Brand = Brand::find($id);
        if ( ! $Brand) {
            return response()->json(['status' => 0]);
        }

        $Brand->status = $Brand->status ? 0 : 1;
        if ( ! $Brand->update()) {
            return response()->json(['status' => 0]);
        }

        return response()->json(['status' => 1]);
    }

    public function orderingBrand(Request $request): bool
    {
        $orders = json_decode($request->get('ordering'));
        foreach ($orders as $value) {
            $question = Brand::find($value[0]);
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
