<?php

use App\Http\Controllers\WoofController;
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

Route::get('/', [WoofController::class, 'index']);
Route::get('/registered', [WoofController::class, 'registered']);
Route::get('/on-deck', [WoofController::class, 'onDeck']);
Route::get('/intake', [WoofController::class, 'intake']);
Route::get('/euthanize/{id}', [WoofController::class, 'euthanize']);
Route::get('/adopt/{id}', [WoofController::class, 'adopt']);
Route::get('/on-board/{id}', [WoofController::class, 'onBoardForm']);
Route::post('/register/{id}', [WoofController::class, 'registerDog']);
