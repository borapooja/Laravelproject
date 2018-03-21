<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
  function index(){
  	$users = null;
  	//$users['users']= User:: all();
  	return view('adminhome');
  }
}
