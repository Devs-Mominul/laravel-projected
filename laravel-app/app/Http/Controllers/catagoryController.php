<?php

namespace App\Http\Controllers;
use App\Models\catagory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class catagoryController extends Controller
{
    function catagory_upload(){
        $catagories=catagory::all();
        return view('catagory.catagory',[
            'catagories'=>$catagories,

        ]);
    }
    function catagory_store(Request $request){
        $request->validate([
            'catagory_name'=>'required',
            'catagory_image'=>'required',
        ]);
        $img=$request->catagory_image;
        $extension=$img->extension();
       $file_name=Str::lower(str_replace(' ','-',$request->catagory_name)).'-'.random_int(100000,900000).'.'.$extension;
        Image::make($img)->save(public_path('uploads/catagory/'.$file_name));
        catagory::create([
            'catagory_name'=>$request->catagory_name,
            'catagory_image'=>$file_name,
            'updated_at'=>Carbon::now(),
        ]);

    }
    function catagory_update_store($catagory_id){
        $catagory_info=catagory::find($catagory_id);
       return view('catagory.edit',[
        'catagory_info'=>$catagory_info,
       ]);

    }
   function  catagory_update_store_update(Request $request){
    $catagory=catagory::find($request->catagory_id);
    if($request->catagory_image==null){
        catagory::find($request->catagory_id)->update([
            'catagory_name'=>$request->catagory_name,
            'updated_at'=>Carbon::now()
        ]);

        return redirect()->route('catagory.find');
    }
    else{
        $current_img=public_path('uploads/catagory/'.$catagory->catagory_image);
        unlink($current_img);

        $img=$request->catagory_image;
        $extension=$img->extension();
        $file_name=Auth::id().'.'.$extension;
        $image=Image::make($img)->resize(300,200)->save(public_path('uploads/catagory/'.$file_name));
        catagory::find($request->catagory_id)->update([
            'catagory_name'=>$request->catagory_name,
            'catagory_image'=>$request->$file_name,
            'updated_at'=>Carbon::now()
        ]);

    }


   }
   function  catagory_update_store_update_delete($delete_id){
    catagory::find($delete_id)->delete();

   }
   function trushed(){
    $trushed_catagory=catagory::onlyTrashed()->get();

    return view('catagory.trushed',[
        'trushed_catagory'=>$trushed_catagory,
    ]);
   }
   function restore($restore_id){
    catagory::onlyTrashed()->find($restore_id)->restore();
   }
   function hardDelete($hard_id){
     $babi= catagory::onlyTrashed()->find($hard_id);
    $imgs=public_path('uploads/catagory/'.$babi->catagory_image);
    unlink($imgs);
    catagory::onlyTrashed()->find($hard_id)->forceDelete();
   }
   function deletecheak(Request $request){
    foreach($request->catagory_id as $catagory){
        catagory::find($catagory)->delete();
    }
    return back();

   }
   function trushall(Request $request){
    foreach($request->catagory_id as $catagory){
        catagory::onlyTrashed()->find($catagory)->restore();
    }
   }

}
