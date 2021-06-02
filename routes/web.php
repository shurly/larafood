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
    ->middleware('auth')
    ->group(function () {

        /**
         * Route Categories
         */
        Route::any('categories/search', 'Admin\CategoryController@search')->name('categories.search');
        Route::resource('categories', 'Admin\CategoryController');

        /**
         * Route Products
         */
        Route::any('products/search', 'Admin\ProductController@search')->name('products.search');
        Route::resource('products', 'Admin\ProductController');

        /**
         * Route Users
         */
        Route::any('users/search', 'Admin\UserController@search')->name('users.search');
        Route::resource('users', 'Admin\UserController');

        /**
         * Route Permissions X Profiles
         */
        Route::any('profiles/{id}/permissions/create', 'Admin\ACL\PermissionProfileController@permissionsCreate')->name('profiles.permissions.create');
        Route::get('profiles/{id}/permissions/{idPermission}/detach', 'Admin\ACL\PermissionProfileController@detachPermissionsProfile')->name('profiles.permissions.detach');
        Route::post('profiles/{id}/permissions', 'Admin\ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
        Route::get('profiles/{id}/permissions', 'Admin\ACL\PermissionProfileController@permissions')->name('profiles.permissions');
        Route::get('permissions/{id}/profile', 'Admin\ACL\PermissionProfileController@profiles')->name('permissions.profiles');

        /**
         * Route Plans X Profiles
         */
        Route::any('plans/{id}/profiles/create', 'Admin\ACL\PlanProfileController@profilesCreate')->name('plans.profiles.create');
        Route::get('plans/{id}/profiles/{idProfile}/detach', 'Admin\ACL\PlanProfileController@detachProfilePlan')->name('plans.profiles.detach');
        Route::post('plans/{id}/profiles', 'Admin\ACL\PlanProfileController@attachProfilePlan')->name('plans.profiles.attach');
        Route::get('plans/{id}/profiles', 'Admin\ACL\PlanProfileController@profiles')->name('plans.profiles');
        Route::get('profiles/{id}/plans', 'Admin\ACL\PlanProfileController@plans')->name('profiles.plans');


        /**
         * Route Profiles
         */
        Route::any('profiles/search', 'Admin\ACL\ProfilesController@search')->name('profiles.search');
        Route::resource('profiles', 'Admin\ACL\ProfilesController');


        /**
         * Route Permissions
         */

        Route::any('permissions/search', 'Admin\ACL\PermissionsController@search')->name('permissions.search');
        Route::resource('permissions', 'Admin\ACL\PermissionsController');


        /**
         * Route Details Plans
         */
        Route::get('plans/{url}/details/create', 'Admin\DetailsPlanController@create')->name('details.plan.create');
        Route::post('plans/{url}/details', 'Admin\DetailsPlanController@store')->name('details.plan.store');
        Route::get('plans/{url}/details', 'Admin\DetailsPlanController@index')->name('details.plan.index');
        Route::get('plans/{url}/details/{idDet}/edit', 'Admin\DetailsPlanController@edit')->name('details.plan.edit');
        Route::put('plans/{url}/details/{idDet}', 'App\Http\Controllers\Admin\DetailsPlanController@update')->name('details.plan.update');
        Route::get('plans/{url}/details/{idDet}', 'Admin\DetailsPlanController@show')->name('details.plan.show');
        Route::delete('plans/{url}/details/{idDet}', 'Admin\DetailsPlanController@destroy')->name('details.plan.destroy');


        /**
         * Route Plans
         */
        Route::any('plans/search', 'Admin\PlanController@search')->name('plans.search');
        Route::get('plans', 'Admin\PlanController@index')->name('plans.index');
        Route::get('plans/create', 'Admin\PlanController@create')->name('plans.create');
        Route::post('plans', 'Admin\PlanController@store')->name('plans.store');
        Route::get('plans/{url}', 'Admin\PlanController@show')->name('plans.show');
        Route::get('plans/{url}/edit', 'Admin\PlanController@edit')->name('plans.edit');
        Route::put('plans/{url}/', 'Admin\PlanController@update')->name('plans.update');
        Route::delete('plans/{url}', 'Admin\PlanController@destroy')->name('plans.destroy');

        /**
         * Route Home Dashboard
         */
        Route::get('/', 'Admin\PlanController@index')->name('admin.index');
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

