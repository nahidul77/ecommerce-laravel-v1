<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function view(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.user.profile-view', ['user'=>$user]);
    }

    public function edit(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('backend.user.profile-edit', ['editData'=>$editData]);
    }

    public function update(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        if($request->has('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$user->image));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $fileName);
            $user->image = $fileName;
        }
        $user->save();
        return redirect()->route('profiles.view')->with('success', 'Profile Updated Successfully!');
    }

    public function passwordView(){
        return view('backend.user.password-edit');
    }

    public function passwordUpdate(Request $request){
        if(Auth::attempt(['id'=>Auth::user()->id, 'password'=>$request->current_password])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('profiles.view')->with('success', 'Password Changed Successfully');
        }else{
            return redirect()->back()->with('error', 'Sorry! Your Current password does not match.');
        }
    }
}
