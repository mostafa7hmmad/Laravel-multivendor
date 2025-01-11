<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Admincontroller extends Controller
{
    public function login(){


return view('Dashboard.login');
    }


public function dologin(Request $request)
{
    $data = $request->validate([
        'email' => 'required|email|max:191',
        'password' => 'required|string',
    ]);

    // Attempt to login as admin
    if (auth('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
        return redirect(route('dashboard-us'));
    }

    // Attempt to login as user
    elseif (auth('customer')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
        return redirect(route('Dasboard-customer-us'));
    }

    // If login fails
    else {
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
}


    public function logout()
    {
        auth('admin')->logout();
        return redirect(route('login-us'));
    }


}
