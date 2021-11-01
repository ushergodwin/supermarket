<?php

use App\Controller\Auth\AuthController;
use App\Controller\Home;
use System\Routes\Route;

Route::get('/', [Home::class, 'index']);
Route::get('account', [Home::class, 'account']);

Route::group(['prefix'=>'home'], function(){
    
    Route::post('/register', [Home::class, 'register']);
    Route::post('/auth', [AuthController::class, 'login']);
});

Route::group(['prefix' => 'admin'], function() {
    session(['rtl' => 'bootstrap-rtl.css']);
    Route::get('/dashboard', [AdminController::class, 'index']);
});
