<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function index()
    {
        return view('dashboard.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required'

        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }


        $user = User::where('email', $request->get('email'))->first();


        if (!Hash::check($request->get('password'), $user->password)) {

            return redirect('/')
                ->withErrors('your password is incorrect,please try again');
        }

//        if ($user->role != User::ADMIN) {
//            return redirect('/login');
//        }

        $remember = $request->remember == 'on' ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect('/dashboard');
        } else {
            return redirect('/');
        }

    }


}
