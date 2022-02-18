<?php
use App\Controller\Admin\AdminController;
use App\Controller\Admin\ChatContoller;
use App\Controller\Admin\SupermarketAccount;
use App\Controller\Admin\SupermarketController;
use App\Controller\Admin\SupermarketItemController;
use App\Controller\Auth\AuthController;
use App\Controller\Home;
use App\Controller\User\DashboardController;
use App\Controller\User\Notebook;
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
    Route::get('/dashboard/charts', [SupermarketItemController::class, 'charts']);
    Route::get('/dashboard/transactions', [AdminController::class, 'transactions']);
    Route::get('/dashboard/settings', [AdminController::class, 'settings']);
    Route::get('/dashboard/profile', [AdminController::class, 'profile']);
    Route::get('/dashboard/support', [AdminController::class, 'support']);
    Route::get('/dashboard/help/chat/{chat_id}', [AdminController::class, 'helpCenter']);
    //requeestChat
    Route::get('/dashboard/help', [AdminController::class, 'requeestChat']);
    Route::get('/dashboard/support/chat/{chat_id}', [ChatContoller::class, 'support']);
});

Route::group(['prefix' => 'users'], function(){
    Route::get('/supermarket-visiors', [UserController::class, 'index']);
    Route::get('/co-admin', [UserController::class, 'coAdminUsers']);
    Route::get('/supermarket-admins', [UserController::class, 'supermarketAdmins']);
    Route::get('/co-admin/create', [UserController::class, 'create']);
    Route::post('/co-admin/store', [UserController::class, 'store']);
    Route::post('/delete', [UserController::class, 'destroy']);
    Route::get('/co-admin/{$id}/edit', [UserController::class, 'edit']);
    Route::post('/co-admin/update', [UserController::class, 'update']);
});

Route::resource('supermarkets', SupermarketController::class, function($uri, $class){
    Route::get($uri."/expired", [$class, 'checkSupermarketExpiry']);
    Route::get($uri.'/users/charts', [$class, 'chartsForNumberOfUsers']);
    Route::get($uri.'/visitors/charts', [$class, 'chartsForNumberOfSupermarketUsers']);
    Route::post($uri . '/delete', [$class, 'destroy']);
});


Route::group(['prefix' => 'supermarket/account'], function(){
    Route::get('/expired', [SupermarketAccount::class, 'index']);
    Route::get('/activate', [SupermarketAccount::class, 'activate']);
    Route::get('/payment/{$amount}', [SupermarketAccount::class, 'payment']);
});

Route::resource('supermarket-items', SupermarketItemController::class, function($uri, $class){
    Route::get($uri."/categories", [$class, 'categories']);
    Route::get($uri."/searched/{status}", [$class, 'searchedItems']);
});

//user dashboard routes
Route::group(["prefix" => 'user/dashboard'], function(){
    Route::get('', [DashboardController::class, 'index']);
    Route::get('/supermarkets', [DashboardController::class, 'supermarkets']);
    Route::get('/supermarkets/{name}', [DashboardController::class, 'supermarketItems']);
    Route::post('/shopping-list', [DashboardController::class, 'addItemToShoppingList']);
    Route::get('/lists', [DashboardController::class, 'shoppingLists']);
    Route::post('/lists/create', [DashboardController::class, 'createShoppingList']);
    Route::get('/item/search', [DashboardController::class, 'searchSupermarketItem']);
    Route::get('/supermarket_items/search', [DashboardController::class, 'searchSupermarketItemByName']);
    Route::get('/supermarket/{name}/{category}', [DashboardController::class, 'supermarketItemsByCategory']);
    Route::post('/lists/diactivate', [DashboardController::class, 'markShoppingListShopped']);
    Route::get('/notebooks', [Notebook::class, 'index']);
    Route::post('/notebooks/save', [Notebook::class, 'store']);
    Route::get('/notebook/{$notebook_name}/notes', [Notebook::class, 'create']);
    Route::post('/notebook/update', [Notebook::class, 'update']);
});

//chat routes
Route::group(['prefix' => 'chat'], function(){
    Route::post('/request', [ChatContoller::class, 'request']);
    Route::get('/respondent', [ChatContoller::class, '__joined__']);
    Route::get('/get/{chat_key}', [ChatContoller::class, 'get']);
    Route::post('/send', [ChatContoller::class, 'send']);
    Route::post('/end', [ChatContoller::class, '__end__']);
    Route::get('/fetch/requests', [ChatContoller::class, 'getChatRequests']);
    Route::get('/status/{chat_id}', [ChatContoller::class, 'getChatStatus']);
    Route::get('/typing/get/{user_id}', [ChatContoller::class, 'getTyping']);
    Route::get('/typing/set/{user_id}/{typing_status}', [ChatContoller::class, 'setTyping']);
});

Route::get('user/logout', [AuthController::class, 'logout']);
Route::get('user/online', [AdminController::class, 'usersActiveStatus']);