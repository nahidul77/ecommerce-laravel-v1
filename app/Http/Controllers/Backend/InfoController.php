<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Info;

class InfoController extends Controller
{
    public function view(){
        $infos = Info::all();
        $infoCount = Info::count();
        return view('backend.info.view-info', ['infos'=> $infos, 'infoCount'=>$infoCount]);
    }

    public function add(){
        return view('backend.info.add-info');
    }

    public function store(Request $request){
        $info = new Info();
        $info->title = $request->title;
        $info->sub_title = $request->sub_title;
        $info->description = $request->description;
        $info->created_by = Auth::user()->id;
        if($request->has('image')){
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/info_images'), $fileName);
            $info->image = $fileName;
        }
        $info->save();
        return redirect()->route('infos.view')->with('success', 'Info Saved Successfully');
    }

    public function edit($id){
        $info = Info::find($id);
        return view('backend.info.edit-info', ['info'=>$info]);
    }

    public function update($id, Request $request){
        $info = Info::find($id);
        $info->title = $request->title;
        $info->sub_title = $request->sub_title;
        $info->description = $request->description;
        $info->updated_by = Auth::user()->id;
        if($request->has('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/info_images/'.$info->image));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/info_images'), $fileName);
            $info->image = $fileName;
        }
        $info->save();
        return redirect()->route('infos.view')->with('success', 'Info Saved Successfully');
    }

    public function delete($id){
        $info = Info::find($id);
        if(file_exists('public/upload/info_images/'.$info->image) AND !empty($info->image)){
            unlink('public/upload/info_images/'. $info->image);
        }
        $info->delete();
        return redirect()->route('infos.view')->with('success', 'Info Deleted Successfully');
    }
}
