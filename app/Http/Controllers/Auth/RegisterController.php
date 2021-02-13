<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Index function
     */
    public function index(){
        return view('auth.register');
    }

    /**
     * Adding new user to database
     */
    public function store(Request $request){
      $this->validate($request,[
          'name'=>'required|max:255',
          'username'=>'required|max:255',
          'email'=>'required|max:255|email',
          'password'=>'required|confirmed'
      ]);
      
      dd('store');
    }
}
