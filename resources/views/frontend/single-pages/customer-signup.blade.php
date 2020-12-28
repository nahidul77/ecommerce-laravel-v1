@extends('frontend.layouts.master')
@section('content')
<style>
    #login .container #login-row #login-column #login-box {
    margin-top: 40px;
    margin-bottom: 40px;
    max-width: 600px;
    /*height: 320px;*/
    border: 1px solid #9C9C9C;
    background-color: #EAEAEA;
    }
    #login .container #login-row #login-column #login-box #login-form {
    padding: 20px;
    }
    #login .container #login-row #login-column #login-box #login-form #register-link {
    margin-top: -40px;
    }
</style>
    <!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('/')}}/frontend/images/header/breadcrumb.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Customer Signup
		</h2>
    </section>
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action="" method="post">
                                <h3 class="text-center text-info">Sign Up</h3>
                                <div class="form-group">
                                    <label  class="text-info">Full Name:</label><br>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label  class="text-info">Email:</label><br>
                                    <input type="email" name="username" id="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label  class="text-info">Mobile:</label><br>
                                    <input type="text" name="mobile" id="mobile" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label  class="text-info">Password:</label><br>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label  class="text-info">Confirm Password:</label><br>
                                    <input type="password" name="confirmation_password" id="confirmation_password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                                    <i class="fa fa-user"></i> Have a account? <a href="{{route('customer.login')}}"><span>Login</span></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection