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


Route::get('/', [
    'uses' => 'ItemController@getIndex',
    'as'   => 'onlineShop.index'
]);

Route::get('post/{id}', [
    'uses' => 'ItemController@getPost',
    'as' => 'onlineShop.item'
]);

Route::get('story', function () {
    return view('about.story');
})->name('about.story');

Route::group(['prefix' => 'admin'], function() {
    Route::get('', [
        'uses' => 'ItemController@getAdminIndex',
        'as' => 'admin.index'
    ]);

    Route::get('create', [
        'uses' => 'PostController@getAdminCreate',
        'as' => 'admin.create'
    ]);

    Route::post('create', [
        'uses' => 'ItemController@postAdminCreate',
        'as' => 'admin.create'
    ]);

    Route::get('edit/{id}', [
        'uses' => 'ItemController@getAdminEdit',
        'as' => 'admin.edit'
    ]);

    Route::post('edit', [
        'uses' => 'ItemController@postAdminUpdate',
        'as' => 'admin.update'
    ]);

});