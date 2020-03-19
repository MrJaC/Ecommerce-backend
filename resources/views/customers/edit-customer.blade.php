@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Customer {{$name ?? ''}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item">Customer</li>
              <li class="breadcrumb-item active">Edit Staff: {{$name ?? ''}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                                    <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Edit Customer: {{$name ?? ''}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('staff.update-staff') }}" method="post">
                        @csrf
                      <div class="card-body">
                        @if ($message = Session::get('message'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>

                        @endif
                        <div class="form-group">
                          <label for="category-name">Customer Name</label>
                        <input type="text" class="form-control" id="staff-name" name="staff-name" value="{{$name}}" placeholder="{{$name}}" required>
                        </div>
                        @foreach($data as $staff)
                        <div class="form-group">
                            <label for="category-name">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$staff->email}}" placeholder="{{$staff->email}}" required>
                          </div>
                          <div class="form-group">
                            <label for="category-name">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" required>
                          </div>
                          <div class="form-group">
                              <label for="staff-type">Staff Type</label>
                          <select id="role" type="text" class="form-control" name="role" required>
                            <option value="{{$staff->role}}">Current:
                                @if ($staff->role == 3)
                                Customer
                           @elseif ($staff->role == 4)
                               Vendor

                           @endif
                            </option>
                            <option value="3">Customer</option>
                            <option value="4">Vendor</option>
                        </select>
                    </div>
                    @endforeach
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
</div>
</div>
@endsection
