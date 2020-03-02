@extends('layout.main')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Your Profile</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item">Vendor Profile</li>
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
                        <div class="col-md-6">
                                    <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Profile Form</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                <form role="form" action="{{ route('vendor-profile.profile-add')}}" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        @if ($message = Session::get('message'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>

                        @endif
                        <div class="form-group">
                            <label for="exampleInputFile">Business logo</label>


                                <input type="file"  id="business-logo" name="business-logo" placeholder="Choose your image">


                            </div>
                        <div class="form-group">
                            <label for="category-name">Business name</label>
                            <input type="text" class="form-control" id="business-name" name="business-name" placeholder="Enter your business name" required>
                          </div>
                          <div class="form-group">
                            <label for="category-name">Landline</label>
                            <input type="text" class="form-control" id="landline" name="landline" placeholder="Enter your landline">
                          </div>
                          <div class="form-group">
                            <label for="category-name">Mobile</label>
                            <input type="text" class="form-control" id="mobile-number" name="mobile-number" placeholder="Enter your mobile number" required>
                          </div>
                          <div class="form-group">
                            <label for="category-name">Address Street</label>
                            <input type="text" class="form-control" id="address-street" name="address-street" placeholder="Enter your street address" required>
                          </div>
                          <div class="form-group">
                            <label for="category-name">Address Number</label>
                            <input type="text" class="form-control" id="address-number" name="mobile-number" placeholder="Enter your address number" required>
                          </div>
                          <div class="form-group">
                            <label for="category-name">Address Suburb</label>
                            <input type="text" class="form-control" id="address-suburb" name="address-suburb" placeholder="Enter your suburb" required>
                          </div>
                          <div class="form-group">
                            <label for="category-name">Address PostCode</label>
                            <input type="text" class="form-control" id="address-postcode" name="address-postcode" placeholder="Enter your postcode" required>
                          </div>
                          <div class="form-group">
                            <label for="category-name">Website</label>
                            <input type="text" class="form-control" id="website" name="website" placeholder="Enter website address">
                          </div>
                          <div class="form-group">
                            <label for="category-name">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                          </div>
                          <div class="form-group">
                            <label>Categories</label>
                            <select class="form-control select2" name="prod-cat" id="prod-cat" style="width: 100%;" required>
                                <option selected="">Please Select</option>
                                @foreach ($category as $cat )

                                <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                @endforeach


                            </select>
                          </div>
                          <div class="form-group">
                            <label>Subcategories</label>
                            <select class="form-control select2" name="prod-subcat" id="prod-subcat" style="width: 100%;" required>
                                <option selected="">Please Select</option>
                                @foreach ($subcategory as $subcat )

                                <option value="{{$subcat->sub_id}}">{{$subcat->subcat_name}}</option>
                                @endforeach


                            </select>
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
