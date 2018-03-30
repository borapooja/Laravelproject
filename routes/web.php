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



Auth::routes();

Route::group(['middleware' => ['web','auth']],function(){
	Route::get('/', function () {
	  return view('welcome');
	});

 Route::get('/home',function(){
		if(Auth::user()->admin == 0){
		 return view('home');
		} else {
		//Route::get('/home','AdminController@index');
		$users['users']= \App\User:: all();
		if($users['users']){
		return view('adminhome',$users);	
		 } else {
		  	return view('adminhome');	
		   }
		 }
		}); 


Route::get('/manage-detail','HomeController@showmanageForm');
Route::post('/manage-detail','HomeController@savemanageForm');
Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
Route::group(['middleware' => 'App\Http\Middleware\IsAdmin'], function()
	{
Route::any('/register-data','AdminController@registerData');
Route::get('/register-user','AdminController@registerUser');
Route::any('/update-data/{id}','AdminController@updateData');
Route::get('/edit-user/{id}','AdminController@editForm');
Route::post('/register-data/{id}','AdminController@updateForm');
Route::get('/block-user/{id}','AdminController@blockUser');
Route::get('/unblock-user/{id}','AdminController@unblockUser');
Route::get('/delete_data/{id}','HomeController@deleteData');
Route::get('/edit_data/{id}','HomeController@editData');
});
 });


/*Route::group(['middleware' => 'App\Http\Middleware\IsAdmin'], function()
	{*/
