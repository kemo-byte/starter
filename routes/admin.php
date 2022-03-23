<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecondConroller;

Route::get('/admin', function () {
    return 'admin';
});

Route::group(['namespace'=>'Admin','prefix'=>'a'], function () {
    
    Route::get('second','SecondConroller@show');
});

