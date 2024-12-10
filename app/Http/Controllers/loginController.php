<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function signup(){
        return view('signup');
    }
    
    public function register(Request $request){
        $form_register =$request->validate([
            'username' => 'required|string|max:50|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:10',
            'password' => 'required|min:8|confirmed',
            'address' => 'required|string|max:255',
            'sexe' => 'required|in:male,female',
            'phone_number' => 'required|digits_between:10,15|unique:users,phone_number',
            'role_id' => 'required|in:1,2',
            'bio' => 'required|string|max:500',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $form_register['password'] = Hash::make($request->password);
        $form_register['profile_picture'] = $request->file('profile_picture')->store('profile','public');
        User::create($form_register);
        return redirect()->route('login');
    }
    public function signin(Request $request){
        $email = $request->email ;
        $password  = $request->password ;
        $informations = ['email' => $email , 'password' => $password];
        if(Auth::attempt($informations)){

            $user = Auth::user();

            // Pass user details to the dashboard
            session([
                'name' => $user->name,
                'email' => $user->email,
                'profile_picture' => $user->profile_picture,
            ]);
            
            return to_route('dashboard');
        }
        else{
          return redirect()->back()->with('error', 'Invalid email or password. Please try again.');
        }
    }
    
}
