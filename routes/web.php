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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin:', 'namespace' => 'Admin', 'middleware' => ['auth', 'role:admin'], 'role' => 'admin'], function () {

    Route::get('dashboard', ['uses' => 'DashboardController@index', 'as' => 'dashboard']);

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', ['uses' => 'UsersController@index', 'as' => 'index']);
        Route::get('/{id}', ['uses' => 'UsersController@view', 'as' => 'view']);
        Route::get('/{id}/edit', ['uses' => 'UsersController@edit', 'as' => 'edit']);
        Route::get('/{id}/admin', ['uses' => 'UsersController@attachAdminRole', 'as' => 'attachAdmin']);
        Route::get('/{id}/user', ['uses' => 'UsersController@detachAdminRole', 'as' => 'detachAdmin']);
        Route::get('/{id}/delete', ['uses' => 'UsersController@delete', 'as' => 'delete']);
    });

    Route::group(['prefix' => 'accounts', 'as' => 'accounts.'], function () {
        Route::get('/', ['uses' => 'AccountController@index', 'as' => 'index']);
        Route::get('/create', ['uses' => 'AccountController@create', 'as' => 'create']);
        Route::post('/create', ['uses' => 'AccountController@store', 'as' => 'store']);
        Route::get('/{id}', ['uses' => 'AccountController@view', 'as' => 'view']);
        Route::get('/{id}/edit', ['uses' => 'AccountController@edit', 'as' => 'edit']);
        Route::post('/{id}/update', ['uses' => 'AccountController@update', 'as' => 'update']);
        Route::get('/{id}/delete', ['uses' => 'AccountController@delete', 'as' => 'delete']);
    });

    Route::group(['prefix' => 'sessions', 'as' => 'sessions.'], function () {
        Route::get('/', ['uses' => 'SessionController@index', 'as' => 'index']);
        Route::get('/create', ['uses' => 'SessionController@create', 'as' => 'create']);
        Route::post('/create', ['uses' => 'SessionController@store', 'as' => 'store']);
        Route::get('/{id}', ['uses' => 'SessionController@view', 'as' => 'view']);
        Route::get('/{id}/edit', ['uses' => 'SessionController@edit', 'as' => 'edit']);
        Route::post('/{id}/update', ['uses' => 'SessionController@update', 'as' => 'update']);
        Route::get('/{id}/delete', ['uses' => 'SessionController@delete', 'as' => 'delete']);
    });

    Route::group(['prefix' => 'payments', 'as' => 'payments.'], function () {
        Route::get('/', ['uses' => 'PaymentController@index', 'as' => 'index']);
        Route::get('/create', ['uses' => 'PaymentController@create', 'as' => 'create']);
        Route::post('/create', ['uses' => 'PaymentController@store', 'as' => 'store']);
        Route::get('/{id}', ['uses' => 'PaymentController@view', 'as' => 'view']);
        Route::get('/{id}/edit', ['uses' => 'PaymentController@edit', 'as' => 'edit']);
        Route::post('/{id}/update', ['uses' => 'PaymentController@update', 'as' => 'update']);
        Route::get('/{id}/delete', ['uses' => 'PaymentController@delete', 'as' => 'delete']);
    });

    Route::group(['prefix' => 'transactions', 'as' => 'transactions.'], function () {
        Route::get('/', ['uses' => 'TransactionController@index', 'as' => 'index']);
        Route::get('/create', ['uses' => 'TransactionController@create', 'as' => 'create']);
        Route::post('/create', ['uses' => 'TransactionController@store', 'as' => 'store']);
        Route::get('/{id}', ['uses' => 'TransactionController@view', 'as' => 'view']);
        Route::get('/{id}/edit', ['uses' => 'TransactionController@edit', 'as' => 'edit']);
        Route::post('/{id}/update', ['uses' => 'TransactionController@update', 'as' => 'update']);
        Route::get('/{id}/delete', ['uses' => 'TransactionController@delete', 'as' => 'delete']);
    });

});

