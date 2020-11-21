@extends('backend.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Update Profile</li>
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
                  <h3>
                      Update Profile
                    <a class="btn btn-success btn-sm float-right" href="{{route('profiles.view')}}"><i class="fa fa-user"></i> Your profile</a>  
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <form id="updateForm" action="{{route('profiles.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{$editData->name}}" class="form-control" id="name" placeholder="Enter Name">
                            <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                        </div>
                          <div class="form-group">
                            <label for="email">Email address</label>
                            <input name="email" value="{{$editData->email}}" type="email" class="form-control" id="email" placeholder="Enter email">
                            <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                          </div>
                          <div class="form-group">
                            <label for="mobile">Mobile No</label>
                            <input type="text" name="mobile" value="{{$editData->name}}" class="form-control" id="mobile" placeholder="Enter mobile no">
                            <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                          </div>
                          <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" class="form-control">{{$editData->address}}</textarea>
                            <font style="color: red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                          </div>
                        <div class="form-group">
                         <label for="gender">Gender</label>
                         <select class="custom-select form-control-border" name="gender" id="gender">
                           <option>---Select Gender---</option>
                           <option value="Male" {{($editData->gender == "Male")? 'Selected':''}}>Male</option>
                           <option value="Female" {{($editData->gender == "Female")? 'Selected':''}}>Female</option>
                           <option value="Others" {{($editData->gender == "Others")? 'Selected':''}}>Others</option>
                         </select>
                         <font style="color: red">{{($errors->has('gender'))?($errors->first('gender')):''}}</font>
                       </div>
                       <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                        <font style="color: red">{{($errors->has('image'))?($errors->first('image')):''}}</font>
                      </div>
                       <div class="form-group">
                        <img id="showImage" src="{{($editData->image)?url('upload/user_images/'.$editData->image):url('backend/img/no-image.png')}}" height="150px" width="150px" style="border: solid 2px black" alt="">
                      </div>
                       <div class="card-footer">
                         <button type="submit" class="btn btn-primary">Update</button>
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
        $(function () {
          $('#storeForm').validate({
            rules: {
                gender: {
                required: true,
              },
              name: {
                required: true,
              },
              email: {
                required: true,
                email: true,
              },
            },
            messages: {
                usertype: {
                required: "Please Select gender",
              },
              name: {
                required: "Please enter Username",
              },
              email: {
                required: "Please enter a email address",
                email: "Please enter a vaild email address"
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
          });
        });
        </script>
@endsection