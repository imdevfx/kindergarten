<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Regions\DistrictController;
use App\Http\Controllers\Regions\RegionController;
use App\Http\Controllers\Tests\TestController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);
Route::get('region/all', [RegionController::class,'getAll']);

Route::group(['middleware' => ['auth:sanctum']], function (){

    //    ADMIN
    Route::group(['prefix' => 'dashboard','middleware' => ['role:administrator']],function (){
        Route::get('data', [RegionController::class,'index']);
        Route::post('create/data', [RegionController::class,'store']);
        Route::post('update/data', [RegionController::class,'update']);
        Route::post('delete/data', [RegionController::class,'destroy']);

    //    TESTS
        Route::get('tests', [TestController::class, 'questions']);
        Route::post('tests',[TestController::class,'store']);


    //    FOYDALANUVCHILAR RUYXATI
        Route::get('users', [UserController::class,'paginate']);

        Route::prefix('statistics')->controller(\App\Http\Controllers\Statistics\StatisticController::class)->group(function () {
            Route::get('/overview', 'overview');
            Route::get('/by-region', 'byRegion');
            Route::get('/by-neighborhood', 'byNeighborhood');
            Route::get('/by-district', 'byDistrict');
            Route::get('/by-company', 'byCompany');
            Route::get('/user-activity', 'userActivity');
            Route::get('/leaderboard', 'leaderboard');
            Route::get('/daily-stats', 'dailyStats');
            Route::get('/export', 'exportSummary');
        });


    });


    Route::group(['middleware' => ['role:educator|administrator']], function () {
        // Kategoriyalar ro'yxati + qaysilari ishlangan (is_completed flag bilan)
        Route::get('questions', [TestController::class, 'questions']);

        // Test topshirish
        Route::post('submit', [TestController::class, 'saveAnswer']);

        // Bitta natijani ko'rish
        Route::get('result/{response_id}', [TestController::class, 'result']);

        // Barcha topshirilgan kategoriyalar natijalari
        Route::get('my-results', [TestController::class, 'myResults']);
    });
});


