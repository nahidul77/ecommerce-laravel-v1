<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'Frontend\FrontendController@home')->name('index');
Route::get('/shopping-cart', 'Frontend\FrontendController@shoppingCart')->name('shopping.cart');
Route::get('/about', 'Frontend\FrontendController@about')->name('about');
Route::get('/contact', 'Frontend\FrontendController@contact')->name('contact');
Route::post('/contact/store', 'Frontend\FrontendController@store')->name('contact.store');

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');

Route::group(['middleware'=>'auth'], function(){
    Route::prefix('users')->group(function(){
        Route::get('/view', 'Backend\UserController@view')->name('users.view');
        Route::get('/add', 'Backend\UserController@add')->name('users.add');
        Route::post('/store', 'Backend\UserController@store')->name('users.store');
        Route::get('/edit/{id}', 'Backend\UserController@edit')->name('users.edit');
        Route::post('/update/{id}', 'Backend\UserController@update')->name('users.update');
        Route::get('/delete/{id}', 'Backend\UserController@delete')->name('users.delete');
    });
    
    Route::prefix('profiles')->group(function(){
        Route::get('/view', 'Backend\ProfileController@view')->name('profiles.view');
        Route::get('/edit', 'Backend\ProfileController@edit')->name('profiles.edit');
        Route::post('/update', 'Backend\ProfileController@update')->name('profiles.update');
        Route::get('/password/view', 'Backend\ProfileController@passwordView')->name('profiles.password.view');
        Route::Post('/password/update', 'Backend\ProfileController@passwordUpdate')->name('profiles.password.update');
    });
    
    Route::prefix('logos')->group(function(){
        Route::get('/view', 'Backend\LogoController@view')->name('logos.view');
        Route::get('/add', 'Backend\LogoController@add')->name('logos.add');
        Route::post('/store', 'Backend\LogoController@store')->name('logos.store');
        Route::get('/edit/{id}', 'Backend\LogoController@edit')->name('logos.edit');
        Route::post('/update/{id}', 'Backend\LogoController@update')->name('logos.update');
        Route::get('/delete/{id}', 'Backend\LogoController@delete')->name('logos.delete');
    });
    
    Route::prefix('sliders')->group(function(){
        Route::get('/view', 'Backend\SliderController@view')->name('sliders.view');
        Route::get('/add', 'Backend\SliderController@add')->name('sliders.add');
        Route::post('/store', 'Backend\SliderController@store')->name('sliders.store');
        Route::get('/edit/{id}', 'Backend\SliderController@edit')->name('sliders.edit');
        Route::post('/update/{id}', 'Backend\SliderController@update')->name('sliders.update');
        Route::get('/delete/{id}', 'Backend\SliderController@delete')->name('sliders.delete');
    });
    
    Route::prefix('infos')->group(function(){
        Route::get('/view', 'Backend\InfoController@view')->name('infos.view');
        Route::get('/add', 'Backend\InfoController@add')->name('infos.add');
        Route::post('/store', 'Backend\InfoController@store')->name('infos.store');
        Route::get('/edit/{id}', 'Backend\InfoController@edit')->name('infos.edit');
        Route::post('/update/{id}', 'Backend\InfoController@update')->name('infos.update');
        Route::post('/delete', 'Backend\InfoController@delete')->name('infos.delete');
    });
    
  
    Route::prefix('contacts')->group(function(){
        Route::get('/view', 'Backend\ContactController@view')->name('contacts.view');
        Route::get('/add', 'Backend\ContactController@add')->name('contacts.add');
        Route::post('/store', 'Backend\ContactController@store')->name('contacts.store');
        Route::get('/edit/{id}', 'Backend\ContactController@edit')->name('contacts.edit');
        Route::post('/update/{id}', 'Backend\ContactController@update')->name('contacts.update');
        Route::get('/delete/{id}', 'Backend\ContactController@delete')->name('contacts.delete');
        Route::get('/communicate', 'Backend\ContactController@communicateView')->name('communicates.view');
        Route::post('/communicate/delete', 'Backend\ContactController@communicateDelete')->name('communicates.delete');
    });

    Route::prefix('categories')->group(function(){
        Route::get('/view', 'Backend\CategoryController@view')->name('categories.view');
        Route::get('/add', 'Backend\CategoryController@add')->name('categories.add');
        Route::post('/store', 'Backend\CategoryController@store')->name('categories.store');
        Route::get('/edit/{id}', 'Backend\CategoryController@edit')->name('categories.edit');
        Route::post('/update/{id}', 'Backend\CategoryController@update')->name('categories.update');
        Route::post('/delete', 'Backend\CategoryController@delete')->name('categories.delete');
    });

    Route::prefix('brands')->group(function(){
        Route::get('/view', 'Backend\BrandController@view')->name('brands.view');
        Route::get('/add', 'Backend\BrandController@add')->name('brands.add');
        Route::post('/store', 'Backend\BrandController@store')->name('brands.store');
        Route::get('/edit/{id}', 'Backend\BrandController@edit')->name('brands.edit');
        Route::post('/update/{id}', 'Backend\BrandController@update')->name('brands.update');
        Route::post('/delete', 'Backend\BrandController@delete')->name('brands.delete');
    });

    Route::prefix('colors')->group(function(){
        Route::get('/view', 'Backend\ColorController@view')->name('colors.view');
        Route::get('/add', 'Backend\ColorController@add')->name('colors.add');
        Route::post('/store', 'Backend\ColorController@store')->name('colors.store');
        Route::get('/edit/{id}', 'Backend\ColorController@edit')->name('colors.edit');
        Route::post('/update/{id}', 'Backend\ColorController@update')->name('colors.update');
        Route::post('/delete', 'Backend\ColorController@delete')->name('colors.delete');
    });

    Route::prefix('sizes')->group(function(){
        Route::get('/view', 'Backend\SizeController@view')->name('sizes.view');
        Route::get('/add', 'Backend\SizeController@add')->name('sizes.add');
        Route::post('/store', 'Backend\SizeController@store')->name('sizes.store');
        Route::get('/edit/{id}', 'Backend\SizeController@edit')->name('sizes.edit');
        Route::post('/update/{id}', 'Backend\SizeController@update')->name('sizes.update');
        Route::post('/delete', 'Backend\SizeController@delete')->name('sizes.delete');
    });
});

