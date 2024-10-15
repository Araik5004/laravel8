<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Car extends Model
{
    private int $status;
    private int $sort;
    private int $model;
    private string $year;
    private int $number;
    private int $transmission;
    private float $rent_price_per_day;
    private string $image;
    private string $color;

    private const UPLOAD_FILE_DESTINATION = 'uploads/car';

    public static function AddCar(Request $request): bool
    {
        $cars = new Car();
        $status = $request->get('status') === 'on' ? 1 : 0;
        $maxSort = Car::max('sort');
        $sort = $maxSort ? ++$maxSort : 1;

        $cars->setSort($sort);
        $cars->setModel($request->get('model'));
        $cars->setYear($request->get('year'));
        $cars->setNumber($request->get('number'));
        $cars->setColor($request->get('color'));
        $cars->setTransmission($request->get('transmission'));
        $cars->setRentPricePerDay($request->get('rent_price_per_day'));
        $cars->setStatus($status);

        if ($request->hasFile('file')) {
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = mt_rand(11111, 99999).time().'.'.$extension;
            $request->file('file')->move(self::UPLOAD_FILE_DESTINATION, $fileName);
            $imageSrc = '/'.self::UPLOAD_FILE_DESTINATION.'/'.$fileName;
            $cars->setImage($imageSrc);
        }

        if ($cars->save()) {
            return true;
        }
        return false;
    }

    public static function UpdateCars(Request $request, Car $cars): bool
    {
        $cars->setModel($request->get('model'));
        $cars->setYear($request->get('year'));
        $cars->setNumber($request->get('number'));
        $cars->setColor($request->get('color'));
        $cars->setTransmission($request->get('transmission'));
        $cars->setRentPricePerDay($request->get('rent_price_per_day'));
        $status = $request->get('status') === 'on' ? 1 : 0;
        $cars->setStatus($status);
        if ($request->hasFile('file')) {
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = mt_rand(11111, 99999).time().'.'.$extension;
            $request->file('file')->move(self::UPLOAD_FILE_DESTINATION, $fileName);
            $image_src = '/'.self::UPLOAD_FILE_DESTINATION.'/'.$fileName;
            $cars->image = $image_src;
        }

        if ($cars->update()) {
            return true;
        }

        return false;
    }

    public static function GetAll(
        int $paginate = 10,
        string $order_field = 'cars.sort',
        string $ord_dir = 'asc'
    ): mixed {
        return Car::leftjoin('model_cars', 'cars.model', 'model_cars.id')
            ->leftjoin('brands', 'brands.id', 'model_cars.brand')
            ->select(
                'cars.id'
                , 'cars.image'
                , 'cars.year'
                , 'cars.number'
                , 'cars.color'
                , 'cars.transmission'
                , 'cars.rent_price_per_day'
                , 'cars.status'
                , 'cars.sort'
                , 'model_cars.name AS modelcar_name'
                , 'brands.name as brand_name'
            )
            ->orderBy($order_field, $ord_dir)
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

    public function getModel(): int
    {
        return $this->model;
    }

    public function setModel(int $model): void
    {
        $this->model = $model;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function setYear(string $year): void
    {
        $this->year = $year;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): void
    {
        $this->number = $number;
    }

    public function getRentPricePerDay(): float
    {
        return $this->rent_price_per_day;
    }

    public function setRentPricePerDay(float $rentPricePerDay): void
    {
        $this->rent_price_per_day = $rentPricePerDay;
    }

    private function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getTransmission(): int
    {
        return $this->transmission;
    }

    public function setTransmission(int $transmission): void
    {
        $this->transmission = $transmission;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }
}
