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
                <li class="breadcrumb-item active">info</li>
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
                      info List
                     @if ($infoCount<1)
                     <a class="btn btn-success btn-sm float-right" href="{{route('infos.add')}}"><i class="fa fa-plus-circle"></i> Add info</a>
                     @endif   
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>SL.</th>
                          <th>Title</th>
                          <th>Sub Title</th>
                          <th>Description</th>
                          <th>image</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($infos as $key => $info)
                            <tr class="{{$info->id}}">
                                <td>{{$key+1}}</td>
                                <td>{{$info->title}}</td>
                                <td>{{$info->sub_title}}</td>
                                <td>{{$info->description}}</td>
                                <td><img src="{{(!empty($info->image))?url('upload/info_images/'.$info->image):url('backend/img/no-image.png')}}" height="60px" width="80px"></td>
                                <td>
                                    <a title="Edit" class="btn btn-primary btn-sm" href="{{route('infos.edit', $info->id)}}"><i class="fa fa-edit"></i></a>
                                    <a id="delete" title="Delete" data-token="{{csrf_token()}}" data-id="{{$info->id}}" class="btn btn-danger btn-sm" href="{{route('infos.delete', $info->id)}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>SL.</th>
                          <th>Title</th>
                          <th>Sub Title</th>
                          <th>Description</th>
                          <th>image</th>
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