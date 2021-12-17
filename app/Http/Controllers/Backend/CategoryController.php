<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;
use Toastr;

class CategoryController extends Controller
{
    //
    public function CategoryView(){
        $category = Category::latest()->get();
        return view('backend.category.categoryView',compact('category'));

    }
    public function CategoryStore(Request $req){
        $req->validate([
            'category_name_en' => 'required',
            'category_name_hin' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name_en.required' => 'Input category name should be English',
            'category_name_hin.required' => 'Input category name should be Hindi',

        ]);



        Category::insert([
                'category_name_en' => $req->category_name_en,
                'category_name_hin' => $req->category_name_hin,
                'category_slug_en' => strtolower(str_replace(' ', '-',$req->category_name_en)),
                'category_slug_hin' => str_replace(' ', '-',$req->category_name_hin),
                'category_icon' => $req->category_icon,
        ]);


        Toastr::success('Category Inserted Successfully', 'Success', ["positionClass" => "toast-top-right", "closeButton"=>"true"]);
        return redirect()->back();

    }

    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.categoryEdit',compact('category'));
    }

    public function CategoryUpdate(Request $req){

        $cat_id = $req->id;
        Category::findOrFail($cat_id)->update([
            'category_name_en' => $req->category_name_en,
            'category_name_hin' => $req->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ', '-',$req->category_name_en)),
            'category_slug_hin' => str_replace(' ', '-',$req->category_name_hin),
            'category_icon' => $req->category_icon,
    ]);


    Toastr::success('Category Updated Successfully', 'Success', ["positionClass" => "toast-top-right", "closeButton"=>"true"]);
    return redirect()->route('all.category');


    }

    public function CategoryDelete($id){





            Category::findOrFail($id)->delete();
            Toastr::error('Brand Deleted Successfully', 'Delete', ["positionClass" => "toast-top-right", "closeButton"=>"true"]);

            return redirect()->back();

    }


}
