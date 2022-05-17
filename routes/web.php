<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesteamController;
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
Route::post('/team/create', [SalesteamController::class, 'createTeam'])->name('team.create');
Route::get('/team/all', [SalesteamController::class, 'getTeam'])->name('team.all');
Route::get('/team/{postId}/edit', [SalesteamController::class, 'editTeam'])->name('team.edit');
Route::post('/team/{postId}/update', [SalesteamController::class, 'updateTeam'])->name('team.update');
Route::get('/team/{postId}/delete', [SalesteamController::class, 'deleteTeam'])->name('team.delete');


Route::group(['middleware' => 'auth'], function () {
  
});
