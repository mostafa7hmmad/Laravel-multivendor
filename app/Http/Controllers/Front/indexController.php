<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index(){
$data['cats']=Cat::select('id','name','img')->get();

return view('Pages.index')->with($data);
    }
}
