<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ModelCarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', [LoginController::class, 'index'])->middleware('AdminLogin')->name('LoginPageAdmin');
Route::post('admin/sing_in', [LoginController::class, 'singIn'])->middleware('AdminLogin')->name('LoginAdmin');
Route::post('admin/logout', [LoginController::class, 'logout'])->name('LogoutAdmin');

Route::middleware('admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [IndexController::class, 'index'])->name('AdminMainPage');

        /** Resource Brand*/
        Route::resource('brands', BrandController::class);
        Route::post('brands/change_status', [BrandController::class, 'changeStatus'])->name('AdminChangeStatusBrand');
        Route::post('brands/ordering', [BrandController::class, 'orderingBrand'])->name('orderingBrand');

        /** Resource Model car*/
        Route::resource('modelcars', ModelCarController::class);
        Route::post('modelcars/change_status',
            [ModelCarController::class, 'changeStatus'])->name('AdminChangeStatusModelCar');
        Route::post('modelcars/ordering', [ModelCarController::class, 'orderingModelCar'])->name('orderingModelCar');

        /** Resource Car */
        Route::resource('cars', CarController::class);
        Route::post('cars/change_status', [CarController::class, 'changeStatus'])->name('AdminChangeStatusCar');
        Route::post('cars/ordering', [CarController::class, 'orderingCar'])->name('orderingCar');
    });
});

