<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class AdminController extends Controller
{
  /*function index(){
  	$users = null;
  	//$users['users']= User:: all();
  	return view('adminhome');
  }*/

		function registerUser(){

		  return view('layouts.register_user');
    }

		public function editForm($id){
			
			$data = User::find($id);
			$data->first();
		  return view('layouts.edit_user')->with('data', $data);

		}
		
    public function updateData(Request $request ){
    	
    	$this-> validate($request,[
          	'name' => 'required|string|max:255',
            'mobile' => 'required|digits:10|numeric',
            
            
        ]);
    	$data = User::find($request->id);
		//dd($data['id']);
			$data->name = $request->name;
			$data->mobile = $request->mobile;
			$data->save();
			Session::flash('admin-success','Details Updated Successfully.');
      return redirect('/home');

    }

		public function registerData(Request $request)
		{
			//dd($request->all());
          $this-> validate($request,[
          	'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|digits:10|numeric',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required',
        ]);
          //$data = $request->all();
          /*print_r($data);die;
          User ::create($data);*/
			$user          = new User();
			$user->name    = $request->name;
			$user->email   = $request->email;
			$user->mobile  = $request->mobile;
      $user->admin   = $request->role;
			$user->password = bcrypt($request->password);
			//$user->admin   = 0;
			$user->remember_token = str_random(100);

    $user->save();
    Session::flash('admin-success','Details Added Successfully.');
      return redirect('/home');

		}
  
  public function blockUser($id){

  	$data = User::find($id);
		$data->active = 1;
		$data->save();
		Session::flash('admin-success','User Bolcked Successfully.');
		return redirect('/home');
  }

  public function unblockUser($id)
  {
  	$user = User::find($id);
		$user->active = 0;
		$user->save();
		Session::flash('admin-success','User Unbolcked Successfully.');
		return redirect('/home');
  }
}
