<?php

use App\Http\Controllers\Panel\CityController;
use App\Http\Controllers\Panel\CoupleController;
use App\Http\Controllers\Panel\PanelController;
use App\Http\Controllers\Panel\PersonController;
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

Route::get('/', [PanelController::class, 'index'])->name('panel.index');

Route::resource('/cities', CityController::class, ['as' => 'panel']);

Route::resource('/people', PersonController::class, ['as' => 'panel']);
Route::get('/people/tree/{person}', [PersonController::class, 'tree'])
    ->name('panel.people.tree');

Route::resource('/couples', CoupleController::class, ['as' => 'panel']);
