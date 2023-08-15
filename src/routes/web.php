<?php

use App\Http\Controllers\LinksController;
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

Route::get('/', [LinksController::class, 'addShort'] );
Route::get('/addShort', [LinksController::class, 'addShort']);
Route::post('/addShort', [LinksController::class, 'create'])->name('createShort');
Route::get('{short}', [LinksController::class, 'short']);
