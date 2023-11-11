<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\supplierController;
use App\Http\Controllers\Api\ApiCustomerController;
use App\Http\Controllers\Api\ApiCategoriesController;
use App\Http\Controllers\Api\ApiProductController;

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

//SUPPLIERS
Route::get('supplier',[SupplierController::class,'index']); //show table
Route::post('supplier',[SupplierController::class,'store']); //add supplier
Route::get('supplier/{id}',[SupplierController::class,'show']); 
Route::get('supplier/{id}/edit',[SupplierController::class,'edit']); //show info supplier
Route::post('supplier/{id}/edit',[SupplierController::class,'update']); //update info supplier
Route::get('supplier/{id}/delete',[SupplierController::class,'destroy']); //delete supplier
Route::get('supplier/{code}/find',[SupplierController::class,'findbycode']); //find supplier by code

//CUSTOMER
Route::get('customer',[ApiCustomerController::class,'index']);
Route::post('customer',[ApiCustomerController::class,'store']);
Route::get('customer/{code}/find',[ApiCustomerController::class,'findbycode']);
Route::get('/customer/{id}',[ApiCustomerController::class,'show']);
Route::post('customer/{id}/edit',[ApiCustomerController::class,'update']);
Route::get('customer/{id}/delete',[ApiCustomerController::class,'destroy']);

//Categories
Route::post('/categories',[ApiCategoriesController::class,'create']);
Route::post('categories/{id}/update',[ApiCategoriesController::class,'update']);
Route::get('categories/{id}/delete',[ApiCategoriesController::class,'delete']);
Route::get('categories/{id}/show',[ApiCategoriesController::class,'show']);

//products
Route::post('product',[ApiProductController::class,'store']);
Route::post('product/{id}/update',[ApiProductController::class,'update']);
Route::get('product/{id}/delete',[ApiProductController::class,'destroy']);
Route::get('product/{id}/show',[ApiProductController::class,'show']);

