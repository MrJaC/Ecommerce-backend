@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Banners</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item">Banners</li>
              <li class="breadcrumb-item active">View</li>
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
                    <h3 class="card-title">Add Banner</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" action="{{ route('banners.add-banner') }}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="card-body">
                      @if ($message = Session::get('message'))
                      <div class="alert alert-danger alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                              <strong>{{ $message }}</strong>
                      </div>

                      @endif
                      <div class="row">
                          <div class="col-6">
                      <div class="form-group">
                        <label for="banner-name">Banner name</label>
                        <input type="text" class="form-control" id="banner-name" name="banner-name" placeholder="Enter Banner Name">
                      </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                          <label for="banner-item">Banner Item</label>
                          <input type="file"  id="banner-item" name="banner-item" placeholder="Choose your banner">
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Upload</button>
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
        <section class="content">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">View all Banners </h3>
                    </div>
                    @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>

                    @endif
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>ID</th>
                          <th>Banner Name</th>
                          <th>Image</th>
                          <th>Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $ban)
                            <tr>
                            <td>{{$ban->id}}</td>
                            <td>{{$ban->banner_name}}</td>
                            <td><a href="{{ url('storage/banners/'.$ban->banner_image) }}" data-toggle="lightbox" data-title="{{$ban->banner_image}}">
                                <img src="{{ url('storage/banners/'.$ban->banner_image) }}" class="product-image-thumb" alt="{{$ban->banner_image}}"/>
                              </a></td>
                            <td>
                            <a   href="{{ route('categories.edit-cat',['id' => $ban->id, 'name' => $ban->banner_name])}}"><i class="far fa-edit"></i></a>
                            <a href="{{ route('categories.delete', ['id' => $ban->id])}}"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Cat Name</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
        </section>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
