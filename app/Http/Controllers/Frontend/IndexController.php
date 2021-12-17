<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;
use Toastr;

class IndexController extends Controller
{

    //
    public function index(){
        return view('frontend.frontIndex');
    }



// User Logout
public function UserLogOut(){
    Auth::logout();
    return Redirect()->route('login');

}
// User Profile Update
public function UserProfileUpdate(){
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('frontEnd.profile.userProfileUpdate',compact('user'));

}
// User Profile store
public function UserProfileStore(Request $req){
    $data = User::find(Auth::user()->id);
    $data->name = $req->name;
    $data->email = $req->email;
    $data->phone = $req->phone;

    if($req->file('profile_photo_path')){
        $file = $req->file('profile_photo_path');

        $fileName = date('YmdHi').$file->getClientOriginalExtension();
        $file->move(public_path('upload/userImages'),$fileName);
        $data['profile_photo_path'] = $fileName;
    }
    $data->save();

    Toastr::success('Profile Updated Successfully', 'Success', ["positionClass" => "toast-top-right", "closeButton"=>"true"]);

    return redirect()->route('dashboard');

}
// User change password
public function UserChangePassword(){
    $id = Auth::user()->id;
    $user = User::find($id);

    return view('frontend.profile.userChangePassword',compact('user'));
}
public function UserPasswordUpdate(Request $req){
    $validateData = $req->validate([
        'currentPassword' => 'required',
        'password' => 'required|confirmed'

    ]);
    $hashedPassword = Auth::user()->password;
    if(Hash::check($req->currentPassword,$hashedPassword)){
        $user = User::find(Auth::id());
        $user->password = Hash::make($req->password);
        $user->save();
        Auth::logout();

        Toastr::success('Password changed Successfully', 'Success', ["positionClass" => "toast-top-right", "closeButton"=>"true"]);
        return redirect()->route('login');


    }else{
        return redirect()->back();
    }
}

}
