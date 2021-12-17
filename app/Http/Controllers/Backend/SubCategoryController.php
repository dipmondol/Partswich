<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Toastr;

class SubCategoryController extends Controller
{
    //
    public function SubCategoryView(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
    $subCategory = SubCategory::latest()->get();
    return view('backend.subcategory.subcategoryView', compact('subCategory','categories'));

    }
    public function SubCategoryStore(Request $req){

        $req->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required',
            'category_id' => 'required',
        ],[
            'subcategory_name_en.required' => 'Input Sub category name should be English',
            'subcategory_name_hin.required' => 'Input Sub category name should be Hindi',
            'category_id' => 'Please Select Category',

        ]);



        SubCategory::insert([

                'subcategory_name_en' => $req->subcategory_name_en,
                'subcategory_name_hin' => $req->subcategory_name_hin,
                'subcategory_slug_en' => strtolower(str_replace(' ', '-',$req->subcategory_name_en)),
                'subcategory_slug_hin' => str_replace(' ', '-',$req->subcategory_name_hin),
                'category_id' => $req->category_id,

        ]);


        Toastr::success('Category Inserted Successfully', 'Success', ["positionClass" => "toast-top-right", "closeButton"=>"true"]);
        return redirect()->back();
    }

    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.subcategory.subcategoryEdit',compact('subcategory', 'categories'));
    }

    public function SubCategoryUpdate(Request $req){

        $cat_id = $req->id;
        SubCategory::findOrFail($cat_id)->update([
            'category_id' => $req->category_id,
            'subcategory_name_en' => $req->subcategory_name_en,
            'subcategory_name_hin' => $req->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-',$req->subcategory_name_en)),
            'subcategory_slug_hin' => str_replace(' ', '-',$req->subcategory_name_hin),

    ]);


    Toastr::success('Sub Category Updated Successfully', 'Success', ["positionClass" => "toast-top-right", "closeButton"=>"true"]);
    return redirect()->route('all.subcategory');
    }

    public function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();
        Toastr::error('Sub Category Deleted Successfully', 'Delete', ["positionClass" => "toast-top-right", "closeButton"=>"true"]);
        return redirect()->back();
    }
}
