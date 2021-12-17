<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Toastr;
use Auth;



class AdminProfileController extends Controller
{
    //
    public function AdminProfile(){
         $adminData = Admin::find(1);
         return view('admin.adminProfileView',compact('adminData'));
    }
    public function AdminProfileEdit(){
        $editData = Admin::find(1);
        return view('admin.adminProfileEdit',compact('editData'));

    }
    public function AdminProfileStore(Request $req){
        $data = Admin::find(1);
        $data->name = $req->name;
        $data->email = $req->email;

        if($req->file('profile_photo_path')){
            $file = $req->file('profile_photo_path');
            @unlink(public_path('upload/adminImages/'.$data->profile_photo_path));
            $fileName = date('YmdHi').$file->getClientOriginalExtension();
            $file->move(public_path('upload/adminImages'),$fileName);
            $data['profile_photo_path'] = $fileName;
        }
        $data->save();

        Toastr::success('Profile Updated Successfully', 'Success', ["positionClass" => "toast-top-right", "closeButton"=>"true"]);

        return redirect()->route('admin.profile');

    }
    public function AdminChangePassword(){
        $adminImage = Admin::find(1);

        return view('admin.adminChangePassword');
    }
    public function AdminUpdateChangePassword(Request $req){
        $validateData = $req->validate([
            'currentPassword' => 'required',
            'password' => 'required|confirmed'

        ]);
        $hashedPassword = Admin::find(1)->password;
        if(Hash::check($req->currentPassword,$hashedPassword)){
            $admin = Admin::find(1);
            $admin->password = Hash::make($req->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');

        }else{
            return redirect()->back();
        }
        

    }
}
