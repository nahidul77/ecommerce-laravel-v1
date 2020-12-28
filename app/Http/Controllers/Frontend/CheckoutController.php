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

class CheckoutController extends Controller
{
    public function customerLogin(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('frontend.single-pages.customer-login', $data);
    }

    public function customerSignup(){
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('frontend.single-pages.customer-signup', $data);
    }
}
