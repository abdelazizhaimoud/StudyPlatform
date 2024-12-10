<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //
    public function dashboard(Request $request) {

        $email = $request -> session()->get('email');
        $name = $request -> session()->get('name');
        $profile_picture = $request -> session()->get('profile_picture');

        return view('dashboard',compact('email','name','profile_picture'));
    }
}
