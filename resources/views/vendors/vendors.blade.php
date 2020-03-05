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
                            <th>Actions</th>
                            <th style="display:none;">Id</th>
                            <th>Logo</th>
                            <th>Business Name</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Landline</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Details</th>
                            <th>Approval Status</th>

                        </tr>
                        </thead>

                            <tbody>
                                @foreach ($vendors as $ven)
                                <tr>
                                    <td>
                                    <a href="{{ route('vendors.edit-vendor', ['id' => $ven->id, 'name' => $ven->vendor_business_name])}}"><i class="far fa-edit"></i></a>
                                    <a href="{{ route('vendors.delete-vendor', ['id' => $ven->id])}}"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                    <td><a href="{{ url('storage/business-logo/'.$ven->vendor_logo) }}" data-toggle="lightbox" data-title="{{$ven->vendor_logo}}">
                                        <img src="{{ url('storage/business-logo/'.$ven->vendor_logo) }}" class="product-image-thumb" alt="{{$ven->vendor_logo}}"/>
                                      </a></td>

                                    <td>{{ $ven->vendor_business_name}}</td>
                                <td>{{ $ven->name}}</td>
                                <td>{{ $ven->vendor_mobile}}</td>
                                <td>{{ $ven->vendor_landline}}</td>
                                <td>{{ $ven->cat_name}}</td>
                                <td>{{ $ven->subcat_name}}</td>
                                <td>                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-{{$ven->id}}">
                                    View Details
                                  </button>
                                <!--Modal-->
                                <div class="modal fade" id="modal-{{$ven->id}}">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">{{ $ven->vendor_business_name}}</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                         <p>{{ $ven->vendor_address_street}}</p>
                                         <p>{{ $ven->vendor_address_number }}</p>
                                            <p>{{ $ven->vendor_address_suburb }}</p>
                                                <p>{{ $ven->vendor_address_postcode}}</p>
                                                    <p> {{ $ven->vendor_website}}</p>
                                                        <p> {{ $ven->vendor_email}}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                                <!--End Modal-->
                                </td>
                                <td>Approved</td>
                                </tr>
                                @endforeach
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
