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

/*Route::get('/', function () {
    return view('pages.admin.login');
});*/

Auth::routes();

Route::get('/', 'HomeController@index');

   

     
// For Admin
  Route::middleware(['auth','verified','authadmin'])->group(function(){
        Route::resource('users', 'UsersController');
        Route::resource('tasks', 'TasksController');
    });

   
    Route::middleware(['auth','verified','authuser'])->group(function(){
        Route::resource('myprofile', 'myprofileController');
        Route::resource('users', 'UsersController')->only([
             'show'
        ]);;
       
    });
        
      


        

//});
