<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }
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
      /**
       * Inserting user into database
       */
      User::create([
          'name'=>$request->name,
          'username'=>$request->username,
          'email'=>$request->email,
          'password'=>Hash::make($request->password),
      ]);
      /**
       * Signing in user
       */
      auth()->attempt($request->only('email','password'));
      /**
       * Redirecting after registration
       */
      return redirect()->route('dashboard');

      
    }
}
