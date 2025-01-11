<?php

namespace App\Http\Controllers\Dashboard\Customer;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Customer;
use App\Models\Cat;
use App\Models\Customer as ModelsCustomer;
use App\Models\Subcat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Customercontroller extends Controller
{
    public function cats()  {


$data['cats']=Cat::all();
        return view('Dasboard_Customer.Cats.cat')->with($data);
    }
    public function customers()  {


$data['customers']=ModelsCustomer::all();
        return view('Dasboard_Customer.customers.customers')->with($data);
    }
    public function subcats()  {


$data['subcat']=Subcat::all();
        return view('Dasboard_Customer.Subcat.subcat')->with($data);
    }
    public function Dasboard(){


        return view('Dasboard_Customer.dashboard');
    }
    public function customer()  {

        return view('Dashboard.Customer.signup');
    }
    public function store(Request $request)  {
        $data=$request->validate([
            'email' => 'required|email|max:191|unique:customers,email',
            'password' => 'required|string|min:8',
            'username' => 'required|string',
            'phone' => 'required|string',
        ], [
            'email.unique' => 'The email has already been taken.'
        ]);
    $data['password'] = Hash::make($data['password']);
ModelsCustomer::create($data);

return redirect(route('Dasboard-customer-us'))->with('message', 'Customer Created successfully');


    }



}
