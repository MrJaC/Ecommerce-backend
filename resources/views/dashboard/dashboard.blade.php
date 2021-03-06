@extends('layout.main')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">

              <!-- /.card -->

              <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Products</h3>
                  <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-download"></i>
                    </a>
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-bars"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                      <th>Product ID</th>
                      <th>Image</th>
                      <th>Product Name</th>
                      <th>Product Vendor</th>
                      <th>Product Price</th>
                      <th>Sales</th>
                      <th>More</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($product ?? '' as $prod)
                        <tr>
                        <td>{{$prod->prod_id}}</td>

                        <td><img class="product-image-thumb" src="{{ url('storage/main-images/',$prod->product_main_image) }}" ></td>
                        <td>{{$prod->product_name}}</td>
                        <td></td>
                        <td>R{{$prod->product_price}}</td>
                        <td>TBA</td>
                        <td>                        <a href="{{ route('products.view-product',['id' => $prod->prod_id, 'name' => $prod->product_name])}}" class="text-muted">
                            <i class="fas fa-search"></i>
                          </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <div class="col-lg-6">

                <!-- /.card -->

                <div class="card">
                  <div class="card-header border-0">
                    <h3 class="card-title">Orders</h3>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-download"></i>
                      </a>
                      <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-bars"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                      <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Vendor Name</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Buyer</th>

                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($data as $order)
                          <tr>
                          <td>{{$order->order_id}}</td>
                          <td>{{$order->vendor_business_name}}</td>
                          <td></td>
                          <td>R{{$order->total_price}}</td>
                          <td>TBA</td>
                          <td>
                              <i class="fas fa-search"></i>
                           </td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.card -->
              </div>
            <!-- /.col-md-6 -->
          <!-- /.row -->
        </div>
        <div class="row">
            <div class="col-lg-6">

                <!-- /.card -->

                <div class="card">
                  <div class="card-header border-0">
                    <h3 class="card-title">Customers</h3>
                    <div class="card-tools">
                      <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-download"></i>
                      </a>
                      <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-bars"></i>
                      </a>
                    </div>
                  </div>
                  <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Users Name</th>
                        <th>Users Email</th>
                        <th>Created at:</th>
                        <th>Role</th>

                      </tr>
                      </thead>
                      <tbody>
                        @foreach ($customers as $cus)
                          <tr>
                            <td>{{$cus->id}}</td>
                            <td>{{$cus->name}}</td>
                            <td>{{$cus->email}}</td>
                            <td>{{$cus->created_at}}</td>
                            <td>
                                @if ($cus->role == 1)
                                 Admin
                            @elseif ($cus->role == 2)
                                Employee
                                @elseif ($cus->role == 3)
                                Users
                                @elseif ($cus->role == 4)
                                Vendor
                            @endif

                            </td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.card -->
              </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
  </div>
</div>
  <!-- /.content-wrapper -->
@endsection
