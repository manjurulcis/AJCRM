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
Route::get('/', function() {
    return view("auth.login");
});
Route::get('/home', 'HomeController@index');
Route::get('/profile/view/{id}', 'HomeController@view_profile');
Route::get('/profile/delete/{id}', 'HomeController@delete_profile');

Route::get('/add-company', 'HomeController@add_company');
Route::post('/save-company', 'HomeController@save_company');
Route::get('/company-list', 'HomeController@company_list');
Route::get('/company/delete/{id}', 'HomeController@delete_company');
Route::get('/company/view/{id}', function($id) {
    if (Request::ajax()) {
        $data = App\addCompany::find($id);
        return Response::json($data);
    }
});
Route::post('/update-company', 'HomeController@update_company');

Route::get('/add-team', 'HomeController@add_team');
Route::post('/save-team', 'HomeController@save_team');
Route::get('/team-list', 'HomeController@team_list');
Route::get('/team/view/{id}', 'HomeController@view_team');
Route::get('/team/edit/{id}', function($id) {
    if (Request::ajax()) {
        $data = App\Team::find($id);
        return Response::json($data);
    }
});
Route::post('/update-team', 'HomeController@update_team');
Route::get('/team/delete/{id}', 'HomeController@delete_team');


Route::get('/add-project', 'HomeController@add_project');
Route::post('/save-project', 'HomeController@save_project');
Route::get('/project-list', 'HomeController@project_list');
Route::get('/project/delete/{id}', 'HomeController@delete_project');


Route::get('/add-client', 'HomeController@add_client');
Route::post('/save-client', 'HomeController@save_client');
Route::get('/client-list', 'HomeController@client_list');
Route::get('/client/delete/{id}', 'HomeController@delete_client');


Route::get('/users-list', 'HomeController@users_list');
