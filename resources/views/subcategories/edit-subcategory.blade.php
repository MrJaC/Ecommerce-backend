@extends('layout.main')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Subcategories: {{$name}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item">Subcategories</li>
              <li class="breadcrumb-item active">Edit</li>
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
                <form role="form" action="{{ route('subcategories.update', ['id' => $id]) }}" method="post">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label>Categories</label>
                        <select class="form-control select2" name="cat-id" id="cat-id" style="width: 100%;">
                            @foreach ($currentCat as $curCat )
                        <option  selected="" value="{{$curCat->cat_id}}">Current Cat: {{$curCat->cat_name}}</option>
                        @endforeach
                            @foreach ($categories as $cat )

                            <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                            @endforeach


                        </select>
                      </div>
                    <div class="form-group">
                      <label for="category-name">SubCategory name</label>
                      <input type="text" class="form-control" id="subcat-name" name="subcat-name" placeholder="Enter category name">
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
