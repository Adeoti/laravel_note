<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Signup Form
    public function registerForm(){
        return view('auth.register');
    }

    //Login Form
    public function loginForm(){
        return view('auth.login');
    }

    //Process Login
    public function login(Request $request){
        $userFields = $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if(auth() -> attempt($userFields)){
            $request -> session() -> regenerateToken();

            return redirect('/') -> with('message', 'You\'ve been logged in');
        }

        return back() -> withErrors(['email' => 'Invalid login credentials']) -> onlyInput('email');

    }

    //Sign up the user
    public function signup(Request $request){
        $userFields = $request -> validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'name' => 'required|max:200',
            'password' => 'required|min:6|confirmed'
        ]);


        $userFields['password'] = bcrypt($userFields['password']);

        $user = User::create($userFields);
        auth() -> login($user);
        return redirect('/') -> with('message', 'Your account has been created successfully.');

    }

    public function logout(Request $request){
        auth() -> logout();
            $request -> session() -> invalidate();
            $request -> session() -> regenerateToken();
        return redirect('/') -> with('message', 'You\'ve been logged out');

    }
}
