<?php

namespace App\Http\Controllers\Dashboard\Cat;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Catcontroller extends Controller
{
    public function cat(){
        $data['count']=Cat::count();
        $data['cats']=Cat::all();
return view('Dashboard.Cats.cat')->with($data);
    }

    public function catcreat(){


return view('Dashboard.Cats.catcreate');
    }

    public function catstore(Request $request){
        $data=$request->validate([
            'name'=>'required|string|max:255',
            'img' =>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
          if ($request->has('img')) {
            $file= $request->file('img') ;
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $puth='uploades/cat';
            $file->move($puth,$filename);
            $data['img']=$filename;
        }

        Cat::create([
            'name'=> $request->name,
            'img'=> $data['img'],
        ]);


return redirect()->route('cat-us');
    }

    public function delete($id)
{
    $data=Cat::findOrFail($id);
    $imgae_path= 'uploades/cat/'.$data->img;
    if(File::exists($imgae_path)){
File::delete($imgae_path);
    }

    $data->delete();

    return redirect(route('cat-us'));
}

public function edit($id){
    $data['cat']=Cat::findOrFail($id);
    return view('Dashboard.Cats.update')->with($data);
}


public function update(Request $request ,$id){
    $request->validate([
          'name'=>'required|string|max:255',
          'img' =>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);



      $cat= Cat::findOrFail($id);
      $cat->update($request->except('img'));
 if ($request->hasFile('img')) {
     $destination= 'uploades/cat/'.$cat->img;
     if(File::exists($destination)){
         File::delete($destination);
     }
     $file=$request->file('img');
     $ext=$file->getClientOriginalExtension();
     $filename= time().'.'.$ext;
     $file->move('uploades/cat/',$filename);
     $cat->update(['img'=>$filename]);
 }



      return redirect(route('cat-us'));

  }



}
