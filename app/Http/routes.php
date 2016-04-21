<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
Route::get('/', function(){
    return view("auth.login");
});
Route::get('/home', 'HomeController@index');
Route::get('/profile/view/{id}', 'HomeController@view_profile');
Route::get('/profile/delete/{id}', 'HomeController@delete_profile');
Route::get('/add-company', 'HomeController@add_company');
Route::get('/add-team', 'HomeController@add_team');
Route::get('/add-project', 'HomeController@add_project');
Route::get('/users-list', 'HomeController@users_list');
