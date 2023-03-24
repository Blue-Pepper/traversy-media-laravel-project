<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PDO;

class UserController extends Controller
{
    //register
    public function create(){
        return view('users.register');
    }

    public function store(){
        $formFields = request()->validate(
            [
                'name' => ['required', 'min:3'],
                'email' => ['required', Rule::unique('users', 'email'), 'email'],
                'password' => ['required', 'confirmed', 'min:6'],
        ]);
        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
        //create user
        $user = User::create($formFields);

        //Login
        auth()->login($user);
        return redirect('/')->with('message', 'User created and logged in!');
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out!');
    }

    //show login form
    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message','You are now logged in');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
