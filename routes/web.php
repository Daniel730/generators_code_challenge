<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\GeneratorController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'web'], function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/home', 'index')->name('home');
    });

    Route::controller(GeneratorController::class)->group(function () {
        Route::get('/generator/{id}/edit', 'edit')->name('edit-generator');
        Route::get('/generator/new', 'new')->name('new-generator');
        Route::post('/generator/new', 'store')->name('store-generator');
        Route::put('/generator/update', 'update')->name('update-generator');
        Route::get('/generator/{id}/state/{state_id}/update', 'updateState')->name('update-state');
    });
});
