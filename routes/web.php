<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\supplierController;
use App\Models\supplier;
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
Route::get('/manage',function() {return view('manage');});
Route::get('/Notification',function() {return view('Notification');});

//Route::get('supplier',[supplierController::class,'index']);
Route::get('/supplier',[SupplierController::class,'index']);
//Route::POST('/supplier',[supplierController::class,'index']);
Route::get('/tsupplier',function(){

    $supplier = supplier::paginate(10);
    return view("/supplier.Tsupplier")->with(['supplier'=>$supplier]);
});
Route::get('/seeder',[SupplierController::class,'seeder']);

