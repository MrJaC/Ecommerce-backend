@extends('layout.main')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vendors</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item">Vendors</li>
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
                      <h3 class="card-title">Vendors list</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Actions</th>
                            <th style="display:none;">Id</th>
                            <th>Logo</th>
                            <th>Business Name</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Landline</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Service Locations</th>
                            <th>Valid from</th>
                            <th>Valid to</th>
                            <th>Details</th>
                            <th>Approval Status</th>

                        </tr>
                        </thead>

                            <tbody>
                            </tbody>

                        <tfoot>
                        <tr>
                            <th>Actions</th>
                            <th style="display:none;">Id</th>
                            <th>Logo</th>
                            <th>Business Name</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Landline</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Service Locations</th>
                            <th>Valid from</th>
                            <th>Valid to</th>
                            <th>Details</th>
                            <th>Approval Status</th>
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
