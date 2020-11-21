@extends('backend.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Password</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">change password</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- Left col -->
            <section class="col-md-12">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card">
                <div class="card-header">
                  <h3>Change Password</h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <form id="passForm" action="{{route('profiles.password.update')}}" method="POST">
                       @csrf
                      <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" name="current_password" class="form-control" id="current_password" placeholder="Current Password">
                        <font style="color: red">{{($errors->has('password'))?($errors->first('password')):''}}</font>
                      </div>
                      <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="new_password" placeholder="New Password">
                        <font style="color: red">{{($errors->has('password'))?($errors->first('password')):''}}</font>
                      </div>
                      <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                      </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Password</button>
                      </div>
                    </form> 
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </section>
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <script>
        $(document).ready(function(){
          $('#passForm').validate({
              current_password: {
                required: true,
              },
              new_password: {
                required: true,
                minlength: 6
              },
              confirm_password: {
                required: true,
                equalTo: '#new_password'
              },
            },
            messages: {
              current_password: {
                required: "Please enter Your Current Password",
              },
              new_password: {
                required: "Please enter password",
                minlength: "Your password must be at least 6 characters long"
              },
              confirm_password: {
                required: "Please enter confirm password",
                equalTo: "Confirm password does not match"
              },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          )};
        });
        </script>
@endsection