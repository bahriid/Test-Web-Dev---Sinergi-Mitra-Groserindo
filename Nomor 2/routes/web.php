<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OngkirController;
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

Route::get('/', [OngkirController::class, 'index'])->name('index');
Route::get('/data/city/{id}', [OngkirController::class, 'getCity'])->name('data.city');
Route::post('/count', [OngkirController::class, 'countCost'])->name('count');
