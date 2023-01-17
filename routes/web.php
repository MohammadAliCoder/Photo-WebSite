<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Controller;

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

Route::get('/',[Controller::class,'home'])->name('getHome');

Route::middleware(['auth:sanctum', 'verified'])->get('/myImages',[Controller::class,'myImages'])
    ->name('getmyImages');


Route::get('/home',[Controller::class,'home'])->name('getHome');

Route::get('/myImages',[Controller::class,'myImages'])->name('getmyImages');

Route::get('/AddImage',[Controller::class,'getAdd'])->name('getAddImage');

Route::post('/AddImage',[Controller::class,'postAdd'])->name('postAddImage');

Route::get('/updateImage',[Controller::class,'getUpdate'])->name('getUpdate');
Route::post('/updateImage',[Controller::class,'postUpdate'])->name('postUpdate');

Route::get('/delete/{id}',[Controller::class,'getDelete'])->name('getDelete');

