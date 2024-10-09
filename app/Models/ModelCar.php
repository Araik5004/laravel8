<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ModelCar extends Model
{
    private int $status;
    private int $sort;
    private int $brand;
    private int $name;

    public static function AddModelCars(Request $request): bool
    {
        $modelCar = new ModelCar();
        $status = $request->get('status') === 'on' ? 1 : 0;
        $modelCar->setStatus($status);

        $maxSort = ModelCar::max('sort');
        $sort = $maxSort ? ++$maxSort : 1;
        $modelCar->setSort($sort);

        $modelCar->setBrand($request->get('brand'));
        $modelCar->setName($request->get('name'));

        if ($modelCar->save()) {
            return true;
        }
        return false;
    }

    public static function UpdateModelCar(Request $request, ModelCar $modelCar): bool
    {
        $status = $request->get('status') === 'on' ? 1 : 0;
        $modelCar->setStatus($status);
        $modelCar->setBrand($request->get('brand'));
        $modelCar->setName($request->get('name'));

        if ($modelCar->update()) {
            return true;
        }

        return false;
    }

    public static function GetAll(
        int $paginate = 10,
        string $orderField = 'modelcars.sort',
        string $ord_dir = 'asc'
    ) {
        return ModelCar::leftjoin('brands', 'modelcars.brand', 'brands.id')
            ->select(
                'modelcars.id'
                , 'modelcars.brand'
                , 'modelcars.name'
                , 'modelcars.status'
                , 'modelcars.sort'
                , 'brands.name as brand_name'
            )
            ->orderBy($orderField, $ord_dir)
            ->paginate($paginate);
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getSort(): int
    {
        return $this->sort;
    }

    public function setSort(int $sort): void
    {
        $this->sort = $sort;
    }

    public function getBrand(): int
    {
        return $this->brand;
    }

    public function setBrand(int $brand): void
    {
        $this->brand = $brand;
    }

    public function getName(): int
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
