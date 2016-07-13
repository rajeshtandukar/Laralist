<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
  	
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('items', 'ItemController@index')->name('admin.items'); 
    Route::get('items/create', 'ItemController@create')->name('admin.items.create'); 
    Route::post('items/store', 'ItemController@store')->name('admin.items.store'); 
    Route::get('items/edit/{edit}', 'ItemController@edit')->name('admin.items.edit'); 
    Route::post('items/update', 'ItemController@update')->name('admin.items.update'); 
    Route::post('items/publish', 'ItemController@publish')->name('admin.items.publish');
    Route::post('items/unpublish', 'ItemController@unpublish')->name('admin.items.unpublish'); 
    Route::post('items/destroy', 'ItemController@destroy')->name('admin.items.destroy');  

    Route::get('categories', 'CategoryController@index')->name('admin.categories'); 
    Route::post('categories/publish', 'CategoryController@publish')->name('admin.categories.publish');
    Route::post('categories/unpublish', 'CategoryController@unpublish')->name('admin.categories.unpublish'); 
    Route::post('categories/destroy', 'CategoryController@destroy')->name('admin.categories.destroy');  
    Route::get('categories/create', 'CategoryController@create')->name('admin.categories.create'); 
    Route::post('categories/store', 'CategoryController@store')->name('admin.categories.store'); 
    Route::get('categories/edit/{edit}', 'CategoryController@edit')->name('admin.categories.edit');
    Route::post('categories/update', 'CategoryController@update')->name('admin.categories.update');   


    Route::get('countries', 'CountryController@index')->name('admin.countries'); 
    Route::get('countries/create', 'CountryController@create')->name('admin.countries.create');
    Route::get('countries/edit/{edit}', 'CountryController@edit')->name('admin.countries.edit'); 
    Route::post('countries/store', 'CountryController@store')->name('admin.countries.store');
    Route::post('countries/publish', 'CountryController@publish')->name('admin.countries.publish');
    Route::post('countries/unpublish', 'CountryController@unpublish')->name('admin.countries.unpublish'); 
    Route::post('countries/destroy', 'CountryController@destroy')->name('admin.countries.destroy'); 
     Route::post('countries/update', 'CountryController@update')->name('admin.countries.update'); 


    Route::get('mailtemplates', 'MailtemplateController@index')->name('admin.mailtemplates'); 
    Route::get('mailtemplates/create', 'MailtemplateController@create')->name('admin.mailtemplates.create');
    Route::get('mailtemplates/edit/{edit}', 'MailtemplateController@edit')->name('admin.mailtemplates.edit'); 
    Route::post('mailtemplates/store', 'MailtemplateController@store')->name('admin.mailtemplates.store');
    Route::post('mailtemplates/update', 'MailtemplateController@update')->name('admin.mailtemplates.update'); 
    
    Route::post('mailtemplates/publish', 'MailtemplateController@publish')->name('admin.mailtemplates.publish');
    Route::post('mailtemplates/unpublish', 'MailtemplateController@unpublish')->name('admin.mailtemplates.unpublish'); 
    Route::post('mailtemplates/destroy', 'MailtemplateController@destroy')->name('admin.mailtemplates.destroy');


    Route::get('users', 'UserController@index')->name('admin.users'); 
    Route::get('users/create', 'UserController@create')->name('admin.users.create');
    Route::get('users/edit/{edit}', 'UserController@edit')->name('admin.users.edit'); 
    Route::post('users/store', 'UserController@store')->name('admin.users.store');
     Route::post('users/update', 'UserController@update')->name('admin.users.update');
    Route::post('users/destroy', 'UserController@destroy')->name('admin.users.destroy');     


    Route::get('settings', 'SettingsController@index')->name('admin.settings'); 
    Route::post('settings/update', 'SettingsController@update')->name('admin.settings.update'); 

    
    
   

});

Route::group(['namespace' => 'Auth'], function () {
       
	   Route::group(['middleware' => 'guest', 'middleware' => 'web'], function () {

		Route::get('login', 'AuthController@showLoginForm')->name('auth.login');
		Route::post('login', 'AuthController@login');
		Route::get('register', 'AuthController@showRegistrationForm')->name('auth.register');
		Route::post('register', 'AuthController@register');	   
		Route::get('logout', 'AuthController@logout')->name('auth.logout');     

        Route::get('password/reset/{token?}', 'PasswordController@showResetForm')->name('auth.password.reset');
        Route::post('password/email', 'PasswordController@sendResetLinkEmail');
        Route::post('password/reset', 'PasswordController@reset');

	});

});

Route::group(['namespace' => 'Frontend', 'middleware' => 'web'], function () {
    //Route::auth();
    Route::get('/', 'HomeController@index')->name('frontend.home');
    Route::get('post', 'PostController@create')->name('frontend.post');
    Route::post('post/store', 'PostController@store')->name('frontend.post.store');
    Route::post('post/update', 'PostController@update')->name('frontend.post.update');
    Route::get('post/{item}', 'PostController@edit')->name('frontend.post.edit');
    Route::get('post/delete/{delete}', 'PostController@destrory')->name('frontend.post.delete');
    
    Route::get('item/{item}', 'ItemController@show')->name('frontend.item.show');
    Route::get('search', 'ItemController@search')->name('frontend.item.search');
   
    Route::get('list/{category}', 'ListController@index')->name('frontend.list');
    Route::get('user/myitems', 'UserController@items')->name('frontend.user.myitems');

    Route::get('profile', 'UserController@index')->name('frontend.user.profile');
    Route::post('profile/update', 'UserController@updateprofile')->name('frontend.user.update');

    Route::post('media/upload', 'MediaController@upload')->name('media.upload');
    Route::get('media/delete/{delete}', 'MediaController@destroy')->name('frontend.media.delete');

    Route::get('country', 'CountryController@index')->name('frontend.country');
    Route::get('citems/{country}', 'ListController@countryitems')->name('frontend.countryitems');

     Route::post('item/sendmessage', 'ItemController@sendmessage')->name('frontend.item.sendmessage'); 
 });
