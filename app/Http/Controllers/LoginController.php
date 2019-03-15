<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
       if (Auth::check())
       {
            return redirect('/home');
       }
       
       else 
       {
            return view('login.index');   
       }
        
    }

    public function check(Request $request)
    {
        $validated = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
            return redirect('/home');
        else
            return redirect('/')->withInput()->with('status',"The email address that you've entered doesn't match any account. Sign up for an account.")->with('color','danger');
    }

    public function register(Request $request)
    {
        //Form validate
        $validated = $request->validate([
            'first_name' => 'required|max:50',
            'surname' => 'required|max:50',
            'email' => 'email|required|max:30',
            'password' => 'required|max:30|min:8'
        ]);
        
        //Is email unique?
        $is_email_unique = User::where('email', $request->input('email'))->count();

        //if email is not unique
        if($is_email_unique>0)
            return redirect('/')->withInput()->with('status','That email is taken. Try another.')->with('color','warning');

        //Add a new user
        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('surname');
        $user->email = $request->input('email');
        $user->reputation = 0;
        $user->password = Hash::make($request->input('password'));
        $user->save();
        //Automatic login
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
            return redirect('/home')->with('message','Welcome to Socail Network App')->with('color','success');
    }

    //Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('status','Bye..')->with('color','info');
    }

}
