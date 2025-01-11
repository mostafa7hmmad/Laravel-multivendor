<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('api.auth')->group(function () {
    Route::get('cat/{id?}',[APIController::class,'index']);
    Route::get('subcat/{id?}',[APIController::class,'sub']);
    Route::get('clients/',[APIController::class,'client']);
    Route::get('customers/',[APIController::class,'customer']);
    Route::get('Admins/',[APIController::class,'admin']);
    Route::post('Admins/add/',[APIController::class,'add']);
    Route::post('Admins/update/',[APIController::class,'update']);
    Route::post('Admin/delete/',[APIController::class,'delete']);
    Route::get('admin/search', [APIController::class, 'search']);


});










