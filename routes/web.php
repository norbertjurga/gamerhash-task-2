<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EntryController;
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

// Route::resource('photos', EntryController::class)->only([
//     'index', 'store'
// ]);

Route::get('/', [EntryController::class, 'index'])->name('entries.index');
Route::post('/', [EntryController::class, 'store'])->name('entries.store');

