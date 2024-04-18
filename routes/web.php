<?php

use App\Http\Controllers\TodoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::redirect('/', 'tasks');
Route::prefix('tasks')->controller(TodoController::class)->group(function () {

    Route::get('/', [TodoController::class, 'index'])->name('index');
    Route::get('/create', [TodoController::class, 'create'])->name('create');
    Route::post('/store', [TodoController::class, 'store'])->name('store');
    Route::post('/check/{id}', [TodoController::class, 'check'])->name('check');
    Route::get('/{id}', [TodoController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [TodoController::class, 'edit'])->name('edit');
    Route::put('/{id}', [TodoController::class, 'update'])->name('update');
    Route::delete('/{id}', [TodoController::class, 'destroy'])->name('destroy');
   /* Route::post('/', 'TodoController@store')
        ->name('store');

    Route::get('{id}', 'TodoController@show')
        ->where('id', '[0-9]+')
        ->name('show');

    Route::get('{id}/edit', 'TodoController@edit')
        ->where('id', '[0-9]+')
        ->name('edit');

    Route::put('{id}', 'TodoController@update')
        ->where('id', '[0-9]+')
        ->name('update');

    Route::delete('{id}', 'TodoController@destroy')
        ->where('id', '[0-9]+')
        ->name('destroy');

    Route::post('{id}', 'TodoController@check')
        ->where('id', '[0-9]+')
        ->name('check');*/
});