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
                <li class="breadcrumb-item active">add product</li>
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
                    @if(isset($editData))
                      Update product
                      @else 
                      Add product
                    @endif
                    <a class="btn btn-success btn-sm float-right" href="{{route('products.view')}}"><i class="fa fa-angle-double-down"></i> view product</a>  
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <form id="myForm" action="{{(@$editData)?route('products.update', $editData->id):route('products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="category_id">Category</label>
                          <select class="custom-select form-control-border" name="category_id" id="category_id">
                            <option>Select Category</option>
                            @foreach ($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>  
                            @endforeach
                          </select>
                          <font style="color: red">{{($errors->has('category_id'))?($errors->first('category_id')):''}}</font>
                        </div>
                        <div class="form-group">
                          <label for="brand_id">Brand</label>
                          <select class="custom-select form-control-border" name="brand_id" id="brand_id">
                            <option>Select Brand</option>
                            @foreach ($brands as $brand)
                              <option value="{{$brand->id}}">{{$brand->name}}</option>  
                            @endforeach
                          </select>
                          <font style="color: red">{{($errors->has('brand_id'))?($errors->first('brand_id')):''}}</font>
                        </div>
                        <div class="form-group">
                            <label for="name">product Name</label>
                            <input type="text" name="name" value="{{(@$editData)?$editData->name: ''}}" class="form-control" id="name" placeholder="Enter product name">
                            <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                        </div>
                        <div class="form-group">
                          <label for="color_id">Color</label>
                          <select class="custom-select form-control-border select2" name="color_id[]" id="color_id" multiple>
                            @foreach ($colors as $color)
                              <option value="{{$color->id}}">{{$color->name}}</option>  
                            @endforeach
                          </select>
                          <font style="color: red">{{($errors->has('color_id'))?($errors->first('color_id')):''}}</font>
                        </div>
                        <div class="form-group">
                          <label for="size_id">Size</label>
                          <select class="custom-select form-control-border select2" name="size_id[]" id="size_id" multiple>
                            @foreach ($sizes as $size)
                              <option value="{{$size->id}}">{{$size->name}}</option>  
                            @endforeach
                          </select>
                          <font style="color: red">{{($errors->has('size_id'))?($errors->first('size_id')):''}}</font>
                        </div>
                        <div class="form-group">
                          <label for="short_desc">Short Description</label>
                          <textarea name="short_desc" id="short_desc" class="form-control">{{(@$editData)?$editData->short_desc: ''}}</textarea>
                          <font style="color: red">{{($errors->has('short_desc'))?($errors->first('short_desc')):''}}</font>
                        </div>
                        <div class="form-group">
                          <label for="long_desc">Long Description</label>
                          <textarea name="long_desc" id="long_desc" class="form-control" rows="4">{{(@$editData)?$editData->long_desc: ''}}</textarea>
                          <font style="color: red">{{($errors->has('long_desc'))?($errors->first('long_desc')):''}}</font>
                        </div>
                        <div class="form-group">
                          <label for="price">Price</label>
                          <input type="number" name="price" value="{{(@$editData)?$editData->price: ''}}" class="form-control" id="price" placeholder="Enter price">
                          <font style="color: red">{{($errors->has('price'))?($errors->first('price')):''}}</font>
                      </div>
                        <div class="form-group">
                          <label for="image">Upload Image</label>
                          <input type="file" name="image" class="form-control" id="image">
                          <font style="color: red">{{($errors->has('image'))?($errors->first('image')):''}}</font>
                        </div>
                        <div class="form-group">
                          <img id="showImage" src="{{(!empty($editData->image))?url('upload/info_images/'.$editData->image):url('backend/img/no-image.png')}}" height="150px" width="150px" style="border: solid 2px black" alt="">
                        </div>
                        <div class="form-group">
                          <label for="sub_image">Upload Sub Image</label>
                          <input type="file" name="sub_image[]" class="form-control" id="sub_image" multiple>
                          <font style="color: red">{{($errors->has('sub_image'))?($errors->first('sub_image')):''}}</font>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">{{(@$editData)?'Update': 'Save'}}</button>
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
        $('#myForm').validate({
          rules: {  
            name: {
              required: true,
            },
            category_id: {
              required: true,
            },
            brand_id: {
              required: true,
            },
            short_desc: {
              required: true,
            },
            long_desc: {
              required: true,
            },
            price: {
              required: true,
            },

          },
          messages: {
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