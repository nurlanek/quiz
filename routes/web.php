<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\W_relased_orderController;
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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::group(['middleware' => ['auth', 'isAdmin']], function (){
    Route::get('/', function (){
        return view('welcome');
    });
});

Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');

})->name('dashboard');


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
