<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //
    public function dashboard(Request $request) {

        $email = $request -> session()->get('email');
        $first_name = $request -> session()->get('first_name');
        $last_name = $request -> session()->get('last_name');
        $profile_picture = $request -> session()->get('profile_picture');
        if($email == null){
            return redirect(route('login'));
        }
        else{
            return view('dashboard',compact('email','first_name','last_name','profile_picture'));
        }
    }
}
