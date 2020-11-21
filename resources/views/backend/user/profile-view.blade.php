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
                <li class="breadcrumb-item active">profile</li>
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
            <section class="col-md-4 offset-md-4">
                          <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{($user->image)?url('upload/user_images/'.$user->image):url('backend/img/no-image.png')}}"
                         alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center">{{$user->name}}</h3>
  
                  <p class="text-muted text-center">{{$user->address}}</p>
  
                  <table width="100%" class="table table-bordered">
                    <tbody>
                      <tr>
                        <td>Email</td>
                        <td>{{$user->email}}</td>
                      </tr>
                      <tr>
                        <td>Mobile No</td>
                        <td>{{$user->mobile}}</td>
                      </tr>
                      <tr>
                        <td>Gender</td>
                        <td>{{$user->gender}}</td>
                      </tr>
                    </tbody>
                  </table>
  
                  <a href="{{route('profiles.edit')}}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                </div>
                <!-- /.card-body -->
              </div>
            </section>
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
@endsection