<?php

use App\Auto;
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

Route::group(['middleware'=>'web'], function(){

    Route::match(['get', 'post'], '/', ['uses'=>'IndexController@execute', 'as'=>'home']);
    Route::get('/auto/{id}', ['uses'=>'AutoController@show', 'as'=>'auto_show']);
    Route::get('/news/{id}', ['uses'=>'ConditionsController@show_news', 'as'=>'news_show']);
    Route::match(['get', 'post'], '/send_email', ['uses'=>'SendController@send', 'as'=>'send_email']);
    Route::match(['get', 'post'],'/autopark', ['uses'=>'AutoprokatController@show', 'as'=>'autopark']);
    Route::match(['get', 'post'],'/conditions', ['uses'=>'ConditionsController@show', 'as'=>'conditions']);
    Route::match(['get', 'post'],'/uslugy', ['uses'=>'UslugyController@show', 'as'=>'uslugy']);
    Route::match(['get', 'post'],'/about', ['uses'=>'AboutController@show', 'as'=>'about']);
    Route::match(['get', 'post'],'/zakaz', ['uses'=>'ZakazController@show', 'as'=>'zakaz']);
    Route::match(['get', 'post'],'/price', ['uses'=>'AutoprokatController@price', 'as'=>'price']);
    Route::match(['get', 'post'],'/send', ['uses'=>'ZakazController@send', 'as'=>'send']);
    Route::auth();
});

Route::group(['prefix'=>'private', 'middleware'=>'auth'], function(){

    Route::group(['prefix'=>'news'], function(){
        Route::get('/', ['uses'=>'AutoController@news', 'as'=>'news']);
        Route::match(['get', 'post'], '/add', ['uses'=>'AutoController@add_news', 'as'=>'news_add']);
        Route::match(['get', 'post'],'/edit/{id}', ['uses'=>'AutoController@edit_news', 'as'=>'news_edit']);
        Route::post('/delete', ['uses'=>'AutoController@delete_news', 'as'=>'news_delete']);
    });

    Route::group(['prefix'=>'dopolnytelno'], function(){
        Route::get('/', ['uses'=>'AutoController@dop', 'as'=>'dop_uslugy']);
        Route::match(['get', 'post'], '/add', ['uses'=>'AutoController@add_dop', 'as'=>'dop_uslugy_add']);
        Route::match(['get', 'post'],'/edit/{id}', ['uses'=>'AutoController@edit_dop', 'as'=>'dop_uslugy_edit']);
        Route::post('/delete', ['uses'=>'AutoController@delete_dop', 'as'=>'dop_delete']);
    });

    Route::group(['prefix'=>'automobiles'], function(){

        Route::get('/', ['uses'=>'AutoController@all', 'as'=>'auto_all']);
        Route::match(['get', 'post'], '/add', ['uses'=>'AutoController@add', 'as'=>'auto_add']);
        Route::match(['get', 'post'], '/edit/{id}', ['uses'=>'AutoController@edit', 'as'=>'auto_edit']);
        Route::post('/delete', ['uses'=>'AutoController@delete', 'as'=>'delete_auto']);

    });

});