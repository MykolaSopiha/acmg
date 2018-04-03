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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();


Route::get('home', function () {

    if (Auth::user()->hasRole('admin')) {
        return redirect()->route('admin:dashboard');
    } elseif (Auth::user()->hasRole('manager')) {
        return redirect()->route('manager:dashboard');
    } elseif (Auth::user()->hasRole('user')) {
        return redirect()->route('cabinet:dashboard');
    }

});


Route::group(['prefix' => 'admin', 'as' => 'admin:', 'namespace' => 'Admin', 'middleware' => ['auth', 'role:admin'], 'role' => 'admin'], function () {

    Route::get('home', ['uses' => 'DashboardController@index', 'as' => 'dashboard']);
    Route::group(['prefix' => 'home', 'as' => 'dashboard.'], function () {
        Route::get('/account-chart', ['uses' => 'DashboardController@accountChart', 'as' => 'accountChart']);
    });

    Route::get('profile', ['uses' => 'UserController@index', 'as' => 'user.view']);
    Route::post('profile', ['uses' => 'UserController@update', 'as' => 'user.update']);

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', ['uses' => 'UsersController@index', 'as' => 'index']);
        Route::get('/{id}', ['uses' => 'UsersController@view', 'as' => 'view']);
        Route::get('/{id}/edit', ['uses' => 'UsersController@edit', 'as' => 'edit']);
        Route::post('/{id}/update', ['uses' => 'UsersController@update', 'as' => 'update']);
        Route::get('/{id}/admin', ['uses' => 'UsersController@attachAdminRole', 'as' => 'attachAdmin']);
        Route::get('/{id}/user', ['uses' => 'UsersController@detachAdminRole', 'as' => 'detachAdmin']);
        Route::get('/{id}/delete', ['uses' => 'UsersController@delete', 'as' => 'delete']);
        Route::get('/{id}/accounts', ['uses' => 'UsersController@userAccounts', 'as' => 'accounts']);
        Route::get('/{id}/wallet', ['uses' => 'UsersController@userWallet', 'as' => 'wallet']);
    });

    Route::group(['prefix' => 'accounts', 'as' => 'accounts.'], function () {
        Route::get('/', ['uses' => 'AccountController@index', 'as' => 'index']);
        Route::get('/trash-list', ['uses' => 'AccountController@trashList', 'as' => 'trashList']);
        Route::get('/{id}', ['uses' => 'AccountController@view', 'as' => 'view']);
        Route::get('/{id}/edit', ['uses' => 'AccountController@edit', 'as' => 'edit']);
        Route::post('/{id}/update', ['uses' => 'AccountController@update', 'as' => 'update']);
        Route::get('/{id}/delete', ['uses' => 'AccountController@delete', 'as' => 'delete']);
        Route::get('/{id}/restore', ['uses' => 'AccountController@restore', 'as' => 'restore']);
        Route::get('/{id}/confirm', ['uses' => 'AccountController@accountConfirm', 'as' => 'confirm']);
        Route::get('/{id}/deposits', ['uses' => 'AccountController@accountDeposits', 'as' => 'deposits']);
        Route::get('/{id}/sessions', ['uses' => 'AccountController@accountSessions', 'as' => 'sessions']);
        Route::get('/{id}/status/{status_id}', ['uses' => 'AccountController@setStatus', 'as' => 'setStatus']);
    });

    Route::group(['prefix' => 'countries', 'as' => 'countries.'], function () {
        Route::get('/', ['uses' => 'CountryController@index', 'as' => 'index']);
        Route::get('/create', ['uses' => 'CountryController@create', 'as' => 'create']);
        Route::post('/create', ['uses' => 'CountryController@store', 'as' => 'store']);
        Route::get('/{id}', ['uses' => 'CountryController@view', 'as' => 'view']);
        Route::get('/{id}/edit', ['uses' => 'CountryController@edit', 'as' => 'edit']);
        Route::post('/{id}/update', ['uses' => 'CountryController@update', 'as' => 'update']);
        Route::get('/{id}/delete', ['uses' => 'CountryController@delete', 'as' => 'delete']);
    });

    Route::group(['prefix' => 'currencies', 'as' => 'currencies.'], function () {
        Route::get('/', ['uses' => 'CurrencyController@index', 'as' => 'index']);
        Route::get('/create', ['uses' => 'CurrencyController@create', 'as' => 'create']);
        Route::post('/create', ['uses' => 'CurrencyController@store', 'as' => 'store']);
        Route::get('/{id}', ['uses' => 'CurrencyController@view', 'as' => 'view']);
        Route::get('/{id}/edit', ['uses' => 'CurrencyController@edit', 'as' => 'edit']);
        Route::post('/{id}/update', ['uses' => 'CurrencyController@update', 'as' => 'update']);
        Route::get('/{id}/delete', ['uses' => 'CurrencyController@delete', 'as' => 'delete']);
    });

    Route::group(['prefix' => 'deposits', 'as' => 'deposits.'], function () {
        Route::get('/', ['uses' => 'DepositController@index', 'as' => 'index']);
        Route::get('/{id}', ['uses' => 'DepositController@view', 'as' => 'view']);
        Route::get('/{id}/confirm', ['uses' => 'DepositController@confirm', 'as' => 'confirm']);
        Route::get('/{id}/delete', ['uses' => 'DepositController@delete', 'as' => 'delete']);
    });

    Route::group(['prefix' => 'payments', 'as' => 'payments.'], function () {
        Route::get('/', ['uses' => 'PaymentController@index', 'as' => 'index']);
        Route::get('/{id}', ['uses' => 'PaymentController@view', 'as' => 'view']);
        Route::get('/create', ['uses' => 'PaymentController@create', 'as' => 'create']);
        Route::post('/create', ['uses' => 'PaymentController@store', 'as' => 'store']);
        Route::get('/{id}/edit', ['uses' => 'PaymentController@edit', 'as' => 'edit']);
        Route::post('/{id}/update', ['uses' => 'PaymentController@update', 'as' => 'update']);
        Route::get('/{id}/delete', ['uses' => 'PaymentController@delete', 'as' => 'delete']);
    });

    Route::group(['prefix' => 'notifications', 'as' => 'notifications.'], function () {
        Route::get('/', ['uses' => 'NotificationController@index', 'as' => 'index']);
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

    Route::group(['prefix' => 'withdraws', 'as' => 'withdraws.'], function () {
        Route::get('/', ['uses' => 'WithdrawController@index', 'as' => 'index']);
        Route::get('/{id}', ['uses' => 'WithdrawController@view', 'as' => 'view']);
        Route::get('/{id}/confirm', ['uses' => 'WithdrawController@confirm', 'as' => 'confirm']);
        Route::get('/{id}/delete', ['uses' => 'WithdrawController@delete', 'as' => 'delete']);
    });

});

