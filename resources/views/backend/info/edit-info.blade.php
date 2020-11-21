@extends('backend.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Info</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Update Info</li>
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
                      Update Info
                    <a class="btn btn-success btn-sm float-right" href="{{route('infos.view')}}"><i class="fa fa-list"></i> view info</a>  
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <form id="updateForm" action="{{route('infos.update', $info->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" name="title" value="{{$info->title}}" class="form-control" id="title" placeholder="Enter Title">
                          <font style="color: red">{{($errors->has('title'))?($errors->first('title')):''}}</font>
                      </div>
                        <div class="form-group">
                          <label for="sub_title">Sub Title</label>
                          <input type="text" name="sub_title" value="{{$info->sub_title}}" class="form-control" id="sub_title" placeholder="Enter Sub Title">
                          <font style="color: red">{{($errors->has('sub_title'))?($errors->first('sub_title')):''}}</font>
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control">{{$info->description}}</textarea>
                        <font style="color: red">{{($errors->has('description'))?($errors->first('description')):''}}</font>
                      </div>
                       <div class="form-group">
                        <label for="image">Upload Logo</label>
                        <input type="file" name="image" class="form-control" id="image">
                        <font style="color: red">{{($errors->has('image'))?($errors->first('image')):''}}</font>
                      </div>
                       <div class="form-group">
                        <img id="showImage" src="{{(!empty($info->image))?url('upload/info_images/'.$info->image):url('backend/img/no-image.png')}}" height="150px" width="150px" style="border: solid 2px black" alt="">
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
@endsection