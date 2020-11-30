@extends('backend.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage size</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">size</li>
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
                      size List
                     <a class="btn btn-success btn-sm float-right" href="{{route('sizes.add')}}"><i class="fa fa-plus-circle"></i> Add size</a>  
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th width="6%">SL.</th>
                          <th>Size Name</th>
                          <th width="12%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sizes as $key => $size)
                          @php
                            $count_size = App\Model\ProductSize::where('size_id', $size->id)->count();
                          @endphp
                            <tr class="{{$size->id}}">
                                <td>{{$key+1}}</td>
                                <td>{{$size->name}}</td>
                                <td>
                                    <a title="Edit" class="btn btn-primary btn-sm" href="{{route('sizes.edit', $size->id)}}"><i class="fa fa-edit"></i></a>
                                    @if($count_size<1)
                                    <a id="delete" title="Delete" data-token="{{csrf_token()}}" data-id="{{$size->id}}" class="btn btn-danger btn-sm" href="{{route('sizes.delete', $size->id)}}"><i class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>SL.</th>
                          <th>Size Name</th>
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