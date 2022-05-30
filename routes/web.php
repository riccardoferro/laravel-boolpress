<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// route for the authentications create automatically
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        // se uno e' autenticato ed e' un admin va in quell'home 
        Route::get('/','HomeController@index')
        ->name('home');
    });
// altrimenti ci buttera' al login



// qualsiasi altro tentativo di accesso verra' portato nella home guest
Route::get("{any?}",function(){

        return view('guest.home');
    
})->where(" any "," .* ");

