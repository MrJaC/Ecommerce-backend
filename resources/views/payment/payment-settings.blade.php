@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Payment settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item">Payment Settings</li>
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
                            <h3 class="card-title">Payment settings

                                <a class="btn btn-default btn-flat btn-sm pull-right"
                                    href="{{ route('vendors.create-vendors') }}">Add Payment </a>
                            </h3>
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
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Enabled</th>
                                        <th>Created</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $pset)
                                    <tr>
                                        <td>{{$pset->pay_settings_id}}</td>
                                        <td>
                                            @if($pset->pay_settings_type == 1)
                                            Pickup
                                            @elseif($pset->pay_settings_type == 2)
                                            Delivery
                                            @endif
                                        </td>
                                        <td>{{$pset->pay_settings_text}}</td>
                                        <td>
                                            @if($pset->enabled == 1)
                                            Active
                                            @elseif($ban->enabled == 0)
                                            Deactivated
                                            @endif
                                        </td>
                                        <td>
                                            {{$pset->time_created}}
                                        </td>
                                        <td>
                                            <a href="#"><i class="far fa-edit"></i></a>
                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Enabled</th>
                                        <th>Created</th>
                                        <th>Actions</th>
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
