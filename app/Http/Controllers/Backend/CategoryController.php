<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use Illuminate\Support\Facades\Auth;
use DB;

class CategoryController extends Controller
{
    public function view(){
        $categories = Category::all();
        return view('backend.category.view-category', ['categories'=>$categories]);
    }

    public function add(){
        return view('backend.category.add-category');
    }

    public function dataValidate($request){
        $request->validate([
            'name'=>'required|unique:categories,name',
        ]);
    }

    public function store(Request $request){
        $this->dataValidate($request);
        $category = new Category();
        $category->name = $request->name;
        $category->created_by = Auth::user()->id;
        $category->save();
        return redirect()->route('categories.view')->with('success', 'New Category added successfully');
    }

    public function edit($id){
        $editData = Category::find($id);
        return view('backend.category.add-category', ['editData'=>$editData]);
    }

    public function update(Request $request, $id){
        $this->dataValidate($request);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->updated_by = Auth::user()->id;
        $category->save();
        return redirect()->route('categories.view')->with('success', 'Category Updated successfully');
    }

    public function delete(Request $request){
        $category = Category::find($request->id);
        $category->delete();
        return redirect()->route('categories.view')->with('success', 'Category deleted successfully');

    }
}
