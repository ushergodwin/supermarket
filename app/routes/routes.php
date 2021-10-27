<?php

use System\Routes\Route;

Route::get('/', [Home::class, 'index']);
Route::get('account', [Home::class, 'account']);

