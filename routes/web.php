<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PagesController@index');
Route::get('/eatery-package-detail', 'PagesController@eateryPackage')->name('eatery-package-detail');
Route::get('/package-holder-detail', 'PagesController@packageHolder')->name('package-holder-detail');
Route::get('/donor-detail', 'PagesController@donors')->name('donor-detail');
Route::get('/donate-link', 'PagesController@donateNow')->name('donate-link');
Route::get('/post/{slug}', 'PostController@index')->name('post');
Route::get('/category/{slug}','PostController@postsFromCategory')->name('category');


Route::group(['prefix' => 'my_api'], function(){
	Route::group(['prefix' => 'data_store'], function(){
		Route::post('/donate_request_data', 'DataController@storeDonateRequestData');
	});
});

Route::group(['prefix' => 'my_api_user'], function(){
	
});


Route::group(['prefix' => 'user', 'middleware' => 'verified'], function(){
	Route::get('/donation-request-list', 'UserController@donationRequest')->name('donation-request-list');
});


Auth::routes(['verify' => true]);


Route::group(['prefix' => 'htech-@dmin'], function () {
    Voyager::routes();
});
