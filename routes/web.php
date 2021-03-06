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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = 'kemobyte';
    return view('welcome',compact('data'));
});

Route::get('/welcome/{id?}', function () {
    return 'welcome';
});

Route::get('/landing', 'LandingController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Auth::routes(['verify'=> true]);

// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::get('/redirect/{service}', 'SocialController@redirect');

Route::get('/callback/{service}', 'SocialController@callback');
Route::group(['prefix'=> LaravelLocalization::setLocale()],function() {
Route::group(['prefix' => 'offers'] , function () {


    Route::get('/','CloudController@index');
        Route::get('/create','CloudController@create');

    
        Route::post('/create','CloudController@store');
        Route::get('/edit/{offer_id}','CloudController@edit');
        Route::post('/update','CloudController@update');
        
        Route::get('/youtube', 'CloudController@getVideo');

});
});