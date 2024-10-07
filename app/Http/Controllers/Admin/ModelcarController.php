<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Modelcar;
use App\Models\Brand;
use App\Http\Requests\ModelCarRequest;

class ModelcarController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Modelcar::GetAll();
        return view( 'Administrator.modelcar.index', [
            'items' => $items,
                ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::getAll();
        return view( 'Administrator.modelcar.add', [
            'brands' => $brands
                ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ModelcarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store( ModelCarRequest $request )
    {

        $ModelcarInsert = Modelcar::AddModelcars( $request );

        if ( !$ModelcarInsert )
        {
            $request->session()->flash( 'error_add', trans( 'admin.error_add' ) );
            return redirect()->route( 'AdminPageModelcar' );
        }

        $request->session()->flash( 'dane_add', trans( 'admin.dane_add' ) );

        return redirect()->route( 'modelcars.index' );
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
        $item = Modelcar::find( $id );

        if ( !$item )
        {
            return redirect()->back();
        }
        $brands = Brand::getAll();

        return view( 'Administrator.modelcar.edit', [
            'item' => $item,
            'brands' => $brands
                ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ModelcarRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( ModelCarRequest $request, $id )
    {
        $Modelcar = Modelcar::find( $id );

        if ( !$Modelcar )
        {
            return redirect()->back();
        }

        $ModelcarUpdate = Modelcar::UpdateModelcars( $request, $Modelcar );

        if ( !$ModelcarUpdate )
        {
            $request->session()->flash( 'error_add', trans( 'admin.error_add' ) );
            return redirect()->back();
        }

        $request->session()->flash( 'dane_add', trans( 'admin.dane_add' ) );

        return redirect()->route( 'modelcars.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $Modelcar = Modelcar::find( $id );
        if ( !$Modelcar || !$Modelcar->delete() )
        {
            return response()->json( ['status' => 0] );
        }
        return response()->json( ['status' => 1] );
    }

    public function changeStatus( Request $request )
    {
        $ID = $request->id;
        $Modelcar = Modelcar::find( $ID );
        if ( !$Modelcar )
        {
            return response()->json( ['status' => 0] );
        }

        $Modelcar->status = $Modelcar->status ? 0 : 1;
        if ( !$Modelcar->update() )
        {
            return response()->json( ['status' => 0] );
        }

        return response()->json( ['status' => 1] );
    }

    public function orderingModelcar( Request $request )
    {
        $orders = json_decode( $request->ordering );
        foreach ( $orders as $value )
        {
            $question = Modelcar::find( $value[ 0 ] );
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
