<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Index\IndexController;
use App\Http\Controllers\Item\ItemController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Tag\TagController;
use App\Http\Controllers\Product\ProductController;


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

Route::get('/',[IndexController::class,"index"])->name('index');
Route::get('item',[ItemController::class,"index"])->name('item.index');

//category

Route::prefix('category')->group(function () {

 Route::get('/',[CategoryController::class,"index"])->name('category.index');
Route::get('/create',[CategoryController::class,"create"])->name('category.create');
Route::post('/store',[CategoryController::class,"store"])->name('category.store');
Route::get('/{id}/edit', [CategoryController::class, "edit"])->name('category.edit');
Route::post('/{id}/update', [CategoryController::class, "update"])->name('category.update');
Route::get('/{id}/delete', [CategoryController::class, "delete"])->name('category.delete');
});


//tag
Route::prefix('tag')->group(function () {
Route::get('/',[TagController::class,"index"])->name('tag.index');
Route::get('/create',[TagController::class,"create"])->name('tag.create');
Route::post('/store',[TagController::class,"store"])->name('tag.store');
Route::get('/{id}/edit', [TagController::class, "edit"])->name('tag.edit');
Route::post('/{id}/update', [TagController::class, "update"])->name('tag.update');
Route::get('/{id}/delete', [TagController::class, "delete"])->name('tag.delete');
});

//product
Route::prefix('product')->group(function () {
Route::get('/',[ProductController::class,"index"])->name('product.index');
Route::get('/create',[ProductController::class,"create"])->name('product.create');
Route::post('/store',[ProductController::class,"store"])->name('product.store');
Route::get('/{id}/edit', [ProductController::class, "edit"])->name('product.edit');
Route::post('/{id}/update', [ProductController::class, "update"])->name('product.update');
Route::get('/{id}/delete', [ProductController::class, "delete"])->name('product.delete');


});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
