<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Brand;
use App\Model\product;
use App\Model\Color;
use App\Model\Size;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\ProductSubImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function view(){
        $products = Product::all();
        return view('backend.product.view-product', ['products'=>$products]);
    }

    public function add(){
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['colors'] = Color::all();
        $data['sizes'] = Size::all();
        return view('backend.product.add-product', $data);
    }

    public function dataValidate($request){
        $request->validate([
            'name'=>'required|unique:products,name',
        ]);
    }

    public function store(Request $request){
        DB::transaction(function() use($request){
            $this->dataValidate($request);
            $product = new product();
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->name = $request->name;
            $product->short_desc = $request->short_desc;
            $product->long_desc = $request->long_desc;
            $product->long_desc = $request->long_desc;
            $product->price = $request->price;
            $img = $request->file('image');
            if($img){
                $imgName = date('YmdHi').$img->getClientOriginalName();
                $img->move('upload/product_images/', $imgName);
                $product['image'] = $imgName;
            }
            if($product->save()){
                //product-sub-image data insert
                $files = $request->sub_image;
                if(!empty($files)){
                    foreach($files as $file){
                        $imgName = date('YmdHi').$file->getClientOriginalName();
                        $file->move('upload/product_images/product_sum_images/'.$imgName);
                        $subImage = new ProductSubImage();
                        $subImage->product_id = $product->id;
                        $subImage->sub_image = $imgName;
                        $subImage->save();
                    }
                }
                //product Color data insert
                $colors = $request->color_id;
                if(!empty($colors)){
                    foreach($colors as $color){
                        $productColor = new ProductColor();
                        $productColor->product_id = $product->id; 
                        $productColor->color_id = $color; 
                        $productColor->save();
                    }
                }
                //product size data insert
                $sizes = $request->size_id;
                if(!empty($sizes)){
                    foreach($sizes as $size){
                        $productSize = new ProductSize();
                        $productSize->product_id = $product->id;
                        $productSize->size_id = $size;
                        $productSize->save();
                    }
                }
            }else{
                return redirect()->back()->with('error', 'Sorry! Data not saved');
            }
        });
        return redirect()->route('products.view')->with('success', 'New product added successfully');
    }

    public function edit($id){
        $editData = product::find($id);
        return view('backend.product.add-product', ['editData'=>$editData]);
    }

    public function update(Request $request, $id){
        $this->dataValidate($request);
        $product = product::find($id);
        $product->name = $request->name;
        $product->updated_by = Auth::user()->id;
        $product->save();
        return redirect()->route('products.view')->with('success', 'product Updated successfully');
    }

    public function delete(Request $request){
        $product = product::find($request->id);
        $product->delete();
        return redirect()->route('products.view')->with('success', 'product deleted successfully');

    }
}
