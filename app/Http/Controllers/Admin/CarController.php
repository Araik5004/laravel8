<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Modelcar;
use App\Http\Requests\CarRequest;

class CarController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Car::GetAll();
        return view( 'Administrator.car.index', [
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
        $modelcars = Modelcar::GetAll();
        return view( 'Administrator.car.add', [
            'modelcars' => $modelcars
                ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store( CarRequest $request )
    {
        $CarInsert = Car::AddCars( $request );
        if ( !$CarInsert )
        {
            $request->session()->flash( 'error_add', trans( 'admin.error_add' ) );
            return redirect()->back();
        }

        $request->session()->flash( 'dane_add', trans( 'admin.dane_add' ) );

        return redirect()->route( 'cars.index' );
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
        $item = Car::find( $id );

        if ( !$item )
        {
            return redirect()->back();
        }
        $modelcars = Modelcar::GetAll();

        return view( 'Administrator.car.edit', [
            'item' => $item,
            'modelcars' => $modelcars
                ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CarRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( CarRequest $request, $id )
    {
        $Car = Car::find( $id );

        if ( !$Car )
        {
            return redirect()->back();
        }

        $CarUpdate = Car::UpdateCars( $request, $Car );

        if ( !$CarUpdate )
        {
            $request->session()->flash( 'error_add', trans( 'admin.error_add' ) );
            return redirect()->back();
        }

        $request->session()->flash( 'dane_add', trans( 'admin.dane_add' ) );

        return redirect()->route( 'cars.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $Car = Car::find( $id );
        if ( !$Car || !$Car->delete() )
        {
            return response()->json( ['status' => 0] );
        }
        return response()->json( ['status' => 1] );
    }

    public function changeStatus( Request $request )
    {
        $ID = $request->id;
        $Car = Car::find( $ID );
        if ( !$Car )
        {
            return response()->json( ['status' => 0] );
        }

        $Car->status = $Car->status ? 0 : 1;
        if ( !$Car->update() )
        {
            return response()->json( ['status' => 0] );
        }

        return response()->json( ['status' => 1] );
    }

    public function orderingCar( Request $request )
    {
        $orders = json_decode( $request->ordering );
        foreach ( $orders as $value )
        {
            $question = Car::find( $value[ 0 ] );
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
