<?php

use App\Http\Controllers\Backend\MasterDataController;
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

Route::get('/', MasterDataController::class. '@index');
Route::get('/supplier', MasterDataController::class. '@supplier');
Route::get('/model', MasterDataController::class. '@model');

