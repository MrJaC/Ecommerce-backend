@extends('layout.main')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-2 text-dark">{{$name}} :Product list</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item active">Viewing </li>
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
                            <h3 class="card-title">{{$name}} : Product list  </h3>
                     </div>
                                <div class="col-9">
                                    <a  class="btn btn-primary btn-flat btn-sm  float-right" href="{{ route('products.create-products') }}">Add Product </a>
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
                          <th>Product Image</th>

                          <th>Product Name</th>
                          <th>Product Price</th>

                          <th>Actions</th>

                        </tr>
                        </thead>

                            <tbody>
                                @foreach ($vendor_products as $prod)
                                <tr>
                                <td>{{$prod->prod_id}}</td>
                                <td><a href="{{ url('storage/main-images/'.$prod->product_main_image) }}" data-toggle="lightbox" data-title="{{$prod->product_main_image}}">
                                    <img src="{{ url('storage/main-images/'.$prod->product_main_image) }}" class="product-image-thumb" alt="{{$prod->product_main_image}}"/>
                                  </a></td>


                                <td>{{$prod->product_name}}</td>
                                <td>R{{$prod->product_price}}</td>

                                <td>
                                <a  href="{{ route('products.view-product',['id' => $prod->prod_id, 'name' => $prod->product_name])}}"><i class="far fa-eye"></i></a>
                                <a  href="{{ route('products.edit-products',['id' => $prod->prod_id, 'name' => $prod->product_name])}}"><i class="far fa-edit"></i></a>
                                <a  href="{{ route('products.product-gallery',['id' => $prod->prod_id, 'name' => $prod->product_name])}}"><i class="far fa-images"></i></a>
                                <a href="{{ route('products.delete', ['id' => $prod->prod_id])}}"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Product Image</th>

                            <th>Product Name</th>
                            <th>Product Price</th>

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

