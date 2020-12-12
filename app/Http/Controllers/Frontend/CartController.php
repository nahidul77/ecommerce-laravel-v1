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
            
        ]);

    }
}
