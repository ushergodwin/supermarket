<?php
use App\Controller\Admin\AdminController;
use App\Controller\Admin\SupermarketController;
use App\Controller\Admin\SupermarketItemController;
use App\Controller\Auth\AuthController;
use App\Controller\Home;
use App\Controller\User\DashboardController;
use App\Controller\UserController;
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

Route::resource('users', UserController::class);
Route::resource('supermarkets', SupermarketController::class);
Route::resource('supermarket-items', SupermarketItemController::class, function($uri, $class){
    Route::get($uri."/categories", [$class, 'categories'])->name('categories');
});

//user dashboard routes
Route::group(["prefix" => 'user/dashboard'], function(){
    Route::get('', [DashboardController::class, 'index']);
    Route::get('/supermarkets', [DashboardController::class, 'supermarkets']);
    Route::get('/supermarkets/{name}', [DashboardController::class, 'supermarketItems']);
    Route::post('/shopping-list', [DashboardController::class, 'addItemToShoppingList']);
    Route::get('/lists', [DashboardController::class, 'shoppingLists']);
    Route::post('/lists/create', [DashboardController::class, 'createShoppingList']);
});