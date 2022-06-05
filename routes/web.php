<?php

use Illuminate\Support\Facades\Auth;

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

// route for the authentications create automatically by laravel
Auth::routes(['register'=>false,'reset'=>false,'verify'=>false]);

// Route::get('/home', 'HomeController@index')->name('home');

// 'auth' solo utente autorizzato
Route::middleware('auth')

    ->namespace('Admin')

    // rotte che cominciano con admin.
    ->name('admin.')

    // con uri che cominciano con admin
    ->prefix('admin')
    ->group(function(){

        //insert controller under the folder/uri admin
        // if someone is authenticated and is an admin go in the home
        Route::get('/','HomeController@index')->name('index');

        // routes for the resources posts(CRUD)
        Route::resource('/posts','PostController');

    });

// else we'll go to the login



// other attempts of access will put to the guest's home
Route::get("{any?}",function(){

        return view('guest.home');
    
})->where(" any "," .* ");

