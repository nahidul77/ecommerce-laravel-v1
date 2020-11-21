<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Color;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    public function view(){
        $colors = Color::all();
        return view('backend.color.view-color', ['colors'=>$colors]);
    }

    public function add(){
        return view('backend.color.add-color');
    }

    public function dataValidate($request){
        $request->validate([
            'name'=>'required|unique:colors,name',
        ]);
    }

    public function store(Request $request){
        $this->dataValidate($request);
        $color = new Color();
        $color->name = $request->name;
        $color->created_by = Auth::user()->id;
        $color->save();
        return redirect()->route('colors.view')->with('success', 'New color added successfully');
    }

    public function edit($id){
        $editData = Color::find($id);
        return view('backend.color.add-color', ['editData'=>$editData]);
    }

    public function update(Request $request, $id){
        $this->dataValidate($request);
        $color = Color::find($id);
        $color->name = $request->name;
        $color->updated_by = Auth::user()->id;
        $color->save();
        return redirect()->route('colors.view')->with('success', 'color Updated successfully');
    }

    public function delete(Request $request){
        $color = Color::find($request->id);
        $color->delete();
        return redirect()->route('colors.view')->with('success', 'color deleted successfully');

    }
}
