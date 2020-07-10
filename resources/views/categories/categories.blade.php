@extends('layout.main')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item">Categories</li>
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
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                        <div class="row">
                     <div class="col-3">
                      <h3 class="card-title">View all categories </h3>
                     </div>
                     <div class="col-9">
                        <a  class="btn btn-primary btn-flat btn-sm float-right" href="{{ route('categories.create-cat') }}">Add Categories </a>
                     </div>
                    </div>
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
                          <th>Cat Name</th>
                          <th>Image</th>
                          <th>Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $cat)
                            <tr>
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->cat_name}}</td>
                            <td><a href="{{ url('storage/cat/'.$cat->cat_img) }}" data-toggle="lightbox" data-title="{{$cat->cat_img}}">
                                <img src="{{ url('storage/cat/'.$cat->cat_img) }}" class="product-image-thumb" alt="{{$cat->cat_img}}"/>
                              </a></td>
                            <td>
                            <a   href="{{ route('categories.edit-cat',['id' => $cat->id, 'name' => $cat->cat_name])}}"><i class="far fa-edit"></i></a>
                            <a href="{{ route('categories.delete', ['id' => $cat->id])}}"><i class="far fa-trash-alt"></i></a>
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
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
