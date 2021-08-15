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

Route::resource('w_relased_order', W_relased_orderController::class );
