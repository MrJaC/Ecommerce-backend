@extends('layout.main')
@section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Vendor: {{$name}}</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item">Vendors</li>
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
                            <h3 class="card-title">{{$name}}: Profile Form</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                        <form role="form" action="{{ route('vendors.update-vendor', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
                              @csrf
                            <div class="card-body">
                              @if ($message = Session::get('message'))
                              <div class="alert alert-danger alert-block">
                                  <button type="button" class="close" data-dismiss="alert">×</button>
                                      <strong>{{ $message }}</strong>
                              </div>

                              @endif
                              <div class="form-group">
                                <label>User</label>
                                <select class="form-control select2" name="user" id="user" style="width: 100%;" required>
                                    @foreach($current ?? '' as $curr)
                                <option value="{{$curr->id}}">{{$curr->email}}</option>
                                    @endforeach

                                    @foreach ($customers ?? '' as $cus )

                                    <option value="{{$cus->id}}">{{$cus->email}}</option>
                                    @endforeach


                                </select>
                              </div>
                              @foreach($current as $ven)
                              <div class="form-group">
                                  <label for="exampleInputFile">Business logo</label>


                                      <input type="file"  id="business-logo" name="business-logo" placeholder="Choose your image">


                                  </div>
                                  <div class="form-group">
                                      <label>Current Image</label>

                                      <img src="{{ url('storage/business-logo/'.$ven->vendor_logo) }}" class="product-image-thumb" alt="{{$ven->vendor_logo}}"/>

                                  </div>
                              <div class="form-group">
                                  <label for="category-name">Business name</label>
                                  <input type="text" class="form-control" id="business-name" name="business-name"  value="{{$ven->vendor_business_name}}" placeholder="Enter your business name" required>
                                </div>
                                <div class="form-group">
                                  <label for="category-name">Landline</label>
                                  <input type="text" class="form-control" id="landline" name="landline" value="{{$ven->vendor_landline}}" placeholder="Enter your landline">
                                </div>
                                <div class="form-group">
                                  <label for="category-name">Mobile</label>
                                  <input type="text" class="form-control" id="mobile-number" name="mobile-number" value="{{$ven->vendor_mobile}}" placeholder="Enter your mobile number" required>
                                </div>
                                <div class="form-group">
                                  <label for="category-name">Address Street</label>
                                  <input type="text" class="form-control" id="address-street" name="address-street" value="{{$ven->vendor_address_street}}" placeholder="Enter your street address" required>
                                </div>
                                <div class="form-group">
                                  <label for="category-name">Address Number</label>
                                  <input type="text" class="form-control" id="address-number" name="mobile-number" value="{{$ven->vendor_address_number}}" placeholder="Enter your address number" required>
                                </div>
                                <div class="form-group">
                                  <label for="category-name">Address Suburb</label>
                                  <input type="text" class="form-control" id="address-suburb" name="address-suburb" value="{{$ven->vendor_address_suburb}}" placeholder="Enter your suburb" required>
                                </div>
                                <div class="form-group">
                                  <label for="category-name">Address PostCode</label>
                                  <input type="text" class="form-control" id="address-postcode" name="address-postcode" value="{{$ven->vendor_address_postcode}}" placeholder="Enter your postcode" required>
                                </div>
                                <div class="form-group">
                                  <label for="category-name">Website</label>
                                  <input type="text" class="form-control" id="website" name="website" value="{{$ven->vendor_website}}" placeholder="Enter website address">
                                </div>
                                <div class="form-group">
                                  <label for="category-name">Email</label>
                                  <input type="email" class="form-control" id="email" name="email" value="{{$ven->vendor_email}}" placeholder="Enter your email" required>
                                </div>
                                @endforeach
                               <!-- <div class="form-group">
                                  <label>Categories</label>
                                  <select class="form-control select2" name="prod-cat" id="prod-cat" style="width: 100%;" required>
                                    @foreach($current ?? '' as $curr)
                                    <option value="{{$curr->cat_id}}">{{$curr->cat_name}}</option>
                                        @endforeach
                                      @foreach ($category ?? '' as $cat )

                                      <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                      @endforeach


                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Subcategories</label>
                                  <select class="form-control select2" name="prod-subcat" id="prod-subcat" style="width: 100%;" required>
                                    @foreach($current ?? '' as $curr)
                                    <option value="{{$curr->sub_id}}">{{$curr->subcat_name}}</option>
                                        @endforeach
                                      @foreach ($subcategory ?? '' as $subcat )

                                      <option value="{{$subcat->sub_id}}">{{$subcat->subcat_name}}</option>
                                      @endforeach


                                  </select>
                                </div>-->


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
