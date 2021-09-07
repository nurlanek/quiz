<?php

use Illuminate\Support\Facades\Route;
Route::group(['middleware' => ['auth', 'isAdmin']], function (){
    Route::get('/', function (){
        return view('welcome');
    });
    Route::get('/walmart-dash','WRelasedOrderController@index')->name('WRorder.index');
});

Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');

})->name('dashboard');

Route::resource('response', 'ResponseController');
