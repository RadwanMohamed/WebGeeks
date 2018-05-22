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

/**
 * site
 */
Route::get('/','HomeController@index');
Route::get('/home','HomeController@index');
Route::post('/send','HomeController@mail');
Route::get('/getmore','HomeController@getmore');
Route::get('/blog','BlogController@index');
Route::get('/blog/{post}/show','BlogController@show');




/**
 * Admin Routes
 */


Route::group(['middleware'=>'web'],function() {
    // Dashboard Home
    Route::get('/admin-panel', 'AdminController@index');





});

/**
 * Routes for manger
 */

Route::group(['middleware'=>'admin'],function() {
    /**
     * users routes
     */
    Route::get('/admin-panel/users','UserController@index');
    Route::get('/admin-panel/users/add','UserController@create');
    Route::post('/admin-panel/users/add','UserController@store');
    Route::get('/admin-panel/users/{user}/edit','UserController@edit');
    Route::put('/admin-panel/users/{user}/update','UserController@update');
    Route::get('/admin-panel/users/{user}/delete','UserController@destroy');

    /**
     * end users routes
     */



    /**
     * begin portofolio routes
     */
    Route::get('/admin-panel/port','PortController@index');
    Route::get('/admin-panel/port/add','PortController@create');
    Route::post('/admin-panel/port/add','PortController@store');
    Route::get('/admin-panel/port/{port}/edit','PortController@edit');
    Route::put('/admin-panel/port/{port}/update','PortController@update');
    Route::get('/admin-panel/port/{port}/delete','PortController@destroy');
    /**
     * end  portofolio routes
     */
  /**
     * begin Team members routes
     */
    Route::get('/admin-panel/team_members','TeamMembersController@index');
    Route::get('/admin-panel/team_members/add','TeamMembersController@create');
    Route::post('/admin-panel/team_members/add','TeamMembersController@store');
    Route::get('/admin-panel/team_members/{member}/edit','TeamMembersController@edit');
    Route::put('/admin-panel/team_members/{member}/update','TeamMembersController@update');
    Route::get('/admin-panel/team_members/{member}/delete','TeamMembersController@destroy');
    /**
     * end  Team members routes
     */
 /**
     * begin  Skills routes
     */
    Route::get('/admin-panel/skills','SkillsController@index');
    Route::get('/admin-panel/skills/add','SkillsController@create');
    Route::post('/admin-panel/skills/add','SkillsController@store');
    Route::get('/admin-panel/skills/{member}/edit','SkillsController@edit');
    Route::put('/admin-panel/skills/{member}/update','SkillsController@update');
    Route::get('/admin-panel/skills/{member}/delete','SkillsController@destroy');
    /**
     * end  Skills routes
     */

 /**
     * begin  Services  routes
     */
    Route::get('/admin-panel/services','ServicesController@index');
    Route::get('/admin-panel/services/add','ServicesController@create');
    Route::post('/admin-panel/services/add','ServicesController@store');
    Route::get('/admin-panel/services/{service}/edit','ServicesController@edit');
    Route::put('/admin-panel/services/{service}/update','ServicesController@update');
    Route::get('/admin-panel/services/{service}/delete','ServicesController@destroy');
    /**
     * end  Skills routes
     */
/**
     * begin  Testimonies  routes
     */
    Route::get('/admin-panel/Testimonies','TestimonyController@index');
    Route::get('/admin-panel/Testimonies/add','TestimonyController@create');
    Route::post('/admin-panel/Testimonies/add','TestimonyController@store');
    Route::get('/admin-panel/Testimonies/{testimony}/edit','TestimonyController@edit');
    Route::put('/admin-panel/Testimonies/{testimony}/update','TestimonyController@update');
    Route::get('/admin-panel/Testimonies/{testimony}/delete','TestimonyController@destroy');
    /**
     * end  Testimonies routes
     */

    /**
     * begin  Pricing plan  routes
     */
    Route::get('/admin-panel/pricingplans','PricingPlanController@index');
    Route::get('/admin-panel/pricingplans/add','PricingPlanController@create');
    Route::post('/admin-panel/pricingplans/add','PricingPlanController@store');
    Route::get('/admin-panel/pricingplans/{plan}/edit','PricingPlanController@edit');
    Route::put('/admin-panel/pricingplans/{plan}/update','PricingPlanController@update');
    Route::get('/admin-panel/pricingplans/{plan}/delete','PricingPlanController@destroy');
    /**
     * end  Pricing plan routes
     */
    /**
     * begin  Clients  routes
     */
    Route::get('/admin-panel/clients','ClientsController@index');
    Route::get('/admin-panel/clients/add','ClientsController@create');
    Route::post('/admin-panel/clients/add','ClientsController@store');
    Route::get('/admin-panel/clients/{client}/edit','ClientsController@edit');
    Route::put('/admin-panel/clients/{client}/update','ClientsController@update');
    Route::get('/admin-panel/clients/{client}/delete','ClientsController@destroy');
    /**
     * end  Clients routes
     */
 /**
     * begin  Articles  routes
     */
    Route::get('/admin-panel/articles','ArticlesController@index');
    Route::get('/admin-panel/articles/add','ArticlesController@create');
    Route::post('/admin-panel/articles/add','ArticlesController@store');
    Route::get('/admin-panel/articles/{article}/edit','ArticlesController@edit');
    Route::put('/admin-panel/articles/{article}/update','ArticlesController@update');
    Route::get('/admin-panel/articles/{article}/delete','ArticlesController@destroy');
    /**
     * end  Articles  routes

     */
 /**
     * begin  Categories  routes
     */
    Route::get('/admin-panel/categories','CategoriesController@index');
    Route::get('/admin-panel/categories/add','CategoriesController@create');
    Route::post('/admin-panel/categories/add','CategoriesController@store');
    Route::get('/admin-panel/categories/{category}/edit','CategoriesController@edit');
    Route::put('/admin-panel/categories/{category}/update','CategoriesController@update');
    Route::get('/admin-panel/categories/{category}/delete','CategoriesController@destroy');
    /**
     * end  Categories routes
     */
 /**
     * begin  Comments  routes
     */
    Route::get('/admin-panel/comments','CommentsController@index');
    Route::get('/admin-panel/comments/add','CommentsController@create');
    Route::post('/admin-panel/comments/add','CommentsController@store');
    Route::get('/admin-panel/comments/{comment}/edit','CommentsController@edit');
    Route::put('/admin-panel/comments/{comment}/update','CommentsController@update');
    Route::get('/admin-panel/comments/{comment}/delete','CommentsController@destroy');
    /**
     * end  Comments routes
     */

    /**
     * begin  Settings  routes
     */
    Route::get('/admin-panel/settings','SettingsController@index');
    Route::get('/admin-panel/settings/add','SettingsController@create');
    Route::post('/admin-panel/settings/add','RegisterController@create');
    Route::post('/admin-panel/register','SettingsController@store');
    Route::get('/admin-panel/settings/{setting}/edit','SettingsController@edit');
    Route::put('/admin-panel/settings/{setting}/update','SettingsController@update');
    Route::get('/admin-panel/settings/{setting}/delete','SettingsController@destroy');
    /**
     * end  Settings routes
     */


});





route::group(['prefix'=>'admin-panel'],function(){
    Auth::routes();

});





