<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\ItemController::class, 'index'])->name('items.index');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index'])->name('items.index');
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\RegisterController::class, 'store']);
    Route::delete('/delete/{id}', [App\Http\Controllers\RegisterController::class, 'destroy'])->name('index.destroy');
    Route::get('/edit/{id}',[App\Http\Controllers\ItemController::class, 'edit'] )->name('items.index');
    Route::post('/edit/{id}',[App\Http\Controllers\ItemController::class, 'update'] );
});