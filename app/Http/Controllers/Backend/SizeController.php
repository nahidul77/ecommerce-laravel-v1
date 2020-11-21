<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Size;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    public function view(){
        $sizes = Size::all();
        return view('backend.size.view-size', ['sizes'=>$sizes]);
    }

    public function add(){
        return view('backend.size.add-size');
    }

    public function dataValidate($request){
        $request->validate([
            'name'=>'required|unique:sizes,name',
        ]);
    }

    public function store(Request $request){
        $this->dataValidate($request);
        $size = new Size();
        $size->name = $request->name;
        $size->created_by = Auth::user()->id;
        $size->save();
        return redirect()->route('sizes.view')->with('success', 'New size added successfully');
    }

    public function edit($id){
        $editData = Size::find($id);
        return view('backend.size.add-size', ['editData'=>$editData]);
    }

    public function update(Request $request, $id){
        $this->dataValidate($request);
        $size = Size::find($id);
        $size->name = $request->name;
        $size->updated_by = Auth::user()->id;
        $size->save();
        return redirect()->route('sizes.view')->with('success', 'size Updated successfully');
    }

    public function delete(Request $request){
        $size = Size::find($request->id);
        $size->delete();
        return redirect()->route('sizes.view')->with('success', 'size deleted successfully');

    }
}
