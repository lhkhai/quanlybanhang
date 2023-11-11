<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\supplierController;
use App\Models\supplier;
use App\Models\customer;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use Carbon\Carbon;

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

Route::get('/', function () {
    return view('manage');
});
Route::get('/manage',function() {return view('manage');});  //page default
Route::get('/supplier',[SupplierController::class,'index']); //page supplier default
Route::get('/supplier={numrow}',[SupplierController::class,'getData']); //load pages when selecting numrow to display

Route::get('/customer',[CustomerController::class,'index']);
Route::get('/customer&perpage={rowperpage}',[CustomerController::class,'getData']);
Route::get('customer/search',[CustomerController::class,'search']);

Route::get('/categories',[CategoriesController::class,'index']);
Route::get('/categories&perpage={rowperpage}',[CategoriesController::class,'getData']);

Route::get('/product{rowperpage?}',[ProductController::class,'index'])->name('product');
Route::get('product/search',[ProductController::class,'search']);



