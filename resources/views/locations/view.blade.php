@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Locations</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item">Locations</li>
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
            <!-- /.row -->
        </div>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">View all locations </h3>
                        </div>
                        @if ($message = Session::get('message'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>

                        @endif
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>City</th>
                                        <th>Lat</th>
                                        <th>Long</th>
                                        <th>Country</th>
                                        <th>Province</th>
                                        <th>Prefix</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $loc)
                                    <tr>
                                        <td>{{$loc->location_id}}</td>
                                        <td>{{$loc->city}}</td>
                                        <td>{{$loc->lat}}</td>
                                        <td>{{$loc->lng}}</td>
                                        <td>{{$loc->country}}</td>
                                        <td>{{$loc->admin}}</td>
                                        <td>{{$loc->iso2}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>City</th>
                                        <th>Lat</th>
                                        <th>Long</th>
                                        <th>Country</th>
                                        <th>Province</th>
                                        <th>Prefix</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
        </section>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
