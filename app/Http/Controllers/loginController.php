<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login(Request $request){
        if($request->session()->has('email')){
            return redirect('/dashboard');
        }
        else{
            return view('login');
        }
    }
    public function signup(Request $request){
        if($request->session()->has('email')){
            return redirect('/dashboard');
        }
        else{
            return view('signup');
        }
    }
    
    public function register(Request $request){
        $form_register =$request->validate([
            'username' => 'required|string|max:50|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'age' => 'required|integer|min:10',
            'sexe' => 'required|in:male,female',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|digits_between:10,15|unique:users,phone_number',
            'bio' => 'required|string|max:500',
            'school' => 'required|string|max:100',
            'sector' => 'required|string|max:100',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $form_register['profile_picture'] = $request->file('profile_picture')->store('profile','public');
        User::create($form_register);
        return redirect()->route('login');
    }
    public function signin(Request $request){
        $email = $request->email ;
        $password  = $request->password;
        $informations = ['email' => $email , 'password' => $password];
        if(Auth::attempt($informations)){

            $user = Auth::user();

            // Pass user details to the dashboard
            session([
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'profile_picture' => $user->profile_picture,
            ]);
            // dd('asdf');
            return to_route('dashboard');
        }
        else{
          return redirect()->back()->with('error', 'Invalid email or password. Please try again.');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')
        ->with('preventBack', true)
        ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache')
        ->header('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');
    }
    
}
