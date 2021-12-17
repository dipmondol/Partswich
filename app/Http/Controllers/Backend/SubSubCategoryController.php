<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category;
use Toastr;

class SubSubCategoryController extends Controller
{
    //
    public function SubSubCategoryView(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sub_sub_category = SubSubCategory::latest()->get();
        return view('backend.subsubcategory.subsubCategoryView',compact('sub_sub_category','categories'));

    }

    public function GetSubCategory($category_id){

        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);

    }
    public function SubSubCategoryStore(Request $req){
        $req->validate([


            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_hin' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',

        ],[
            'subsubcategory_name_en.required' => 'Input Sub category name should be English',
            'subsubcategory_name_hin.required' => 'Input Sub category name should be Hindi',
            'category_id' => 'Please Select Category',
            'subcategory_id' => 'Please Select Sub Category',

        ]);



        SubSubCategory::insert([

                'subsubcategory_name_en' => $req->subsubcategory_name_en,
                'subsubcategory_name_hin' => $req->subsubcategory_name_hin,
                'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$req->subsubcategory_name_en)),
                'subsubcategory_slug_hin' => str_replace(' ', '-',$req->subsubcategory_name_hin),
                'category_id' => $req->category_id,
                'subcategory_id' => $req->subcategory_id,

        ]);


        Toastr::success('Sub SubCategory Inserted Successfully', 'Success', ["positionClass" => "toast-top-right", "closeButton"=>"true"]);
        return redirect()->back();
    }

    public function SubSubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subsubcategories = SubSubCategory::findOrFail($id);

        return view('backend.subsubcategory.subsubcategoryEdit',compact('categories', 'subcategories', 'subsubcategories'));

    }
    public function SubSubCategoryUpdate(Request $req){

        $subsubcategory_id = $req->id;
        SubSubCategory::findOrFail($subsubcategory_id)->update([

            'subsubcategory_name_en' => $req->subsubcategory_name_en,
            'subsubcategory_name_hin' => $req->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-',$req->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ', '-',$req->subsubcategory_name_hin),
            'category_id' => $req->category_id,
            'subcategory_id' => $req->subcategory_id,

    ]);


    Toastr::success('Sub SubCategory Updated Successfully', 'Success', ["positionClass" => "toast-top-right", "closeButton"=>"true"]);
    return redirect()->route('all.subsubcategory');

    }
    public function SubSubCategoryDelete($id){
        SubSubCategory::findOrFail($id)->delete();
        Toastr::error('Sub SubCategory Deleted Successfully', 'Delete', ["positionClass" => "toast-top-right", "closeButton"=>"true"]);
    return redirect()->back();

    }
}
