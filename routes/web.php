<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Brand;
use App\Models\Category;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=> 'admin', 'middleware' =>['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'LoginForm']);
    Route::post('/login', [AdminController::class, 'Store'])->name('admin.login');
});
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.adminIndex');
})->name('dashboard');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

//Admin All Routes
Route::get('/admin/logout',[AdminController::class, 'destroy' ])->name('admin.logout');
Route::get('/admin/profile',[AdminProfileController::class, 'AdminProfile' ])->name('admin.profile');

// Admin Info update
Route::get('/admin/profile/edit',[AdminProfileController::class, 'AdminProfileEdit' ])->name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

// Admin Password update
Route::get('/admin/change/password',[AdminProfileController::class, 'AdminChangePassword' ])->name('admin.change.password');
Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');

/////////////////////////////////////////////////////////////////////
// Frontend routes

Route::get('/', [IndexController::class, 'index']);
// User Logout
Route::get('/user/logout',[IndexController::class,'UserLogOut'])->name('user.logout');
// User Profile Update
Route::get('/user/profile-update', [IndexController::class, 'UserProfileUpdate'])->name('user.profile.update');
// User profile store
Route::post('/user/profile-store',[IndexController::class, 'UserProfileStore'])->name('user.profile.store');

// User Change Password
Route::get( '/user/change-password',[IndexController::class,'UserChangePassword'])->name('change.password');
// User Password update
Route::post('/user/password-update',[IndexController::class, "UserPasswordUpdate"])->name('user.password.update');


///////////////////////////////////////
//Admin All Brand Routes
///////////////////////////////////////


Route::prefix('brand')->group(function(){
    Route::get('/view',[BrandController::class,'BrandView'])->name('all.brand');
    Route::post('/store',[BrandController::class,'BrandStore'])->name('brand.store');

    Route::get('/edit/{id}',[BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/update',[BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}',[BrandController::class, 'BrandDelete'])->name('brand.delete');

});

// Admin Category all routes


Route::prefix('/category')->group(function(){
    Route::get('/view',[CategoryController::class,'CategoryView'])->name('all.category');
    Route::post('/store',[CategoryController::class,'CategoryStore'])->name('category.store');

    Route::get('/edit/{id}',[CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update',[CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}',[CategoryController::class, 'CategoryDelete'])->name('category.delete');

    // admin all sub category routes

    Route::get('/subCategory/view',[SubCategoryController::class,'SubCategoryView'])->name('all.subcategory');
    Route::post('/subCategory/store',[SubCategoryController::class,'SubCategoryStore'])->name('subcategory.store');

    Route::get('/subCategory/edit/{id}',[SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/subCategory/update',[SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/subCategory/delete/{id}',[SubCategoryController::class, 'SubCategoryDelete'])->name
    ('subcategory.delete');

    // Admin All Sub Sub Category
    Route::get('/sub/subCategory/view',[SubSubCategoryController::class,'SubSubCategoryView'])->name('all.subsubcategory');
    Route::get('/subcategory/ajax/{category_id}',[SubSubCategoryController::class,'GetSubCategory']);
    Route::post('/sub/subCategory/store',[SubSubCategoryController::class,'SubSubCategoryStore'])->name('subsubcategory.store');
    Route::get('/sub/subCategory/edit/{id}',[SubSubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');

    Route::post('/sub/subCategory/update',[SubSubCategoryController::class,'SubSubCategoryUpdate'])->name('subsubcategory.update');
    Route::get('/sub/subCategory/delete/{id}',[SubSubCategoryController::class, 'SubSubCategoryDelete'])->name
    ('subsubcategory.delete');

    // Admin Products All Routes

    Route::prefix('product')->group(function(){
        Route::get('/add',[ProductController::class, 'AddProduct'])->name('add.product');
        Route::get('/manage',[ProductController::class, 'ManageProduct'])->name('manage.product');


    });

});

