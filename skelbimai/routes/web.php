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

Route::get('/', 'HomeController@index');

Route::get('/all-ads/', 'HomeController@allAds');

Route::get('/ad/{ad}', 'HomeController@ad');

Route::get('/about/', 'HomeController@about');

Route::get('/contact/', 'HomeController@contact');

Route::get('/blog/', 'HomeController@blog');

Route::get('/login/', 'HomeController@login');

Route::get('/register/', 'HomeController@register');

Route::get("/search/", 'HomeController@search');


Route::get('/add-category/', 'CategoryController@addCategory');

Route::post("/store-category/", "CategoryController@storeCategory");

Route::get("/manage-categories/", "CategoryController@showCategories");

Route::get("/delete/category/{category}", "CategoryController@deleteCategory");


Route::get("/manage-ads/", 'AdsController@manageAds');
Route::get('/add-ad/', 'AdsController@addAd');
Route::post("/store-ad/", "AdsController@storeAd");
Route::get("/delete/ad/{ad}", "AdsController@deleteAd");
Route::get("/edit/{ad}", "AdsController@editAd");
Route::post("/save-edited-ad/", "AdsController@saveEditedAd");

