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
use App\User;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function customerLogin(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('frontend.single-pages.customer-login', $data);
    }

    public function customerSignup(){
        $data['logo']    = Logo::first();
        $data['contact'] = Contact::first();
        return view('frontend.single-pages.customer-signup', $data);
    }

    public function signupStore(Request $request){
        $request->validate([
            'name'         => 'required',
            'email'        => 'required|unique:users,email',
            'mobile'       => 'required|unique:users,mobile|regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/',
            'password'     => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'pass_confirm' => 'min:8',
        ]);

        
    }
}
