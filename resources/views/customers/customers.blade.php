@extends('layout.main')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item">Users</li>
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
                      <h3 class="card-title">View all Users</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>ID</th>
                          <th>Users Name</th>
                          <th>Users Email</th>
                          <th>Created at:</th>
                          <th>Role</th>
                          <th>Actions</th>

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
                            <td>
                                TBA</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Users Name</th>
                            <th>Users Email</th>
                            <th>Created at:</th>
                            <th>Role</th>
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
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
