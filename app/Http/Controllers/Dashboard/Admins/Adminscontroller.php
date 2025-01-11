<?php

namespace App\Http\Controllers\Dashboard\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Adminscontroller extends Controller
{
    public function admins(){
        $data['admins']=Admin::all();
        return view('Dashboard.Admins.admin')->with($data);
    }
    public function create(){


        return view('Dashboard.Admins.create');
    }

    public function store(Request $request){
        $data=$request->validate([
            'email' => 'required|email|max:191|unique:admins,email',
            'password' => 'required|string|min:8',
            'username' => 'required|string',
        ], [
            'email.unique' => 'The email has already been taken.'
        ]);
$data['password'] = Hash::make($data['password']);
Admin::create($data);
        return redirect()->route('admin-us');
    }

    public function delete($id)
    {
        $data=Admin::findOrFail($id);
        $data->delete();

        return redirect(route('admin-us'));
    }
}
