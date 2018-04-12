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
Route::get('/', function () {
	  return view('welcome');
	});


Route::group(['middleware' => ['web','auth']],function(){
	

 Route::get('/home',function(){
		if(Auth::user()->admin == 0){
		 return view('home');
		} else {
		//Route::get('/home','AdminController@index');
		/*$users['users']= \App\User:: all();*/
		//for display only users not admin
		//$users['users']= \App\User:: where('admin',0)->paginate(6);
		$users['users']= \App\User:: paginate(6);
		
		if($users['users']){
		//return view('adminhome',$users);
		return view('admin.dashboard');
			
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
		Route::get('/ui-elements.html', function () {
	$users['users']= \App\User:: paginate(6);
	//return view('admin.ui-elements');
	  return view('adminhome',$users);
	});
		Route::get('/index.html', function () {
	
	//return view('admin.ui-elements');
	  return view('admin.dashboard');
	});

Route::any('/register-data','AdminController@registerData');
Route::get('/register-user','AdminController@registerUser');
Route::any('/update-data/{id}','AdminController@updateData');
Route::get('/edit-user/{id}','AdminController@editForm');
Route::post('/register-data/{id}','AdminController@updateForm');
Route::get('/block-user/{id}','AdminController@blockUser');
Route::get('/unblock-user/{id}','AdminController@unblockUser');
Route::get('/delete_data/{id}','HomeController@deleteData');
Route::get('/edit_data/{id}','HomeController@editData');
Route::any('/display-dashboard','HomeController@displayData');
});
 });


/*Route::group(['middleware' => 'App\Http\Middleware\IsAdmin'], function()
	{*/
