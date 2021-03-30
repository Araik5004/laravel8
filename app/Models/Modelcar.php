<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Modelcar extends Model
{

    public static function AddModelcars( $request )
    {
        $modelcars = new Modelcar();
        $modelcars->status = $request->status === 'on' ? 1 : 0;
        $max_sort = Modelcar::max( 'sort' );
        $modelcars->sort = $max_sort ? ++$max_sort : 1;
        $modelcars->brand = $request->brand;
        $modelcars->name = $request->name;
        if ( $modelcars->save() )
        {
            return true;
        }
        return false;
    }

    public static function UpdateModelcars( $request, Modelcar $modelcars )
    {
        $modelcars->status = $request->status === 'on' ? 1 : 0;
        $modelcars->name = $request->name;
        $modelcars->brand = $request->brand;

        if ( $modelcars->update() )
        {
            return true;
        }

        return false;
    }

    public static function GetAll( $paginate = 10 , $order_field = 'modelcars.sort', $ord_dir = 'asc')
    {
        $items = Modelcar::leftjoin('brands' ,'modelcars.brand','brands.id')
                ->select(
                        'modelcars.id'
                        ,'modelcars.brand'
                        ,'modelcars.name'
                        ,'modelcars.status'
                        ,'modelcars.sort'
                        ,'brands.name as brand_name'
                        )
                ->orderBy( $order_field, $ord_dir )
                ->paginate($paginate)
        ;

        return $items;
    }

}
