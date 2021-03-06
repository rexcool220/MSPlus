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
    return View::make('admin.blank');
});

Route::get('/tables', function () {
    return View::make('admin.table');
});

Route::get('/forms', function () {
    return View::make('admin.form');
});

Route::get('/grid', function () {
    return View::make('admin.grid');
});

Route::get('/buttons', function () {
    return View::make('admin.buttons');
});

Route::get('/icons', function () {
    return View::make('admin.icons');
});

Route::get('/panels', function () {
    return View::make('admin.panel');
});

Route::get('/typography', function () {
    return View::make('admin.typography');
});

Route::get('/notifications', function () {
    return View::make('admin.notifications');
});

Route::get('/blank', function () {
    return View::make('admin.blank');
});

Route::get('/documentation', function () {
    return View::make('admin.documentation');
});

Route::get('/stats', function() {
    return View::make('admin.stats');
});

Route::get('/progressbars', function() {
    return View::make('admin.progressbars');
});

Route::get('/collapse', function() {
    return View::make('admin.collapse');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/shippingRecord', 'DatatablesController@getShippingRecord');

    Route::get('/shippingRecordData', 'DatatablesController@shippingRecordData')->name('datatables.shippingRecord');

    Route::delete('/shippingRecord/{id}', [
        'as' => 'deleteShippingRecord',
        'uses' => 'AjaxController@deleteShippingRecord'
    ]);

    Route::post('/editShippingRecord','AjaxController@editShippingRecord');

    Route::get('/members', 'DatatablesController@getMembers');

    Route::get('/membersData', 'DatatablesController@membersData')->name('datatables.members');

    Route::delete('/members/{id}', [
        'as' => 'deleteMembers',
        'uses' => 'AjaxController@deleteMembers'
    ]);

    Route::post('/editMembers','AjaxController@editMembers');

    Route::get('/itemCategory', 'DatatablesController@getItemCategory');

    Route::get('/itemCategoryData', 'DatatablesController@itemCategoryData')->name('datatables.itemCategory');

    Route::delete('/itemCategory/{id}/{spec}', [
        'as' => 'deleteItemCategory',
        'uses' => 'AjaxController@deleteItemCategory'
    ]);

    Route::post('/editItemCategory','AjaxController@editItemCategory');

    Route::get('/remitRecord', 'DatatablesController@getRemitRecord');

    Route::get('/remitRecordData', 'DatatablesController@remitRecordData')->name('datatables.remitRecord');

    Route::delete('/remitRecord/{id}', [
        'as' => 'deleteRemitRecord',
        'uses' => 'AjaxController@deleteRemitRecord'
    ]);

    Route::post('/editRemitRecord','AjaxController@editRemitRecord');

    Route::get('/dashboard', 'ChartsController@ChartData');
});

Route::get('login', 'Auth\LoginController@redirectToProvider');

Route::get('login/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('logout', 'LogoutController@logout');

Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@redirectToProvider']);