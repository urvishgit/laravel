<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');

Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');

Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

Route::get('/admin', 'Admin\HomeController@index')->name('admin.home');	


/**
 * For Admin related all route
 * Categories, Tags, CKEditor, CKeditor Image upload, Posts Route
 *
 */

Route::resource('admin/editor','Admin\CKEditorController', ['as' => 'admin']);

Route::post('admin/ckeditor/image_upload', 'Admin\CKEditorController@upload')->name('admin.upload');




Route::get('admin/modules/export', 'Admin\ModulesController@export')->name('admin.modules.export');

Route::get('admin/users/export', 'Admin\UsersController@export')->name('admin.users.export');

Route::get('admin/categories/export', 'Admin\CategoriesController@export')->name('admin.categories.export');

Route::get('admin/brands/export', 'Admin\BrandsController@export')->name('admin.brands.export');

Route::get('admin/tags/export', 'Admin\TagsController@export')->name('admin.tags.export');

Route::get('admin/articles/export', 'Admin\ArticlesController@export')->name('admin.articles.export');

Route::get('admin/casestudies/export', 'Admin\CasestudiesController@export')->name('admin.casestudies.export');

Route::get('admin/team/export', 'Admin\TeamsController@export')->name('admin.team.export');



Route::get('admin/modules/changeStatus/{module}','Admin\ModulesController@changeStatus')->name('admin.modules.changeStatus');

Route::get('admin/users/changeStatus/{user}','Admin\UsersController@changeStatus')->name('admin.users.changeStatus');

Route::get('admin/categories/changeStatus/{category}','Admin\CategoriesController@changeStatus')->name('admin.categories.changeStatus');

Route::get('admin/brands/changeStatus/{brand}','Admin\BrandsController@changeStatus')->name('admin.brands.changeStatus');

Route::get('admin/tags/changeStatus/{tag}','Admin\TagsController@changeStatus')->name('admin.tags.changeStatus');

Route::get('admin/articles/changeStatus/{article}','Admin\ArticlesController@changeStatus')->name('admin.articles.changeStatus');

Route::get('admin/team/changeStatus/{team}','Admin\TeamsController@changeStatus')->name('admin.team.changeStatus');

Route::get('admin/casestudies/changeStatus/{casestudy}','Admin\CasestudiesController@changeStatus')->name('admin.casestudies.changeStatus');




Route::get('admin/trashed-modules','Admin\ModulesController@trashed')->name('admin.trashed.modules.index');

Route::get('admin/trashed-users','Admin\UsersController@trashed')->name('admin.trashed.users.index');

Route::get('admin/trashed-categories','Admin\CategoriesController@trashed')->name('admin.trashed.categories.index');

Route::get('admin/trashed-brands','Admin\BrandsController@trashed')->name('admin.trashed.brands.index');

Route::get('admin/trashed-tags','Admin\TagsController@trashed')->name('admin.trashed.tags.index');

Route::get('admin/trashed-articles','Admin\ArticlesController@trashed')->name('admin.trashed.articles.index');

Route::get('admin/trashed-casestudies','Admin\CasestudiesController@trashed')->name('admin.trashed.casestudies.index');

Route::get('admin/trashed-products','Admin\ProductsController@trashed')->name('admin.trashed.products.index');

Route::get('admin/trashed-team','Admin\TeamsController@trashed')->name('admin.trashed.team.index');

Route::get('admin/trashed-pages','Admin\PagesController@trashed')->name('admin.trashed.pages.index');




Route::put('admin/restore-modules/{module}','Admin\ModulesController@restore')->name('admin.restore.module');

Route::put('admin/restore-users/{user}','Admin\UsersController@restore')->name('admin.restore.user');

Route::put('admin/restore-categories/{category}','Admin\CategoriesController@restore')->name('admin.restore.category');

Route::put('admin/restore-brands/{brand}','Admin\BrandsController@restore')->name('admin.restore.brand');

Route::put('admin/restore-tags/{tag}','Admin\TagsController@restore')->name('admin.restore.tag');

Route::put('admin/restore-articles/{article}','Admin\ArticlesController@restore')->name('admin.restore.article');

Route::put('admin/restore-team/{team}','Admin\TeamsController@restore')->name('admin.restore.team');

Route::put('admin/restore-casestudies/{casestudy}','Admin\CasestudiesController@restore')->name('admin.restore.casestudy');




Route::get('admin/modules/checkSlug', 'Admin\ModulesController@checkSlug')->name('admin.modules.check-slug');

Route::get('admin/categories/checkSlug', 'Admin\CategoriesController@checkSlug')->name('admin.categories.check-slug');

Route::get('admin/brands/checkSlug', 'Admin\BrandsController@checkSlug')->name('admin.brands.check-slug');

Route::get('admin/tags/checkSlug', 'Admin\TagsController@checkSlug')->name('admin.tags.check-slug');

Route::get('admin/articles/checkSlug', 'Admin\ArticlesController@checkSlug')->name('admin.articles.check-slug');

Route::get('admin/team/checkSlug', 'Admin\TeamsController@checkSlug')->name('admin.team.check-slug');

Route::get('admin/casestudies/checkSlug', 'Admin\CasestudiesController@checkSlug')->name('admin.casestudies.check-slug');



Route::get('admin/users/profile','Admin\UsersController@editProfile')->name('admin.users.edit-profile');

Route::put('admin/users/profile','Admin\UsersController@updateProfile')->name('admin.users.update-profile');


Route::get('admin/users','Admin\UsersController@index')->name('admin.users.index');

Route::get('admin/users/create','Admin\UsersController@create')->name('admin.users.create');

Route::post('admin/users','Admin\UsersController@store')->name('admin.users.store');

Route::get('admin/users/{user}/edit','Admin\UsersController@edit')->name('admin.users.edit');

Route::put('admin/users/{user}','Admin\UsersController@update')->name('admin.users.update');

Route::delete('admin/users/{user}','Admin\UsersController@destroy')->name('admin.users.destroy');




Route::get('admin/settings','Admin\SettingsController@index')->name('admin.settings.index');

Route::post('admin/settings','Admin\SettingsController@update')->name('admin.settings.update');



Route::resource('admin/modules','Admin\ModulesController', ['as' => 'admin']);

Route::resource('admin/categories','Admin\CategoriesController', ['as' => 'admin']);

Route::resource('admin/tags','Admin\TagsController', ['as' => 'admin']);

Route::resource('admin/brands','Admin\BrandsController', ['as' => 'admin']);

Route::resource('admin/articles','Admin\ArticlesController', ['as' => 'admin']);

Route::resource('admin/products','Admin\ProductsController', ['as' => 'admin']);

Route::resource('admin/casestudies','Admin\CasestudiesController', ['as' => 'admin']);

Route::resource('admin/team','Admin\TeamsController', ['as' => 'admin']);

Route::resource('admin/pages','Admin\PagesController', ['as' => 'admin']);

Route::resource('admin/enquiries','Admin\EnquiriesController', ['as' => 'admin']);



