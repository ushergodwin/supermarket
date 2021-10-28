<?php

use System\Routes\Route;

Route::get('/', [Home::class, 'index']);
Route::get('account', [Home::class, 'account']);

Route::group(['prefix'=>'home'], function(){
    
    Route::post('/register', [Home::class, 'register']);
});

