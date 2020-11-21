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
                <li class="breadcrumb-item active">add size</li>
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
                      Update size
                      @else 
                      Add size
                    @endif
                    <a class="btn btn-success btn-sm float-right" href="{{route('sizes.view')}}"><i class="fa fa-angle-double-down"></i> view size</a>  
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <form id="myForm" action="{{(@$editData)?route('sizes.update', $editData->id):route('sizes.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Size Name</label>
                            <input type="text" name="name" value="{{(@$editData)?$editData->name: ''}}" class="form-control" id="name" placeholder="Enter size name">
                            <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
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
            }
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