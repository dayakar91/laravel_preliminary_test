<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;


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

//Route::get('/', function () {
   // return view('welcome');
//});

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
Route::get('/', [ProductsController::class, 'index']);

Route::get('edit/{id}', [ProductsController::class,'edit_product']);
Route::post('update-product/{id}', [ProductsController::class,'product_update'])->name('product_update');

Route::post('add-product', [ProductsController::class,'product_add'])->name('product_add');
Route::get('add', [ProductsController::class,'add_product'])->name('add_product');

Route::post('search', [ProductsController::class,'products_search'])->name('products.search');

