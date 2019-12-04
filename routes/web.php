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

Route::get('/test', function () {
    return view('test');
});

Route::get('addWatermark', function()
{
    $img = Image::make(public_path('images/main.jpg'));
   
    /* insert watermark at bottom-right corner with 10px offset */
    $img->insert(public_path('images/logo.jpg'), 'bottom-right', 10, 10);
    $img->save(public_path('images/main-new.jpg')); 
   
    dd('saved image successfully.');
});


// MODULE article
Route::get('backend/article', 'Backend\articleController@index')->name('backend.article');
Route::get('backend/article/search', 'Backend\articleController@search')->name('backend.article.search');
Route::get('backend/article/create', 'Backend\articleController@create')->name('backend.article.create');
Route::post('backend/article/store', 'Backend\articleController@store')->name('backend.article.store');
Route::get('backend/articles/{id}', 'Backend\articleController@show')->name('backend.article.show');
Route::get('backend/articles/{id}/edit', 'Backend\articleController@edit')->name('backend.article.edit');
Route::put('backend/articles/{id}', 'Backend\articleController@update')->name('backend.article.update');
Route::delete('backend/articles/{id}', 'Backend\articleController@destroy')->name('backend.article.destroy');

// MODULE article - AJAX
Route::get('backend/ajax/get_select2', 'Ajax\DashboardController@get_select2');


// MODULE article CATALOGUE
Route::get('backend/articlecatalogue', 'Backend\articleCatalogueController@index')->name('backend.articlecatalogue');
Route::get('backend/articlecatalogue/search', 'Backend\articleCatalogueController@search')->name('backend.articlecatalogue.search');
Route::get('backend/articlecatalogue/create', 'Backend\articleCatalogueController@create')->name('backend.articlecatalogue.create');
Route::post('backend/articlecatalogue/store', 'Backend\articleCatalogueController@store')->name('backend.articlecatalogue.store');
Route::get('backend/articlecatalogues/{id}', 'Backend\articleCatalogueController@show')->name('backend.articlecatalogue.show');
Route::get('backend/articlecatalogues/{id}/edit', 'Backend\articleCatalogueController@edit')->name('backend.articlecatalogue.edit');
Route::put('backend/articlecatalogues/{id}', 'Backend\articleCatalogueController@update')->name('backend.articlecatalogue.update');
Route::delete('backend/articlecatalogues/{id}', 'Backend\articleCatalogueController@destroy')->name('backend.articlecatalogue.destroy');

// MODULE article
Route::get('backend/article', 'Backend\articleController@index')->name('backend.article');
Route::get('backend/article/search', 'Backend\articleController@search')->name('backend.article.search');
Route::get('backend/article/create', 'Backend\articleController@create')->name('backend.article.create');
Route::post('backend/article/store', 'Backend\articleController@store')->name('backend.article.store');
Route::get('backend/articles/{id}', 'Backend\articleController@show')->name('backend.article.show');
Route::get('backend/articles/{id}/edit', 'Backend\articleController@edit')->name('backend.article.edit');
Route::put('backend/articles/{id}', 'Backend\articleController@update')->name('backend.article.update');
Route::delete('backend/articles/{id}', 'Backend\articleController@destroy')->name('backend.article.destroy');




// MODULE USER
Route::get('backend/user', 'Backend\UserController@index')->name('backend.user');
Route::get('backend/user/search', 'Backend\UserController@search')->name('backend.user.search');
Route::get('backend/user/create', 'Backend\UserController@create')->name('backend.user.create');
Route::post('backend/user/store', 'Backend\UserController@store')->name('backend.user.store');
Route::get('backend/users/{id}', 'Backend\UserController@show')->name('backend.user.show');
Route::get('backend/users/{id}/edit', 'Backend\UserController@edit')->name('backend.user.edit');
Route::put('backend/users/{id}', 'Backend\UserController@update')->name('backend.user.update');
Route::delete('backend/users/{id}', 'Backend\UserController@destroy')->name('backend.user.destroy');

// MODULE USER - AJAX
Route::get('backend/ajax/dropdown', 'Ajax\DashboardController@dropdown');


// MODULE USER CATALOGUE
Route::get('backend/usercatalogue', 'Backend\UserCatalogueController@index')->name('backend.usercatalogue');
Route::get('backend/usercatalogue/search', 'Backend\UserCatalogueController@search')->name('backend.usercatalogue.search');
Route::get('backend/usercatalogue/create', 'Backend\UserCatalogueController@create')->name('backend.usercatalogue.create');
Route::post('backend/usercatalogue/store', 'Backend\UserCatalogueController@store')->name('backend.usercatalogue.store');
Route::get('backend/usercatalogues/{id}', 'Backend\UserCatalogueController@show')->name('backend.usercatalogue.show');
Route::get('backend/usercatalogues/{id}/edit', 'Backend\UserCatalogueController@edit')->name('backend.usercatalogue.edit');
Route::put('backend/usercatalogues/{id}', 'Backend\UserCatalogueController@update')->name('backend.usercatalogue.update');
Route::delete('backend/usercatalogues/{id}', 'Backend\UserCatalogueController@destroy')->name('backend.usercatalogue.destroy');


Auth::routes();