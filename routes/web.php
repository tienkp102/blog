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
//Auth
Route::group(['prefix'=>'admin'], function (){
    Auth::routes([
        'verify' => true,
        'register' => false, //the function register
        'reset' => false //the function forgot password
        ]);
    Route::get('/logout', function (){
        Auth::logout();

        return redirect('/admin/login');
    });

    Route::get('profile', function () {
        return '<h1>This is profile page</h1>';
    })->middleware('verified');
});



Route::group(['prefix'=>'admin','namespace'=>'Admin'], function (){
    Route::resource('home', 'AdminController');

    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('news', 'NewsController');
    Route::resource('contact', 'ContactController');
    Route::resource('introduce', 'IntroduceController');
//    information
    Route::resource('information', 'InformationController');
    Route::get('edit-information', 'InformationController@editInformation')->name('editInformation');
    Route::post('update-information', 'InformationController@updateInformation')->name('updateInformation');


});

Route::group(['namespace'=>'Site'], function (){
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/about', 'AboutController@index')->name('about');

    Route::get('/contact', 'ContactController@index')->name('contact');

    Route::get('/news', 'NewsController@index')->name('news');

    Route::get('/product', 'ProductController@index')->name('product');
});