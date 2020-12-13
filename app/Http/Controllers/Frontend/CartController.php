<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Logo;
use App\Model\Slider;
use App\Model\Product;
use App\Model\ProductSubImage;
use App\Model\ProductSize;
use App\Model\ProductColor;
use App\Model\Info;
use App\Model\Contact;
use App\Model\communicate;
use Illuminate\Support\Facades\Mail;
use Cart; 
use App\Model\Color;
use App\Model\Size;
class CartController extends Controller
{
    public function addToCart(Request $request){
        $request->validate([
            'size_id' => 'required',
            'color_id' => 'required'
        ]);
        $product = Product::where('id', $request->id)->first();
        $product_color = Color::where('id', $request->color_id)->first();
        $product_size = Size::where('id', $request->size_id)->first();
        Cart::add([
            'id' => $request->id,
            'qty' => $request->qty,
            'price' => $product->price,
            'name' => $product->name,
            'weight' => 550,
            'options' => [
                'size_id' => $request->size_id,
                'size_name' => $product_size->name,
                'color_id' => $request->color_id,
                'color_name' => $product_color->name,
                'image' => $product->image,
            ]
        ]);
        return redirect()->route('show.cart')->with('success', 'Product Added Successfully!');
    }

    public function updateCart(Request $request){
        Cart::update($request->rowId, $request->qty);
        return redirect()->route('show.cart')->with('success', 'Product Updated Successfully!');
    }

    public function deleteCart($rowId){
        Cart::remove($rowId);
        return redirect()->route('show.cart')->with('success', 'Product Deleted Successfully!');
    }

    public function showCart(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('frontend.single-pages.shopping-cart', $data);
    }
}
