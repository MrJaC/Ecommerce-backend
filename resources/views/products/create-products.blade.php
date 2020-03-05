@extends('layout.main')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item">Products</li>
              <li class="breadcrumb-item active">Create</li>
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
                      <div class="col-md-12">
                                  <!-- general form elements -->
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Create Form</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" action="{{ route('products.add-products') }}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Categories</label>
                                    <select class="form-control select2" name="prod-cat" id="prod-cat" style="width: 100%;" required>
                                        <option selected="">Please Select</option>
                                        @foreach ($category as $cat )

                                        <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                        @endforeach


                                    </select>
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Subcategories</label>
                                    <select class="form-control select2" name="prod-subcat" id="prod-subcat" style="width: 100%;" required>
                                        <option selected="">Please Select</option>
                                        @foreach ($subcategory as $subcat )

                                        <option value="{{$subcat->sub_id}}">{{$subcat->subcat_name}}</option>
                                        @endforeach


                                    </select>
                                  </div>
                            </div>
                        </div>
                      <div class="form-group">
                        <label for="category-name">Product name</label>
                        <input type="text" class="form-control" id="product-name" name="product-name" placeholder="Enter product name">
                      </div>
                      <div class="form-group">
                        <label for="category-name">Product price</label>
                        <input type="number" class="form-control" id="product-price" name="product-price" placeholder="Enter product price">
                      </div>
                    <!-- /.card-body -->
                      <div class="form-group">

                        <label for="description-prod">Product Description</label>

                              <!-- tools box -->
                              <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                  <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                        title="Remove">
                                  <i class="fas fa-times"></i></button>
                              </div>
                              <!-- /. tools -->

                            <!-- /.card-header -->

                              <div class="mb-3">
                                <textarea class="textarea" placeholder="Place some text here"
                                          style="width: 50%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="description"></textarea>
                              </div>
                    </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category-name">Product SKU</label>
                        <input type="text" class="form-control" id="product-sku" name="product-sku" placeholder="Enter product price">
                      </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="category-name">Product Stock Amount</label>
                    <input type="number" class="form-control" id="product-price" name="product-stock" placeholder="Enter product stock">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputFile">Product main Image</label>


                            <input type="file"  id="product-main-image" name="product-main-image" placeholder="Choose your image" required>


                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Vendor</label>
                            <select class="form-control select2" name="vendor" id="vendor" style="width: 100%;" required>
                                <option>Please Select</option>
                                @foreach ($vendors as $ven )

                                <option value="{{$ven->vendorID}}">{{$ven->vendor_business_name}}</option>
                                @endforeach


                            </select>
                          </div>
                    </div>
                </div>
            </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
