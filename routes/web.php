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


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {


        /**
         * Route Categories X Products
         */
        Route::any('products/{id}/categories/create', 'CategoryProductController@categoriesCreate')->name('products.categories.create');
        Route::get('products/{id}/categories/{idCategory}/detach', 'CategoryProductController@detachCategoryProduct')->name('products.categories.detach');
        Route::post('products/{id}/categories', 'CategoryProductController@attachCategoriesProduct')->name('products.categories.attach');
        Route::get('products/{id}/categories', 'CategoryProductController@categories')->name('products.categories');
        Route::get('categories/{id}/product', 'CategoryProductController@products')->name('categories.products');


        /**
         * Route Tables
         */
        Route::any('tables/search', 'TableController@search')->name('tables.search');
        Route::resource('tables', 'TableController');


        /**
         * Route Categories
         */
        Route::any('categories/search', 'CategoryController@search')->name('categories.search');
        Route::resource('categories', 'CategoryController');

        /**
         * Route Products
         */
        Route::any('products/search', 'ProductController@search')->name('products.search');
        Route::resource('products', 'ProductController');

        /**
         * Route Users
         */
        Route::any('users/search', 'UserController@search')->name('users.search');
        Route::resource('users', 'UserController');

        /**
         * Route Permissions X Profiles
         */
        Route::any('profiles/{id}/permissions/create', 'ACL\PermissionProfileController@permissionsCreate')->name('profiles.permissions.create');
        Route::get('profiles/{id}/permissions/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionsProfile')->name('profiles.permissions.detach');
        Route::post('profiles/{id}/permissions', 'ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
        Route::get('profiles/{id}/permissions', 'ACL\PermissionProfileController@permissions')->name('profiles.permissions');
        Route::get('permissions/{id}/profile', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');

        /**
         * Route Plans X Profiles
         */
        Route::any('plans/{id}/profiles/create', 'ACL\PlanProfileController@profilesCreate')->name('plans.profiles.create');
        Route::get('plans/{id}/profiles/{idProfile}/detach', 'ACL\PlanProfileController@detachProfilePlan')->name('plans.profiles.detach');
        Route::post('plans/{id}/profiles', 'ACL\PlanProfileController@attachProfilePlan')->name('plans.profiles.attach');
        Route::get('plans/{id}/profiles', 'ACL\PlanProfileController@profiles')->name('plans.profiles');
        Route::get('profiles/{id}/plans', 'ACL\PlanProfileController@plans')->name('profiles.plans');


        /**
         * Route Profiles
         */
        Route::any('profiles/search', 'ACL\ProfilesController@search')->name('profiles.search');
        Route::resource('profiles', 'ACL\ProfilesController');


        /**
         * Route Permissions
         */

        Route::any('permissions/search', 'ACL\PermissionsController@search')->name('permissions.search');
        Route::resource('permissions', 'ACL\PermissionsController');


        /**
         * Route Details Plans
         */
        Route::get('plans/{url}/details/create', 'DetailsPlanController@create')->name('details.plan.create');
        Route::post('plans/{url}/details', 'DetailsPlanController@store')->name('details.plan.store');
        Route::get('plans/{url}/details', 'DetailsPlanController@index')->name('details.plan.index');
        Route::get('plans/{url}/details/{idDet}/edit', 'DetailsPlanController@edit')->name('details.plan.edit');
        Route::put('plans/{url}/details/{idDet}', 'DetailsPlanController@update')->name('details.plan.update');
        Route::get('plans/{url}/details/{idDet}', 'DetailsPlanController@show')->name('details.plan.show');
        Route::delete('plans/{url}/details/{idDet}', 'DetailsPlanController@destroy')->name('details.plan.destroy');


        /**
         * Route Plans
         */
        Route::any('plans/search', 'PlanController@search')->name('plans.search');
        Route::get('plans', 'PlanController@index')->name('plans.index');
        Route::get('plans/create', 'PlanController@create')->name('plans.create');
        Route::post('plans', 'PlanController@store')->name('plans.store');
        Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
        Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
        Route::put('plans/{url}/', 'PlanController@update')->name('plans.update');
        Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');

        /**
         * Route Home Dashboard
         */
        Route::get('/', 'PlanController@index')->name('admin.index');
    });


/**
 * Route Site
 */
Route::get('/plan/{url}', 'Site\SiteController@plan')->name('plan.subscription');
Route::get('/', 'Site\SiteController@index')->name('site.home');


/**
 * Route Auth
 */
Auth::routes();

