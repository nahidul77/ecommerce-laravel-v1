<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Logo;

class LogoController extends Controller
{
    public function view(){
        $logos = Logo::all();
        $logoCount = Logo::count();
        return view('backend.logo.view-logo', ['logos'=> $logos, 'logoCount'=>$logoCount]);
    }

    public function add(){
        return view('backend.logo.add-logo');
    }

    public function store(Request $request){
        $logo = new Logo();
        $logo->title = $request->title;
        $logo->created_by = Auth::user()->id;
        if($request->has('image')){
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_images'), $fileName);
            $logo->image = $fileName;
        }
        $logo->save();
        return redirect()->route('logos.view')->with('success', 'Logo Saved Successfully');
    }

    public function edit($id){
        $logo = Logo::find($id);
        return view('backend.logo.edit-logo', ['logo'=>$logo]);
    }

    public function update($id, Request $request){
        $logo = Logo::find($id);
        $logo->title = $request->title;
        $logo->updated_by = Auth::user()->id;
        if($request->has('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/logo_images/'.$logo->image));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_images'), $fileName);
            $logo->image = $fileName;
        }
        $logo->save();
        return redirect()->route('logos.view')->with('success', 'Logo Updated Successfully');
    }

    public function delete($id){
        $logo = logo::find($id);
        if(file_exists('public/upload/logo_images/'.$logo->image) AND !empty($logo->image)){
            unlink('public/upload/logo_images/'. $logo->image);
        }
        $logo->delete();
        return redirect()->route('logos.view')->with('success', 'Logo Deleted Successfully');
    }
}
