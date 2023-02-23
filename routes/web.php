<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController\storeCont;
use App\Http\Controllers\StoreController\storeView;
use App\Http\Controllers\ProductController\productCont;
use App\Http\Controllers\ProductController\productView;
use App\Http\Controllers\PurchaseController\purchaseCont;
use App\Http\Controllers\Auth\RegisterController;
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
    return view('welcome');
});
Route::get('public/stores' ,[storeView::class , 'index']);

Route::get('public/products/{id}/{name}' ,[productView::class , 'index']);

Route::get('public/Dashboard/store' ,[storeCont::class  , 'index'])->middleware('auth');

Route::get('public/Dashboard/search' ,[productView::class  , 'search'])->middleware('auth');

Route::get('/public/Dashboard/store/add',function ()
{
   return view('private.storeCont.AddForm');
})->middleware('auth');



Route::Post('public/Dashboard/store/addRow',[storeCont::class , 'store'])->middleware('auth');

Route::get('public/Dashboard/store/Edit/{id}' ,[storeCont::class , 'Edit'])->middleware('auth');

Route::Post('public/Dashboard/store/Update/{id}' ,[storeCont::class , 'update'])->middleware('auth');

Route::Post('public/Dashboard/store/delete/{id}' ,[storeCont::class , 'destroy'])->middleware('auth');

Route::Post('public/Dashboard/store/restore/{id}' ,[storeCont::class , 'restore'])->middleware('auth');


Route::get('public/Dashboard/adminRegistration' ,function ()
{
    return view('auth.register');
})->middleware('auth');
Route::Post('/public/Dashboard/regests',[RegisterController::class,'create'])->middleware('auth');


Route::get('public/Dashboard/product' ,[ProductCont::class , 'index'])->middleware('auth');

Route::get('public/Dashboard/product/add',[ProductCont::class ,'selectStores' ])->middleware('auth');

Route::Post('public/Dashboard/product/addRow',[ProductCont::class , 'store'])->middleware('auth');

Route::get('public/Dashboard/product/Edit/{id}' ,[ProductCont::class , 'Edit'])->middleware('auth');

Route::Post('public/Dashboard/product/update/{id}' ,[ProductCont::class , 'update'])->middleware('auth');

Route::Post('public/Dashboard/product/delete/{id}' ,[ProductCont::class , 'distroy'])->middleware('auth');

Route::Post('public/Dashboard/product/restore/{id}' ,[ProductCont::class , 'restore'])->middleware('auth');

Route::get('public/Dashboard/product/purchase/{id}' ,[purchaseCont::class , 'purchase']);


Route::get('public/Dashboard/purchase' ,[purchaseCont::class , 'index'])->middleware('auth');


Route::get('public/Dashboard/purchase/report/{id}' ,[purchaseCont::class , 'report'])->middleware('auth');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


