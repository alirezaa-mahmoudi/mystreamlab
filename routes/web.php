<?php

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


Route::get('/', 'LoginController@index');
Route::post('/subscription' , 'LoginController@store');


Route::get('/home', function ()
{
    if(is_null(\App\User::find(session('id'))))
    {
        $user = new \App\User();
        $user->id = session('id');
        $user->save();
    }
//    return session()->all();

   return view('userpanel');
})->name('home');
//Route::resource('/subscription', 'SubscriptionController');




