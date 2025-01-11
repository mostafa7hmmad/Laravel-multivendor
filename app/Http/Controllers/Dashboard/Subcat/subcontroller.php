<?php

namespace App\Http\Controllers\Dashboard\Subcat;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Models\Subcat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class subcontroller extends Controller
{
    public function subcat(){
        $data['subcat']=Subcat::all();
return view('Dashboard.Subcat.Subcat')->with($data);
    }

    public function subcatcreat(){
$data['cat']=Cat::select('id','name')->get();

return view('Dashboard.Subcat.Subcatcreate')->with($data);
    }

    public function subcatstore(Request $request){
        $data=$request->validate([
            'name'=>'required|string|max:255',
            'price'=>'required|string|max:255',
            'cat_id'=>'required|exists:cats,id',
            'img' =>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
          if ($request->has('img')) {
            $file= $request->file('img') ;
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $puth='uploades/subcat';
            $file->move($puth,$filename);
            $data['img']=$filename;
        }

        Subcat::create($data);


return redirect()->route('subcat-Dashboard-us');
    }

    public function subdelete($id)
{
    $data=Subcat::findOrFail($id);
    $imgae_path= 'uploades/subcat/'.$data->img;
    if(File::exists($imgae_path)){
File::delete($imgae_path);
    }

    $data->delete();

    return redirect(route('subcat-Dashboard-us'));
}

public function subedit($id){
    $data['subcat']=Subcat::findOrFail($id);
    $data['cat']=Cat::select('id','name')->get();
    return view('Dashboard.Subcat.Subcatupdate')->with($data);
}


public function subupdate(Request $request ,$id){
    $request->validate([
          'name'=>'required|string|max:255',
            'price'=>'required|string|max:255',
            'cat_id'=>'required|exists:cats,id',
            'img' =>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);



      $cat= Subcat::findOrFail($id);
      $cat->update($request->except('img'));
 if ($request->hasFile('img')) {
     $destination= 'uploades/subcat/'.$cat->img;
     if(File::exists($destination)){
         File::delete($destination);
     }
     $file=$request->file('img');
     $ext=$file->getClientOriginalExtension();
     $filename= time().'.'.$ext;
     $file->move('uploades/subcat/',$filename);
     $cat->update(['img'=>$filename]);
 }



      return redirect(route('subcat-Dashboard-us'));

  }



}
