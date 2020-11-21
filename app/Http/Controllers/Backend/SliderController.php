<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Slider;

class SliderController extends Controller
{
    public function view(){
        $sliders = Slider::all();
        return view('backend.slider.view-slider', ['sliders'=> $sliders]);
    }

    public function add(){
        return view('backend.slider.add-slider');
    }

    public function store(Request $request){
        $slider = new Slider();
        $slider->short_title = $request->short_title;
        $slider->long_title = $request->long_title;
        $slider->created_by = Auth::user()->id;
        if($request->has('image')){
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/slider_images'), $fileName);
            $slider->image = $fileName;
        }
        $slider->save();
        return redirect()->route('sliders.view')->with('success', 'Slider Saved Successfully');
    }

    public function edit($id){
        $slider = Slider::find($id);
        return view('backend.slider.edit-slider', ['slider'=>$slider]);
    }

    public function update($id, Request $request){
        $slider = Slider::find($id);
        $slider->short_title = $request->short_title;
        $slider->long_title = $request->long_title;
        $slider->updated_by = Auth::user()->id;
        if($request->has('image')){
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/slider_images'), $fileName);
            $slider->image = $fileName;
        }
        $slider->save();
        return redirect()->route('sliders.view')->with('success', 'Slider Updated Successfully');
    }

    public function delete($id){
        $slider = Slider::find($id);
        if(file_exists('public/upload/slider_images/'.$slider->image) AND !empty($slider->image)){
            unlink('public/upload/slider_images/'. $slider->image);
        }
        $slider->delete();
        return redirect()->route('sliders.view')->with('success', 'Slider Deleted Successfully');
    }
}
