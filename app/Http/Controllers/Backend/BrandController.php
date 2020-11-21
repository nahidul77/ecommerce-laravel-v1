<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
use Illuminate\Support\Facades\Auth;
use DB;

class BrandController extends Controller
{
    public function view(){
        $brands = Brand::all();
        return view('backend.brand.view-brand', ['brands'=>$brands]);
    }

    public function add(){
        return view('backend.brand.add-brand');
    }

    public function dataValidate($request){
        $request->validate([
            'name'=>'required|unique:brands,name',
        ]);
    }

    public function store(Request $request){
        $this->dataValidate($request);
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->created_by = Auth::user()->id;
        $brand->save();
        return redirect()->route('brands.view')->with('success', 'New brand added successfully');
    }

    public function edit($id){
        $editData = Brand::find($id);
        return view('backend.brand.add-brand', ['editData'=>$editData]);
    }

    public function update(Request $request, $id){
        $this->dataValidate($request);
        $brand = brand::find($id);
        $brand->name = $request->name;
        $brand->updated_by = Auth::user()->id;
        $brand->save();
        return redirect()->route('brands.view')->with('success', 'brand Updated successfully');
    }

    public function delete(Request $request){
        $brand = Brand::find($request->id);
        $brand->delete();
        return redirect()->route('brands.view')->with('success', 'brand deleted successfully');

    }
}
