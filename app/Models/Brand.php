<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $id)
 */
class Brand extends Model
{

    public static function AddBrands( $request )
    {
        $brands = new Brand();
        $brands->status = $request->status === 'on' ? 1 : 0;
        $max_sort = Brand::max( 'sort' );
        $brands->sort = $max_sort ? ++$max_sort : 1;
        $brands->name = $request->name;
        if ( $brands->save() )
        {
            return true;
        }
        return false;
    }

    public static function UpdateBrands( $request, Brand $brands )
    {
        $brands->status = $request->status === 'on' ? 1 : 0;
        $brands->name = $request->name;

        if ( $brands->update() )
        {
            return true;
        }

        return false;
    }

    public static function getAll( $paginate = 10, $order_field = 'sort', $ord_dir = 'asc' )
    {
        $items = Brand::
                select(
                        'brands.id'
                        , 'brands.name'
                        , 'brands.status'
                        , 'brands.sort'
                )
                ->orderBy( $order_field, $ord_dir )
                ->paginate( $paginate )
        ;

        return $items;
    }

}
