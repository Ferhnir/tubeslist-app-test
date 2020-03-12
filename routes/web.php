<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\checkdatetubesStatus;

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

Route::get('travel', 'TubesList@index')->name('travel.index');
Route::get('travel/{tube_id}', 'TubesList@show')->name('travel.show');