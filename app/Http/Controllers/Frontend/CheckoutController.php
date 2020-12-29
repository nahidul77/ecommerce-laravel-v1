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
        DB::transaction(function () use($request) {
            $request->validate([
                'name'         => 'required',
                'email'        => 'required|unique:users,email',
                'mobile'       => ['required','unique:users,mobile','regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'],
                'password'     => 'min:8|required_with:pass_confirm|same:pass_confirm',
                'pass_confirm' => 'min:8',
            ]);
            
            $code = rand(0000, 9999);
            $user = New User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->code = $code;
            $user->password = bcrypt($request->password);
            $user->usertype = 'customer';
            $user->status = '0';
            $user->save();

            $data = Array(
                'name'  => $request->name,
                'email' => $request->email,
                'code'  => $code,
            );
    
            Mail::send('frontend.emails.verify-email', $data, function($message) use($data){
                $message->from('support@estore.com', 'estore');
                $message->to($data['email']);
                $message->subject('Please verify your email');
            });
        }); 
        return redirect()->route('email.verify')->with('success', 'Successfully sign up, please verify your email!');     
    }

    public function emailVerify(){
            $data['logo']    = Logo::first();
            $data['contact'] = Contact::first();
            return view('frontend.single-pages.email-verify', $data);
    }
}
