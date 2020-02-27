@extends('layout.main')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item">Products</li>
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
                      <h3 class="card-title">Product list  <a  class="btn btn-default btn-flat btn-sm pull-right" href="{{ route('products.create-products') }}">Add Product </a></h3>

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
                          <th>Product Image</th>
                          <th>Vendor Name</th>
                          <th>Product Name</th>
                          <th>Product Price</th>
                          <th>Product Category</th>
                          <th>Product SubCategory</th>
                          <th>Actions</th>

                        </tr>
                        </thead>

                            <tbody>
                                @foreach ($products as $prod)
                                <tr>
                                <td>{{$prod->prod_id}}</td>

                                <td><img src="{{asset($prod->product_main_image)}}" ></td>
                                <td></td>
                                <td>{{$prod->product_name}}</td>
                                <td>R{{$prod->product_price}}</td>
                                <td>{{$prod->cat_name}}</td>
                                <td>{{$prod->subcat_name}}</td>
                                <td>
                                <a  class="btn btn-default btn-flat" href="{{ route('products.view-product',['id' => $prod->prod_id, 'name' => $prod->product_name])}}">View </a>
                                <a  class="btn btn-default btn-flat" href="{{ route('products.edit-products',['id' => $prod->prod_id, 'name' => $prod->product_name])}}">Edit</a>
                                <a class="btn btn-default btn-flat" href="{{ route('products.product-gallery',['id' => $prod->prod_id, 'name' => $prod->product_name])}}">Gallery</a>
                                <a class="btn btn-default btn-flat" href="{{ route('products.delete', ['id' => $prod->prod_id])}}">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Product Image</th>
                            <th>Vendor Name</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Category</th>
                            <th>Product SubCategory</th>
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
