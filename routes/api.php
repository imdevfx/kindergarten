<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Regions\DistrictController;
use App\Http\Controllers\Regions\RegionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login',[AuthController::class,'login']);

Route::group(['prefix' => 'dashboard',['middleware' => ['auth:sanctum','role:administrator']]], function (){
    Route::get('region/all', [RegionController::class,'getAll']);
    Route::get('data', [RegionController::class,'index']);
    Route::post('create/data', [RegionController::class,'store']);
    Route::post('update/data', [RegionController::class,'update']);
    Route::post('delete/data', [RegionController::class,'destroy']);
});
