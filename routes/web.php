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

Auth::routes();

Route::get('/user/area/{area}', 'User\AreaController@store')->name('user.area.store');

Route::group(['prefix' => '/{area}'], function () {

	Route::group(['prefix' => '/categories'], function () {
		Route::get('/', 'Category\CategoryController@index')->name('category.index');

		Route::group(['prefix' => '/{category}'], function () {
			Route::get('/listing', 'Listing\ListingController@index')->name('listing.index');
		});

	});
	Route::group(['prefix' => '/listings', 'namespace' => 'Listing'], function () {
		Route::get('/favorites', 'ListingFavoriteController@index')->name('listing.favorite.index');
		Route::post('/{listing}/favorites', 'ListingFavoriteController@store')->name('listing.favorite.store');
		Route::delete('/{listing}/favorites', 'ListingFavoriteController@destroy')->name('listing.favorite.destroy');
		Route::get('/viewed', 'ListingViewedController@index')->name('listings.viewed.index');
		Route::post('/{listing}/contact', 'ListingContactController@store')->name('listings.contact.store');

		Route::get('/{listing}/payment', 'ListingPaymentController@show')->name('listing.payment.show');
		Route::post('/{listing}/payment', 'ListingPaymentController@store')->name('listing.payment.store');
		Route::patch('/{listing}/payment', 'ListingPaymentController@update')->name('listing.payment.update');

		Route::get('/unpublished', 'ListingUnpublishedController@index')->name('listing.unpublished.index');
		Route::get('/published', 'ListingPublishedController@index')->name('listing.published.index');

		Route::group(['middleware' => 'auth'], function () {
			Route::get('/create', 'ListingController@create')->name('listing.create');
			Route::post('/', 'ListingController@store')->name('listing.store');
			Route::get('/{listing}/edit', 'ListingController@edit')->name('listing.edit');
			Route::patch('/{listing}', 'ListingController@update')->name('listing.update');
			Route::delete('/{listing}', 'ListingController@destroy')->name('listing.destroy');
		});
	});

	Route::get('/{listing}', 'Listing\ListingController@show')->name('listing.show');
});
