<?php

use App\Http\Controllers\contactController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', [contactController::class, 'index'])->middleware('age')->name('con');

Route::get('/about', function() {
    return view('admin/about');
})->name('aboutPage');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    // $user = User::all();
    $user = DB::table('users')->get();
    return view('dashboard', compact('user'));
})->name('dashboard');

Route::get('/check/{id?}', function($id = "default") {
  return view('welcome');
});

Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/category/add', [CategoryController::class, 'add_category'])->name('store.category');
