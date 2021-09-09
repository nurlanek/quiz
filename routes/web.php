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

<<<<<<< HEAD

Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin'], function (){
});

//Route::resource('w_relased_order', WrelasedorderController::class );

////Route::get('response', 'SaveController@GetData');

//Route::get('test', [App\Http\Controllers\SaveController::class, 'GetData']);

 //Route::get('response-json', function ($response) {
//         return ['message' => $response];
//  });
//  Route::get('/test', [App\Http\Controllers\savecontroller::class, 'GetData']);
  Route::resource('response', 'ResponseController');
=======
Route::resource('response', 'ResponseController');
>>>>>>> 1972530c7681b8db1de4e80156740ddad86755f1
