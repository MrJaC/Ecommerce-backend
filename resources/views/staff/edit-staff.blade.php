@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Staff: {{$name ?? ''}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item">Staff</li>
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
                    <h3 class="card-title">Edit Staff: {{$name ?? ''}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('staff.edit-staff') }}" method="post">
                        @csrf
                      <div class="card-body">
                        @if ($message = Session::get('message'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>

                        @endif
                        <div class="form-group">
                          <label for="category-name">Staff Name</label>
                          <input type="text" class="form-control" id="staff-name" name="staff-name" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="category-name">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                          </div>
                          <div class="form-group">
                            <label for="category-name">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                          </div>
                          <div class="form-group">
                              <label for="staff-type">Staff Type</label>
                          <select id="role" type="text" class="form-control" name="role" required>
                            <option value="2">Employee</option>
                            <option value="1">Admin</option>
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
</div>
</div>
@endsection
