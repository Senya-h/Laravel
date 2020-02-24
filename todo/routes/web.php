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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/add/todo', 'TodoController@addTodoForm');
Route::post("/add/todo", "TodoController@addTodo");

Route::get("/edit/todo/{id}", "TodoController@editTodoForm");
Route::post("/edit/todo/{id}", "TodoController@editTodo");

Route::get("/remove/todo/{id}", "TodoController@removeTodo");

Route::get("/manage/priorities", "PriorityController@index");
Route::get("/add/priority", "PriorityController@addPriorityForm");
Route::post("/add/priority", "PriorityController@addPriority");
Route::get("/remove/priority/{id}", "PriorityController@removePriority");

Route::get("/manage/statuses", "StatusController@index");
Route::get("/add/status", "StatusController@addStatusForm");
Route::post("/add/status", "StatusController@addStatus");
Route::get("/remove/status/{id}", "StatusController@removeStatus");

Route::get('logout', 'Auth\LoginController@logout');





