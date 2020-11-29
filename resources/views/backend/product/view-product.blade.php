@extends('backend.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Manage product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">product</li>
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
                      product List
                     <a class="btn btn-success btn-sm float-right" href="{{route('products.add')}}"><i class="fa fa-plus-circle"></i> Add product</a>  
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th width="6%">SL.</th>
                          <th>Category</th>
                          <th>Brand</th>
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>Image</th>
                          <th width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key => $product)
                            <tr class="{{$product->id}}">
                                <td>{{$key+1}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->brand->name}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td><img id="showImage" src="{{(!empty($product->image))?url('upload/product_images/'.$product->image):url('backend/img/no-image.png')}}" height="50px" width="50px" alt=""></td>
                                <td>
                                    <a title="Edit" class="btn btn-primary btn-sm" href="{{route('products.edit', $product->id)}}"><i class="fa fa-edit"></i></a>
                                    <a id="delete" title="Delete" data-token="{{csrf_token()}}" data-id="{{$product->id}}" class="btn btn-danger btn-sm" href="{{route('products.delete', $product->id)}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <th width="6%">SL.</th>
                          <th>Category</th>
                          <th>Brand</th>
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>Image</th>
                          <th width="10%">Action</th>
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