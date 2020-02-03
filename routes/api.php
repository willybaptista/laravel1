<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/pessoas')->group(function() {
    Route::get('all', 'PessoasController@getPessoas')->name('pessoas');
    Route::get('get/{id}', 'PessoasController@get')->name('get');
    Route::post('add', 'PessoasController@add')->name("add");
    Route::delete('delete/{id}', 'PessoasController@delete')->name('delete');
    Route::put('update/{id}', 'PessoasController@update')->name("update");  
});

Route::prefix('/bitrix24/deals')->group(function() {
    Route::get('/', 'Bitrix24Controller@getDeals')->name('deals');
    Route::get('/{id}', 'Bitrix24Controller@getDeal')->name('get.deal');
    Route::post('add', 'Bitrix24Controller@addDeal')->name('add.deal');
    Route::put('update/{id}', 'Bitrix24Controller@update')->name('update.deals');
    Route::delete('delete/{id}', 'Bitrix24Controller@delete')->name('delete.deals');  
});

Route::prefix('/bitrix24/leads')->group(function() {
    Route::get('/'. 'Bitrix24Controller@getLeads')->name('leads');
    Route::post('add', 'Bitrix24Controller@add')->name('add.leads');
    Route::put('update', 'Bitrix24Controller@update')->name('update.leads');
    Route::delete('delete', 'Bitrix24Controller@delete')->name('delete.ledas');
});