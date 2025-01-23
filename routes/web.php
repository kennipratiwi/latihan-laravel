<?php

use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HasilPerhitunganController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SubCriteriaController;
use App\Models\SubCategory;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'] )->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/criteria', [App\Http\Controllers\CriteriaController::class, 'index'])->name('criteria');

Route::resource('criteria', CriteriaController::class);
// Route::resource('subcriteria', SubCriteriaController::class);
Route::get('hasilperhitungan', [HasilPerhitunganController::class, 'index'] )->name('hasilperhitungan');
Route::get('/alternatif', [App\Http\Controllers\AlternatifController::class, 'index'])->name('alternatif');
Route::resource('subcategories', SubCategoryController::class);