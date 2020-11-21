@extends('backend.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage Slider</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">slider</li>
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
                      Slider List
                     <a class="btn btn-success btn-sm float-right" href="{{route('sliders.add')}}"><i class="fa fa-plus-circle"></i> Add Slider</a> 
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>SL.</th>
                          <th>Short Title</th>
                          <th>Long Title</th>
                          <th>Slider</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $key => $slider)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$slider->short_title}}</td>
                                <td>{{$slider->long_title}}</td>
                                <td><img src="{{(!empty($slider->image))?url('upload/slider_images/'.$slider->image):url('backend/img/no-image.png')}}" height="60px" width="80px"></td>
                                <td>
                                    <a title="Edit" class="btn btn-primary btn-sm" href="{{route('sliders.edit', $slider->id)}}"><i class="fa fa-edit"></i></a>
                                    <a id="delete" title="Delete" class="btn btn-danger btn-sm" href="{{route('sliders.delete', $slider->id)}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>SL.</th>
                          <th>Short Title</th>
                          <th>Long Title</th>
                          <th>Slider</th>
                          <th>Action</th>
                        </tr>
                        </tfoot>
                      </table>
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