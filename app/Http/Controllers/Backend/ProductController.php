<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use Illuminate\Http\Request;
use Toastr;


class ProductController extends Controller
{
    //
    public function AddProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();

        return view('backend.product.addProduct', compact('categories', 'brands'));

    }

}
