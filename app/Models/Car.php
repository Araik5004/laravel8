<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

    public static function AddCars( $request )
    {
        $cars = new Car();
        $cars->status = $request->status === 'on' ? 1 : 0;
        $max_sort = Car::max( 'sort' );
        $cars->sort = $max_sort ? ++$max_sort : 1;
        $cars->model = $request->model;
        $cars->year = $request->year;
        $cars->number = $request->number;
        $cars->color = $request->color;
        $cars->transmission = $request->transmission;
        $cars->rent_price_per_day = $request->rent_price_per_day;
        if ( $request->hasFile( 'file' ) )
        {
            $destination = 'uploads/car';
            $extension = $request->file( 'file' )->getClientOriginalExtension();
            $fileName = mt_rand( 11111, 99999 ) . time() . '.' . $extension;
            $request->file( 'file' )->move( $destination, $fileName );
            $image_src = '/uploads/car/' . $fileName;
            $cars->image = $image_src;
        }


        if ( $cars->save() )
        {
            return true;
        }
        return false;
    }

    public static function UpdateCars( $request, Car $cars )
    {
        $cars->status = $request->status === 'on' ? 1 : 0;
        $cars->model = $request->model;
        $cars->year = $request->year;
        $cars->number = $request->number;
        $cars->color = $request->color;
        $cars->transmission = $request->transmission;
        $cars->rent_price_per_day = $request->rent_price_per_day;
        if ( $request->hasFile( 'file' ) )
        {
            $destination = 'uploads/car';
            $extension = $request->file( 'file' )->getClientOriginalExtension();
            $fileName = mt_rand( 11111, 99999 ) . time() . '.' . $extension;
            $request->file( 'file' )->move( $destination, $fileName );
            $image_src = '/uploads/car/' . $fileName;
            $cars->image = $image_src;
        }
        
        if ( $cars->update() )
        {
            return true;
        }

        return false;
    }

    public static function GetAll( $paginate = 10, $order_field = 'cars.sort', $ord_dir = 'asc' )
    {
        $items = Car::leftjoin( 'modelcars', 'cars.model', 'modelcars.id' )
                ->leftjoin( 'brands', 'brands.id', 'modelcars.brand' )
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
                        , 'modelcars.name as modelcar_name'
                        , 'brands.name as brand_name'
                )
                ->orderBy( $order_field, $ord_dir )
                ->paginate( $paginate )
        ;

        return $items;
    }

}
