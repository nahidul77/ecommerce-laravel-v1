<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function view(){
        $users = User::all();
        return view('backend.user.user-view', ['users'=> $users]);
    }

    public function add(){
        return view('backend.user.user-add');
    }

    public function dataValidate($request){
        $request->validate([
            'usertype'=>'required',
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required'
        ]);
    }

    public function saveData($user, $request){
        $user->usertype = $request->usertype;
        $user->name = $request->name;
        $user->email = $request->email;
        if(isset($request->password)){
            $user->password = bcrypt($request->password);
        }
        $user->save();
    }

    public function store(Request $request){
        $this->dataValidate($request);
        $user = new User();
        $this->saveData($user, $request);
        return redirect()->route('users.view')->with('success', 'Data Saved Successfully');
    }

    public function edit($id){
        $user = User::find($id);
        return view('backend.user.user-edit', ['user'=>$user]);
    }

    public function update($id, Request $request){
        //$this->dataValidate($request);
        $user = User::find($id);
        $this->saveData($user, $request);
        return redirect()->route('users.view')->with('success', 'Data Updated Successfully');
    }

    public function delete($id){
        $user = User::find($id);
        if(file_exists('public/upload/user_images/'.$user->image) AND !empty($user->image)){
            unlink('public/upload/user_images/'. $user->image);
        }
        $user->delete();
        return redirect()->route('users.view')->with('success', 'Data Deleted Successfully');
    }
}
