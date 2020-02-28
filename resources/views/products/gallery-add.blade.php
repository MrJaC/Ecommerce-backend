@extends('layout.main')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
              <h1 class="m-0 text-dark">Add Gallery Images for: {{$name ?? ''}}</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item">CGallery</li>
                  <li class="breadcrumb-item active">Add For: {{$name ?? ''}}</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                                    <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Add Images</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('products.image-upload',['id' => $id]) }}" method="post">
                        @csrf
                      <div class="card-body">
                        @if ($message = Session::get('message'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>

                        @endif
                        <div class="form-group">
                          <label for="Image Upload">Image</label>
                          <input type="file"  id="product-main-image" name="product-main-image" placeholder="Choose your image">
                        </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
@endsection
