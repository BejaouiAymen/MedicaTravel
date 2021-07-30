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


Route::resource('hotel','HotelController');
Route::resource('admin','AdminController');
Route::resource('chirurgien','ChirurgienController');
Route::resource('clinique','CliniqueController');
Route::resource('client','ClientController');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//hotel Controller
Route::get('/list', 'HotelController@index_list');
Route::get('/listDelete', 'HotelController@index_list_delete');
Route::get('/liste', 'HotelController@index_list_req');
Route::get('/list_adv', 'HotelController@index_advanced');
Route::get('/notificationRead/{id}', 'HotelController@read');
Route::get('/notificationlist', 'HotelController@notif_list');

//Administrateur controller
Route::get('/messages/{id}','AdminController@message_index');
Route::post('/send_message/{id}','AdminController@send_message');
Route::get('/administrateur/userlist','AdminController@user_list');

//chirurgiens controlleur
Route::get('/specialite','ChirurgienController@specialite');
Route::post('/specialite_save','ChirurgienController@specialite_save');
Route::get('/chirurgien_delete/{id}','ChirurgienController@destroye');

//cliniques controller
Route::get('/clin/list', 'CliniqueController@index_list');
Route::get('/clin/liste', 'CliniqueController@index_list_req');

//Clients Controller
Route::get('/clien/clinique/{id}', 'ClientController@next_show');
Route::post('/save/{id}', 'ClientController@save');
Route::get('/clien/list', 'ClientController@done_clients');
Route::get('/clien/{id}', 'ClientController@client_info');
Route::get('/client_delete/{id}','ClientController@destroye');
Route::get('/clien_chirurgien/{id}','ClientController@add_chirurgien');
Route::post('/clien_chirurgien_save/{id}','ClientController@save_chirurgien');


Route::get('/home', 'HomeController@index')->name('home');