Route::group(['prefix' => 'manager', 'as' => 'manager:', 'namespace' => 'Manager', 'middleware' => ['auth', 'role:manager']], function () {
    Route::get('home', ['uses' => 'DashboardController@index', 'as' => 'dashboard']);
});

Route::group(['prefix' => 'cabinet', 'as' => 'cabinet:', 'namespace' => 'Cabinet', 'middleware' => ['auth', 'role:user']], function () {

    Route::get('home', ['uses' => 'DashboardController@index', 'as' => 'dashboard']);

    Route::get('profile', ['uses' => 'UserController@index', 'as' => 'user.view']);
    Route::post('profile', ['uses' => 'UserController@update', 'as' => 'user.update']);

    Route::group(['prefix' => 'accounts', 'as' => 'accounts.'], function () {
        Route::get('/', ['uses' => 'AccountController@index', 'as' => 'index']);
        Route::get('/create', ['uses' => 'AccountController@create', 'as' => 'create']);
        Route::post('/create', ['uses' => 'AccountController@store', 'as' => 'store']);
        Route::get('/{id}', ['uses' => 'AccountController@view', 'as' => 'view']);
        Route::get('/{id}/edit', ['uses' => 'AccountController@edit', 'as' => 'edit']);
        Route::post('/{id}/update', ['uses' => 'AccountController@update', 'as' => 'update']);
        Route::get('/{id}/delete', ['uses' => 'AccountController@delete', 'as' => 'delete']);
    });

    Route::group(['prefix' => 'wallet', 'as' => 'wallet.'], function () {
        Route::get('/', ['uses' => 'WalletController@index', 'as' => 'index']);
    });

//    Route::group(['prefix' => 'deposits', 'as' => 'deposits.'], function () {
//        Route::get('/', ['uses' => 'DepositController@index', 'as' => 'index']);
//        Route::get('/{id}', ['uses' => 'DepositController@view', 'as' => 'view']);
//    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', ['uses' => 'UsersController@index', 'as' => 'index']);
        Route::get('/{id}', ['uses' => 'UsersController@view', 'as' => 'view']);
        Route::get('/{id}/accounts', ['uses' => 'UsersController@accounts', 'as' => 'accounts']);
    });

    Route::group(['prefix' => 'withdraws', 'as' => 'withdraws.'], function () {
        Route::get('/', ['uses' => 'WithdrawController@index', 'as' => 'index']);
        Route::get('/create', ['uses' => 'WithdrawController@create', 'as' => 'create']);
        Route::post('/create', ['uses' => 'WithdrawController@store', 'as' => 'store']);
        Route::get('/{id}', ['uses' => 'WithdrawController@view', 'as' => 'view']);
    });

    Route::group(['prefix' => 'docs', 'as' => 'docs.'], function () {
        Route::get('start', ['uses' => 'DocumentController@start', 'as' => 'start']);
        Route::get('faq', ['uses' => 'DocumentController@faq', 'as' => 'faq']);
    });

});


// Notifications
Route::get('/markAsRead', function() {
    auth()->user()->unreadNotifications->markAsRead();
})->name('markAsRead');


Route::get('/test', 'TestController@index');
