@extends('backend.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage contact</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">add contact</li>
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
                      Add contact
                    <a class="btn btn-success btn-sm float-right" href="{{route('contacts.view')}}"><i class="fa fa-angle-double-down"></i> view contact</a>  
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <form id="updateForm" action="{{route('contacts.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                            <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                        </div>
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                              <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                          </div>
                            <div class="form-group">
                              <label for="mobile">Mobile No</label>
                              <input type="tel" name="mobile" class="form-control" id="mobile" placeholder="Enter mobile No">
                              <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                          </div>
                            <div class="form-group">
                              <label for="fb_link">Facebook link</label>
                              <input type="text" name="fb_link" class="form-control" id="fb_link" placeholder="Enter facebook link">
                              <font style="color: red">{{($errors->has('fb_link'))?($errors->first('fb_link')):''}}</font>
                          </div>
                          <div class="form-group">
                            <label for="yt_link">Youtube link</label>
                            <input type="text" name="yt_link" class="form-control" id="yt_link" placeholder="Enter Youtube link">
                            <font style="color: red">{{($errors->has('yt_link'))?($errors->first('yt_link')):''}}</font>
                        </div>
                        <div class="form-group">
                          <label for="address">Address</label>
                          <textarea name="address" id="address" class="form-control"></textarea>
                          <font style="color: red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Save</button>
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
@endsection