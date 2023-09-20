<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\AshaMoni;
use App\Models\BrandModel;
use App\Models\catagory;
use App\Models\Gallery;
use App\Models\Porno;
use App\Models\produ;
use App\Models\Product;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    function product(){
        $catagories=catagory::all();
        $sub_catagories=AshaMoni::all();
        $brands=BrandModel::all();

        return view('product.product',[
            'catagories'=>$catagories,
            'sub_catagories'=>$sub_catagories,
            'brands'=>$brands,
        ]);
    }
    function getProduct(Request $request){
        $str='<option value="">select sub catagory</option>';
        $subcatagories=AshaMoni::where('catagory_id',$request->catagory_id)->get();
        foreach($subcatagories as $subcatag){
            $str.='<option value="'.$subcatag->id.'">'.$subcatag->subcatagory_name.'</option>';
        }
        echo $str;

    }
    function product_stored(Request $request){
        $after_implode=implode(',',$request->tags);
        $img=$request->preview;
        $extension=$img->extension();
       $file_name=Str::lower(str_replace(' ','-',$request->product_name)).'-'.random_int(100000,900000).'.'.$extension;
        Image::make($img)->save(public_path('uploads/product/'.$file_name));




        $request->validate([
            'catagory'=>'required',
            'subcatagory_id'=>'required',

            'product_name'=>'required',
            'product_price'=>'required',

            'long_desp'=>'required',

            'preview'=>'required',
            'gallery'=>'required',


        ]);



        $id_all=Porno::insert([
            'catagory'=>$request->catagory,
            'subcatagory_id'=>$request->subcatagory_id,
            'brand_id'=>$request->brand_id,
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'discount'=>$request->discount,
             'after_discount'=>$request->product_price - ($request->product_price*$request->discount/100),
             'tags'=>$after_implode,
             'short_desp'=>$request->short_desp,
             'long_desp'=>$request->long_desp,
             'add_desp'=>$request->add_desp,
            'preview'=>$file_name,
            'slug'=>Str::lower(str_replace(' ','-',$request->product_name)).'-'.random_int(100000,900000),




        ]);
        $gallery=$request->gallery;

        foreach($gallery as $gal){
            $extension=$gal->extension();
            $file_name=Str::lower(str_replace(' ','-',$request->product_name)).'-'.random_int(100000,900000).'.'.$extension;
        Image::make($gal)->save(public_path('uploads/gallery/'.$file_name));
        Gallery::insert([
            'product_id'=>$id_all,
            'gallery'=>$file_name,
        ]);


        }





    }
    function product_list(){
        $prod=Porno::all();
        return view('product_list.product',[

            'prod'=>$prod,
        ]);
    }
    function product_delete($id){
        $product=Porno::find($id);
        $gallery=Gallery::where('product_id',$id)->get();
        $preview=public_path('uploads/product/'.$product->preview);
        unlink($preview);
        foreach($gallery as $gal){
            $gal_img=public_path('uploads/gallery/'.$gal->gallery);
            unlink($gal_img);
            Gallery::find($gal->id)->delete();

        }
        Porno::find($id)->delete();
    }
    function product_show($id){
        return view('product_list.pro');
    }














}


