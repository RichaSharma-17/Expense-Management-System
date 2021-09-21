<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\DataController;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('home', HomeController::class);
Route::post('show', [HomeController::class, 'show']);
Route::delete('delete-income/{id}', [HomeController::class, 'destroy']);
Route::delete('delete-expense/{id}', [HomeController::class, 'destroy_expense']);
Route::get('edit/{id}/{income}', [HomeController::class, 'edit']);
Route::get('edit-expense/{id}/{expense}', [HomeController::class, 'edit']);
Route::post('edit-income', [HomeController::class, 'update_income']);
Route::post('edit-expense', [HomeController::class, 'update_expense']);

Route::get('form-submit', [FormController::class, 'index']);
Route::post('form-submit', [FormController::class, 'index']);
Route::post('form-submit', [FormController::class, 'store']);
Route::delete('delete-item/{id}', [FormController::class, 'destroy']);
Route::get('update/{id}', [FormController::class, 'update']);
Route::post('updating', [FormController::class, 'Updating']);

Route::get('crud', [CrudController::class, 'index']);
Route::post('crud', [CrudController::class, 'store']);
Route::delete('del/{id}',[CrudController::class, 'destroy']);
Route::get('update/{id}', [CrudController::class, 'update']);
Route::post('crud_update', [CrudController::class, 'crud_updated']);

Route::get('data', [DataController::class, 'index']);
