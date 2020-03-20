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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', 'Auth\LoginController@loginview');
Route::get('/login_redirect', [ 'as' => 'login', 'uses' => 'Auth\LoginController@redirect']);
Route::get('/callback', 'Auth\LoginController@callback');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/login-error', 'Auth\LoginController@loginerror');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index');
	Route::get('viewindactclient/{id}', 'HomeController@getIndActiveClient');
	Route::resource('/resource', 'ResourceController');
	Route::get('/viewresource', 'ResourceController@show');
	Route::get('/resourceedit/{id}','ResourceController@editpage');
	Route::get('/resourcedelete/{id}','ResourceController@destroy');
	Route::resource('/client', 'ClientController');
	Route::get('/viewclient', 'ClientController@show');
	Route::get('/clientedit/{id}','ClientController@edit');
	Route::get('/clientdelete/{id}','ClientController@destroy');
	Route::resource('/account', 'AccountController');
	Route::get('/viewaccountant', 'AccountController@show');
	Route::get('/accountantedit/{id}','AccountController@edit');
	Route::get('/accountantdelete/{id}','AccountController@destroy');
	Route::resource('/technology', 'TechnologyController');
	Route::get('/viewtechnology', 'TechnologyController@show');
	Route::get('/technologyedit/{id}','TechnologyController@edit');
	Route::get('/technologydelete/{id}','TechnologyController@destroy');
	Route::resource('/interview', 'InterviewController');
	Route::get('/viewInterview', 'InterviewController@show');
	Route::get('/viewdetail/{id}', 'InterviewController@view');
	Route::get('/editinterview/{id}', 'InterviewController@edit');
	Route::resource('/joining', 'JoiningController');
	Route::get('/editjoining/{id}', 'JoiningController@editpage');
	Route::get('/viewjoinings', 'JoiningController@show');

	Route::resource('/nonjoining', 'NonJoiningController');
	Route::get('/viewnonjoinings', 'NonJoiningController@show')->name('nonjoining');
	Route::GET('/editnonjoining/{id}','NonJoiningController@editPage');

	Route::post('/getclientname','NonJoiningController@getclientname');
	Route::post('/sendinterviewdata','InterviewController@getdata');
	Route::post('/getclientdetails','InterviewController@getclientdetails');
	Route::post('/getresourcedetails','JoiningController@getresourcedetails');
	Route::post('/stores','InterviewController@stores');
	Route::post('/sendjoiningdata','JoiningController@sendjoiningdata');
	Route::post('/sendnonjoiningdata','NonJoiningController@sendnonjoiningdata');
	Route::resource('/setting', 'SettingsController');
	Route::get('/viewjsettings', 'SettingsController@show');
	Route::get('/getdata/{id}', 'SettingsController@getdata');
	Route::get('/settingedit/{id}','SettingsController@edit');

	Route::resource('/invoice', 'InvoiceController');
	Route::post('/update-status', 'InvoiceController@updateStatus')->name('update-status');
	Route::post('/update-client-status', 'InvoiceController@updateClientStatus')->name('update-client-status');

	Route::post('/add-notes', 'NoteController@add')->name('add-note');
	Route::post('/update-notes', 'NoteController@update')->name('update-note');
	Route::post('/delete-notes', 'NoteController@delete')->name('delete-note');
	Route::post('/resource-filter', 'HomeController@resourceReport')->name('resource-filter');

	Route::post('/add-setting', 'SettingsController@addlogin')->name('add-setting');
	Route::post('/update-setting', 'SettingsController@updateLogin')->name('update-setting');
	Route::post('/delete-setting', 'SettingsController@deleteLogin')->name('delete-setting');
});
