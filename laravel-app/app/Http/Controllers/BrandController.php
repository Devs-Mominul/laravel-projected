<?php

namespace App\Http\Controllers;

use App\Models\BrandModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    function BrandPreview(){
        $catagories=BrandModel::all();

        return view('Brand.brand',[
            'catagories'=>$catagories,
        ]);
    }
    function BrandPreview_post(Request $request){
        $request->validate([
            'brand_name'=>'required',
            'brand_logo'=>'required|image',

        ]);
        $logo=$request->brand_logo;
        $extension=$logo->extension();
        $file_name=Str::lower(str_replace('','-',$request->brand_name)).'-'.random_int(100000,900000).'.'.$extension;
        Image::make($logo)->save(public_path('uploads/brand/'.$file_name));
        BrandModel::insert([
            'brand_name'=>$request->brand_name,
            'brand_logo'=>$file_name,
        ]);


    }
    function BrandPreview_post_update(){
        $brand=BrandModel::all();
        return view('Brand.brand_update',[
            'brand'=>$brand,
        ]);
    }
    function BrandPreview_post_update_post(Request $request,$id){
        $brand=BrandModel::find($id);
        $request->validate([
            'brand_name'=>'required',
        ]);
        if($brand->brand_logo==''){
            BrandModel::find($id)->update([
                'brand_name'=>$request->brand_name,
            ]);
        }
        else{
            $request->validate([
                'brand_logo'=>'required|image',
            ]);
            $current=public_path('uploads/brand/'.$brand->brand_logo);
            unlink($current);
            $logo=$request->brand_logo;
            $extension=$logo->extension();
            $file_name=Str::lower(str_replace('','-',$request->brand_name)).'-'.random_int(100000,900000).'.'.$extension;
            Image::make($logo)->save(public_path('uploads/brand/'.$file_name));
            BrandModel::find($id)->update([
                'brand_name'=>$request->brand_name,
                'brand_logo'=>$file_name,
            ]);

        }

    }
    function BrandPreview_post_update_delete($id){
        BrandModel::find($id)->delete();

    }
}


