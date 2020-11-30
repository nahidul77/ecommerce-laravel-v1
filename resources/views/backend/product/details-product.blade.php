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
                <li class="breadcrumb-item active">details product</li>
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
                      Product Details Info
                    <a class="btn btn-success btn-sm float-right" href="{{route('products.view')}}"><i class="fa fa-list"></i> list product</a>  
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped table-sm">
                      <tbody>
                        <tr>
                          <td width="50%">Category</td>
                          <td width="50%">{{$product->category->name}}</td>
                        </tr>
                        <tr>
                          <td width="50%">Brand</td>
                          <td width="50%">{{$product->brand->name}}</td>
                        </tr>
                        <tr>
                          <td width="50%">Product Name</td>
                          <td width="50%">{{$product->name}}</td>
                        </tr>
                        <tr>
                          <td width="50%">Price</td>
                          <td width="50%">{{$product->price}}</td>
                        </tr>
                        <tr>
                          <td width="50%">Short Description</td>
                          <td width="50%">{{$product->short_desc}}</td>
                        </tr>
                        <tr>
                          <td width="50%">Long Description</td>
                          <td width="50%">{{$product->long_desc}}</td>
                        </tr>
                        <tr>
                          <td width="50%">Product Colors</td>
                          <td width="50%">
                            @foreach ($colors as $value)
                            {{$value->color->name}} &nbsp;  
                            @endforeach
                          </td>
                        </tr>
                        <tr>
                          <td width="50%">Product Sizes</td>
                          <td width="50%">
                            @foreach ($sizes as $value)
                            {{$value->size->name}}&nbsp;  
                            @endforeach
                          </td>
                        </tr>
                        <tr>
                          <td width="50%">Product Image</td>
                          <td width="50%"><img src="{{(!empty($product->image))?url('upload/product_images/'.$product->image):url('backend/img/no-image.png')}}" height="50px" width="50px" alt=""></td>
                        </tr>
                        <tr>
                          <td width="50%">Product Sub Images</td>
                          <td width="50%">
                            @if (!empty($subImages))
                              @foreach ($subImages as $value)
                              <img src="{{(!empty($value->sub_image))?url('upload/product_images/product_sub_images/'.$value->sub_image):url('backend/img/no-image.png')}}" height="50px" width="50px" alt="">
                              @endforeach
                            @endif
                          </td>
                        </tr>
                      </tbody>
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