Route::group(['prefix' => 'cabinet', 'as' => 'cabinet:', 'namespace' => 'Cabinet', 'middleware' => ['auth']], function () {

    Route::get('dashboard', ['uses' => 'DashboardController@index', 'as' => 'dashboard']);

    Route::get('profile', ['uses' => 'UserController@index', 'as' => 'user.view']);
    Route::post('profile', ['uses' => 'UserController@update', 'as' => 'user.update']);

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', ['uses' => 'UsersController@index', 'as' => 'index']);
        Route::get('/{id}', ['uses' => 'UsersController@view', 'as' => 'view']);
        Route::get('/{id}/edit', ['uses' => 'UsersController@edit', 'as' => 'edit']);
        Route::get('/{id}/admin', ['uses' => 'UsersController@attachAdminRole', 'as' => 'attachAdmin']);
        Route::get('/{id}/user', ['uses' => 'UsersController@detachAdminRole', 'as' => 'detachAdmin']);
        Route::get('/{id}/delete', ['uses' => 'UsersController@delete', 'as' => 'delete']);
    });

    Route::group(['prefix' => 'accounts', 'as' => 'accounts.'], function () {
        Route::get('/', ['uses' => 'AccountController@index', 'as' => 'index']);
        Route::get('/create', ['uses' => 'AccountController@create', 'as' => 'create']);
        Route::post('/create', ['uses' => 'AccountController@store', 'as' => 'store']);
        Route::get('/{id}', ['uses' => 'AccountController@view', 'as' => 'view']);
        Route::get('/{id}/edit', ['uses' => 'AccountController@edit', 'as' => 'edit']);
        Route::post('/{id}/update', ['uses' => 'AccountController@update', 'as' => 'update']);
        Route::get('/{id}/delete', ['uses' => 'AccountController@delete', 'as' => 'delete']);
    });

    Route::group(['prefix' => 'sessions', 'as' => 'sessions.'], function () {
        Route::get('/', ['uses' => 'SessionController@index', 'as' => 'index']);
        Route::get('/create', ['uses' => 'SessionController@create', 'as' => 'create']);
        Route::post('/create', ['uses' => 'SessionController@store', 'as' => 'store']);
        Route::get('/{id}', ['uses' => 'SessionController@view', 'as' => 'view']);
        Route::get('/{id}/edit', ['uses' => 'SessionController@edit', 'as' => 'edit']);
        Route::post('/{id}/update', ['uses' => 'SessionController@update', 'as' => 'update']);
        Route::get('/{id}/delete', ['uses' => 'SessionController@delete', 'as' => 'delete']);
    });

    Route::group(['prefix' => 'payments', 'as' => 'payments.'], function () {
        Route::get('/', ['uses' => 'PaymentController@index', 'as' => 'index']);
        Route::get('/create', ['uses' => 'PaymentController@create', 'as' => 'create']);
        Route::post('/create', ['uses' => 'PaymentController@store', 'as' => 'store']);
        Route::get('/{id}', ['uses' => 'PaymentController@view', 'as' => 'view']);
        Route::get('/{id}/edit', ['uses' => 'PaymentController@edit', 'as' => 'edit']);
        Route::post('/{id}/update', ['uses' => 'PaymentController@update', 'as' => 'update']);
        Route::get('/{id}/delete', ['uses' => 'PaymentController@delete', 'as' => 'delete']);
    });

    Route::group(['prefix' => 'transactions', 'as' => 'transactions.'], function () {
        Route::get('/', ['uses' => 'TransactionController@index', 'as' => 'index']);
        Route::get('/create', ['uses' => 'TransactionController@create', 'as' => 'create']);
        Route::post('/create', ['uses' => 'TransactionController@store', 'as' => 'store']);
        Route::get('/{id}', ['uses' => 'TransactionController@view', 'as' => 'view']);
        Route::get('/{id}/edit', ['uses' => 'TransactionController@edit', 'as' => 'edit']);
        Route::post('/{id}/update', ['uses' => 'TransactionController@update', 'as' => 'update']);
        Route::get('/{id}/delete', ['uses' => 'TransactionController@delete', 'as' => 'delete']);
    });

});
