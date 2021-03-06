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
class FrontendController extends Controller
{ 
    public function home(){
        $data['logo'] = Logo::first();
        $data['sliders'] = Slider::all();
        $data['contact'] = Contact::first();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products'] = Product::orderBy('id', 'desc')->paginate(12);
        return view('frontend.single-pages.home', $data);
    }
    public function productList(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products'] = Product::orderBy('id', 'desc')->paginate(12);
        return view('frontend.single-pages.product-list', $data);
    }

    public function categoryWiseProduct($id){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products'] = Product::where('category_id', $id)->orderBy('id', 'desc')->get();
        return view('frontend.single-pages.category-wise-product', $data);
    }

    public function brandWiseProduct($id){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products'] = Product::where('brand_id', $id)->orderBy('id', 'desc')->get();
        return view('frontend.single-pages.brand-wise-product', $data);
    }

    public function productDetails($slug){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['product'] = Product::where('slug', $slug)->first();
        $data['productImages'] = ProductSubImage::where('product_id', $data['product']->id)->get();
        $data['productSizes'] = ProductSize::where('product_id', $data['product']->id)->get();
        $data['productColors'] = ProductColor::where('product_id', $data['product']->id)->get();
        return view('frontend.single-pages.product-details', $data);
    }

    public function shoppingCart(){
        return view('frontend.single-pages.shopping-cart');
    }

    public function about(){
        return view('frontend.single-pages.about');
    }

    public function contact(){
        return view('frontend.single-pages.contact');
    }

    public function store(Request $request){
        $contact = new communicate();
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required',
            'mobile'=> 'required',
            'subject'=> 'required',
            'message'=> 'required',
        ]);
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->mobile = $request->mobile;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        
        $data = Array(
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'subject' => $request->subject,
            'msg' => $request->message,
        );

        Mail::send('frontend.emails.contact', $data, function($message) use($data){
            $message->from('support@acmeit.com', 'Acme IT');
            $message->to($data['email']);
            $message->subject('Thanks for Contact Us');
        });
        return redirect()->back()->with('success', 'Your Message Sent Successfully!');
    }
}
