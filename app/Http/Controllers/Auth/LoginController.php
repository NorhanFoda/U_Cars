<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Validator;
use Auth;
use Lang;

class LoginController extends Controller
{

    public function show_login(){
        return view('auth.login');
    }
    public function login(Request $request){

        $input = $request->all();
        $rules = [
            'email'     => 'required|email',
            'password'  => 'required'
        ];
        $validation = Validator::make($input, $rules);
        if($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $credentials =  [
            'email'     => $input['email'],
            'password'  => $input['password'],
        ];

        $remember = $request->has('remember');

        if(Auth::attempt($credentials, $remember)){
            return redirect()->intended('public/services');
        }else{
            session()->put('error',Lang::get('main.wrong_login'));
            return redirect()->back()->withInput();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
