<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ModelcarController;
use App\Http\Controllers\Admin\CarController;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */


Route::get( '/', function ()
{
    return view( 'welcome' );
} );


Route::get( 'admin/login', [LoginController::class, 'index'] )->middleware( 'AdminLogin' )->name( 'LoginPageAdmin' );
Route::post( 'admin/singin', [LoginController::class, 'singin'] )->middleware( 'AdminLogin' )->name( 'LoginAdmin' );
Route::post( 'admin/logout', [LoginController::class, 'logout'] )->name( 'LogoutAdmin' );


Route::middleware( 'admin' )->group( function ()
{

    Route::prefix( 'admin' )->group( function ()
    {
        Route::get( '/', [IndexController::class, 'index'] )->name( 'AdminMainPage' );

        //resource Brand
        Route::resource( 'brands', BrandController::class );
        Route::post( 'brands/changestatus', [BrandController::class, 'changeStatus'] )->name( 'AdminChangeStatusBrand' );
        Route::post( 'brands/ordering', [BrandController::class, 'orderingBrand'] )->name( 'orderingBrand' );
        
        
        //resource Modelcar
        Route::resource( 'modelcars', ModelcarController::class );
        Route::post( 'modelcars/changestatus', [ModelcarController::class, 'changeStatus'] )->name( 'AdminChangeStatusModelcar' );
        Route::post( 'modelcars/ordering', [ModelcarController::class, 'orderingModelcar'] )->name( 'orderingModelcar' );
        
        
        //resource Car
        Route::resource( 'cars', CarController::class );
        Route::post( 'cars/changestatus', [CarController::class, 'changeStatus'] )->name( 'AdminChangeStatusCar' );
        Route::post( 'cars/ordering', [CarController::class, 'orderingCar'] )->name( 'orderingCar' );

    } );
} );

