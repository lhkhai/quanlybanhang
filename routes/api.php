<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\supplierController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('supplier',[SupplierController::class,'index']);
//Route::post('supplier',[SupplierController::class,'store']);
Route::get('supplier/{id}',[SupplierController::class,'show']);
Route::get('supplier/{id}/edit',[SupplierController::class,'edit']);
Route::put('supplier/{id}/edit',[SupplierController::class,'update']);
Route::delete('supplier/{id}/delete',[SupplierController::class,'destroy']);
Route::post('supplier/{id}/edit',[SupplierController::class,'update']); ////test update bằng method post
Route::post('supplier',[SupplierController::class,'test']);