@extends('layout.main')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Product: {{$name}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item">Products</li>
              <li class="breadcrumb-item active">Edit: {{$name}}</li>
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
                    <h3 class="card-title">Edit Form</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" action="{{ route('products.update', ['id' =>$id]) }}" method="post">
                      @csrf
                    <div class="card-body">
                      <div class="form-group">
                          <label>Categories</label>
                          <select class="form-control select2" name="prod-cat" id="prod-cat" style="width: 100%;">
                            @foreach ($currentprod as $curprod )
                          <option value="{{$curprod->product_cat}}" selected="">Current: {{$curprod->cat_name}}</option>
                            @endforeach
                            <option>Please Select</option>
                              @foreach ($categories as $cat )

                              <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                              @endforeach


                          </select>
                        </div>
                        <div class="form-group">
                            <label>SubCategories</label>
                            <select class="form-control select2" name="prod-subcat" id="prod-subcat" style="width: 100%;">
                                @foreach ($currentprod as $curprod )
                                <option value="{{$curprod->product_subcat}}" selected="">Current: {{$curprod->subcat_name}}</option>
                                @endforeach
                                <option>Please Select</option>
                                @foreach ($subcategories  as $subcat )

                                <option value="{{$subcat->id}}">{{$subcat->subcat_name}}</option>
                                @endforeach


                            </select>
                          </div>
                      <div class="form-group">
                        <label for="category-name">Product name</label>
                        <input type="text" class="form-control" id="product-name" name="product-name" placeholder="{{$curprod->product_name}}" value="{{$curprod->product_name}}">
                      </div>
                      <div class="form-group">
                        <label for="category-name">Product price</label>
                        <input type="text" class="form-control" id="product-price" name="product-price" placeholder="{{$curprod->product_price}}" value="{{$curprod->product_price}}">
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