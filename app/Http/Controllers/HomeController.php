<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function deleteData($id){
        $user = new User();
        $data = $user->find($id);
        $data->delete();
        Session::flash('delete-success','Record Deleted Successfully.');
        return redirect('/home');
    }

    public function editData($id, Request $request){   
    //dd($request->all());
    $user = new User();
    $data = $user->where('id', $id)->update(['name'=>$request->name, 'email'=>$request->email,'mobile'=>$request->mobile, 'password'=>$request->password]);
    //DB::table('users')->where('id', $id)->update(['name'=>$request->name, 'email'=>$request->email,'mobile'=>$request->mobile, 'password'=>$request->password]);
    //
    //$data = User::find($id);
    $data->name =$request->name;
    $data->email =$request->email;
    $data->mobile =$request->mobile;
    $data->name =$request->name;
    $data->save();
    Session::flash('admin-success','User Bolcked Successfully.');
    return redirect('/home');
    Session::flash('update_success','Details Updated Successfully.');
    return redirect('/home');
  }
  
    public  function showmanageForm(){
      
      return view('auth.manageprofile');
    }

    public  function savemanageForm(Request $request){

      //dd($request->all());
      //$user = $request->user();
      
      /*$data = auth()->user();
      dd($data['id']);*/
      $this-> validate($request,[
            'name' => 'required|string|max:255',
            'mobile' => 'required|digits:10|numeric',
         ]);
       
      $data = User::find(Auth::User()->id);
      

      $data->name = $request->get('name');
      $data->mobile = $request->get('mobile');
      $data->save();
      Session::flash('admin-success','Details Updated Successfully.');
      return redirect('/home');
    }


    public  function showChangePasswordForm(){

      return view('auth.changepassword');
    }

    public  function changePassword(Request $request){
    

     if (!(Hash::check($request->get('current-password'), Auth::User()->password))) {
          // The passwords matches
          return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
      }
      if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
          //Current password and new password are same
          return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
      }

      $validatedData = $request->validate([
          'current-password' => 'required',
          'new-password' => 'required|string|min:6|confirmed',
      ]);

      //Change Password
      $user = Auth::user();
      $user->password = bcrypt($request->get('new-password'));
      $user->save();

      return redirect()->back()->with("success","Password changed successfully !");
       
    }
}
