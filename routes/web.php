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

Route::get('/', 'HomeController');

Route::get('/teste', function() {
    return view('teste');
});

Route::get('/login', function() {

    echo 'PAGINA DE LOGIN';

})->name('login');

Route::resource('todo', 'TodoController');

Route::get('/pessoas', 'PessoasController@index')->name('pessoas');

Route::get('/users', 'UsersController@index')->name('users');

Route::resource('users', 'UsersController');

Route::prefix('/tarefas')->group(function() {

    Route::get('/', 'TarefasController@list')->name('tarefas.list'); //Listagem de tarefas

    Route::get('add', 'TarefasController@add')->name('tarefas.add'); //Adição de tarefa
    Route::post('add', 'TarefasController@addAction'); //Ação de adição de nova tarefa

    Route::get('edit/{id}', 'TarefasController@edit')->name('tarefas.edit'); //Tela de edição
    Route::post('edit/{id}', 'TarefasController@editAction'); //Ação de edição

    Route::get('delete/{id}', 'TarefasController@del')->name('tarefas.del'); //deletar
    Route::get('marcar/{id}', 'TarefasController@done')->name('tarefas.done'); //marcar como feito    

});

Route::prefix('/config')->group(function() {

    Route::get('/', 'Admin\ConfigController@index')->middleware('auth');
    //Route::post('/', 'Admin\ConfigController@index');
    Route::get('info', 'Admin\ConfigController@info');
    Route::get('permissoes', 'Admin\ConfigController@permissoes');

    Route::get('info', function() {
        echo "Configuração INFO 2";
    });

});

//nome na ROTA
Route::get('/config/info', function() {
    echo "Configurações INFO";
})->name('info');

Route::get('/user/{name}', function ($name) {
    echo "Mostrando usuário de NOME ".$name;
})->where('name', '[a-z]+');

Route::get('/user/{id}', function($id) {
    echo "Mostrando usuário de ID ".$id;
});

Route::view('/teste', 'teste');

Route::fallback(function() {
    return view('404');
});