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

Route::group(['namespace'=>'Admin'],function(){
	Route::get('login','LoginController@login')->name('login');
	Route::post('postLogin','LoginController@postLogin')->name('postLogin');
	 
});

Route::group(['namespace'=>'Admin','middleware'=>['auth'],'prefix'=>'admin'],function(){
	Route::resource('dashboard','DashboardController');
	Route::get('logout','LoginController@Logout')->name('logout');
	Route::resource('project_case','ProjectController');
	Route::resource('product','ProductController');
	Route::resource('about','AboutController');
	Route::resource('subscriber', 'SubscriberController');
	Route::resource('setting','SettingController');
	Route::resource('page', 'PageController');
	Route::resource('team', 'TeamController');
	Route::resource('testimonial', 'TestimonialController');
	Route::resource('contact', 'ContactController');
	Route::resource('dealer', 'DealerController');
	Route::resource('category', 'CategoryController');

});

Route::group(['namespace'=>'Front'],function(){
	// Route::get('/{cat_slug}/{$pro_slug}','DefaultController@index')->name('home');
	Route::get('/','DefaultController@index')->name('home');
	Route::get('about','DefaultController@about')->name('about');
	Route::get('projects','DefaultController@projects')->name('projects');
	Route::get('products','DefaultController@products')->name('products');
	Route::get('contact','DefaultController@contact')->name('contact');
	Route::post('subscription', 'DefaultController@subscription')->name('subscription');
	Route::post('contact-us','DefaultController@contactUs')->name('contactUs');
	Route::get('products_list/{slug}','DefaultController@productsList')->name('products_list');
	Route::get('category/{slug}','DefaultController@productBySlug')->name('productBySlug');
	Route::get('category/{catslug}/products/{slug}', 'DefaultController@productInner')->name('productInner');
	Route::get('privacy-policy','DefaultController@privacyPolicy')->name('privacyPolicy');
	Route::get('where-to-buy','DefaultController@buy')->name('whereToBuy');


	
	

});

// Route:GET('CATEGORY/{SLUG}')->NAME('CATEGORY')