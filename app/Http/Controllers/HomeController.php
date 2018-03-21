<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
    dd($request->all());
    $user = new User();
    $data = $user->where('id', $id)->update(['name'=>$request->name, 'email'=>$request->email,'mobile'=>$request->mobile, 'password'=>$request->password]);
    //DB::table('users')->where('id', $id)->update(['name'=>$request->name, 'email'=>$request->email,'mobile'=>$request->mobile, 'password'=>$request->password]);
    Session::flash('update_success','Details Updated Successfully.');
    return redirect('/home');
  }

    public  function changePassword(){
      view('auth.changepassword');
    }
}
