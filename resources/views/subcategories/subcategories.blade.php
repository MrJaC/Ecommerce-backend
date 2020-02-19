@extends('layout.main')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">SubCategories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item">SubCategories</li>
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
                      <h3 class="card-title">View all subcategories</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>ID</th>
                          <th>Subcategory Name</th>
                          <th>Category Name</th>
                          <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcategories as $subcat)
                            <tr>
                        <td>{{$subcat->sub_id}}</td>
                        <td>{{$subcat->subcat_name}}</td>
                        <td>{{$subcat->cat_name}}</td>
                            <td>{{$subcat->image}}</td>
                            <td>
                                <a  class="btn btn-default btn-flat" href="{{ route('subcategories.edit-subcat',['id' => $subcat->sub_id, 'name' => $subcat->subcat_name])}}">Edit</a>
                            <a class="btn btn-default btn-flat" href="{{route('subcategories.delete', ['id' => $subcat->sub_id])}}">Delete</a>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                          <th>Subcategory Name</th>
                          <th>Category Name</th>
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
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
