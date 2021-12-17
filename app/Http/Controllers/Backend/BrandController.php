<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;
use Toastr;

class BrandController extends Controller
{
    //
    public function BrandView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brandView',compact('brands'));
    }

    public function BrandStore(Request $req){
        $req->validate([
            'brand_name_en' => 'required',
            'brand_name_hin' => 'required',
            'brand_image' => 'required',
        ],[
            'brand_name_en.required' => 'Input brand name should be English',
            'brand_name_hin.required' => 'Input brand name should be Hindi',

        ]);

        $image = $req->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brand::insert([
                'brand_name_en' => $req->brand_name_en,
                'brand_name_hin' => $req->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace(' ', '-',$req->brand_name_en)),
                'brand_slug_hin' => str_replace(' ', '-',$req->brand_name_hin),
                'brand_image' => $save_url,
        ]);


        Toastr::success('Brand Inserted Successfully', 'Success', ["positionClass" => "toast-top-right", "closeButton"=>"true"]);
        return redirect()->back();
    }

    public function BrandEdit($id){

        $brand = Brand::findOrFail($id);
        return view('backend.brand.brandEdit',compact('brand'));

    }

    public function BrandUpdate(Request $req){
        $brand_id = $req->id;
        $old_img = $req->old_image;

        if($req->file('brand_image')){
            unlink($old_img);

            $image = $req->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;

            Brand::findOrFail($brand_id)->update([
                    'brand_name_en' => $req->brand_name_en,
                    'brand_name_hin' => $req->brand_name_hin,
                    'brand_slug_en' => strtolower(str_replace(' ', '-',$req->brand_name_en)),
                    'brand_slug_hin' => str_replace(' ', '-',$req->brand_name_hin),
                    'brand_image' => $save_url,
            ]);
            Toastr::success('Brand Updated Successfully', 'Success', ["positionClass" => "toast-top-right", "closeButton"=>"true"]);
            return redirect()->route('all.brand');

        }else{

            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $req->brand_name_en,
                'brand_name_hin' => $req->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace(' ', '-',$req->brand_name_en)),
                'brand_slug_hin' => str_replace(' ', '-',$req->brand_name_hin),

        ]);
        Toastr::success('Brand Updated Successfully', 'Success', ["positionClass" => "toast-top-right", "closeButton"=>"true"]);
        return redirect()->route('all.brand');


        }
    }

    public function BrandDelete($id){
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();
        Toastr::error('Brand Deleted Successfully', 'Delete', ["positionClass" => "toast-top-right", "closeButton"=>"true"]);

        return redirect()->back();



    }
}

