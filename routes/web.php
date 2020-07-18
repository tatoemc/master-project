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


Route::get('/', function () {
    return view('welcome');
}); 

Route::get('/register2', function () {
    return view('table');
});

Route::get('index','PagesController@home');
Route::get('contact','PagesController@contact');
Route::get('about','PagesController@about');
//comment 

Auth::routes();
 
 


Route::get('/download/{file}', 'LatterController@download');

Route::get('/changePassword','UserController@showChangePasswordForm')->name('changePassword');
Route::post('/changePassword','UserController@changePassword')->name('changePassword');


Route::resource('users','UserController');
Route::get('sponsor','UserController@sponsor');
Route::get('guardian','UserController@guardian');
Route::get('supervisor','UserController@supervisor'); 
Route::get('user-Reports','ReportConttroller@usereport');

Route::resource('orphans','OrphanController');
Route::get('sponsered','OrphanController@sponsered');
Route::get('notsponsered','OrphanController@notsponsered'); 
Route::get('create2','OrphanController@createemp');

Route::resource('sponserforms','SponserformController');

Route::post('comments/{latter_id}', ['as' => 'comments.store', 'uses'=>'CommentController@store']);

Route::get('home','HomeController@index');
Route::get('logout','Auth\LoginController@userLogout')->name('user.logout');

