<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\BrandRequest;

class BrandController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Brand::GetAll();
        return view( 'Administrator.brand.index', [
            'items' => $items
                ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'Administrator.brand.add' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( BrandRequest $request )
    {

        $BrandInsert = Brand::AddBrands( $request );

        if ( !$BrandInsert )
        {
            $request->session()->flash( 'error_add', trans( 'admin.error_add' ) );
            return redirect()->back();
        }

        $request->session()->flash( 'dane_add', trans( 'admin.dane_add' ) );

        return redirect()->route( 'brands.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $item = Brand::find( $id );

        if ( !$item )
        {
            return redirect()->back();
        }

        return view( 'Administrator.brand.edit', ['item' => $item] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( BrandRequest $request, $id )
    {
        $Brand = Brand::find( $id );
        
        if ( !$Brand )
        {
            return redirect()->back();
        }

        $BrandUpdate = Brand::UpdateBrands( $request, $Brand );

        if ( !$BrandUpdate )
        {
            $request->session()->flash( 'error_add', trans( 'admin.error_add' ) );
            return redirect()->back();
        }

        $request->session()->flash( 'dane_add', trans( 'admin.dane_add' ) );

        return redirect()->route( 'brands.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $Brand = Brand::find( $id );
        if ( !$Brand )
        {
            return response()->json( ['status' => 0] );
        }

        if ( !$Brand->delete() )
        {
            return response()->json( ['status' => 0] );
        }

        return response()->json( ['status' => 1] );
    }

    public function changeStatus( Request $request )
    {
        $ID = $request->id;
        $Brand = Brand::find( $ID );
        if ( !$Brand )
        {
            return response()->json( ['status' => 0] );
        }

        $Brand->status = $Brand->status ? 0 : 1;
        if ( !$Brand->update() )
        {
            return response()->json( ['status' => 0] );
        }

        return response()->json( ['status' => 1] );
    }

    public function orderingBrand( Request $request )
    {
        $orders = json_decode( $request->ordering );
        foreach ( $orders as $value )
        {
            $question = Brand::find( $value[ 0 ] );
            if ( $question )
            {
                $question->sort = $value[ 1 ];
            }

            if ( !$question->save() )
            {
                return false;
            }
        }

        return "success";
    }

}
