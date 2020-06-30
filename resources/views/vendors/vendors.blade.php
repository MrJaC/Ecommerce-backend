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
                      <h3 class="card-title">Vendors list <a  class="btn btn-default btn-flat btn-sm pull-right" href="{{ route('vendors.create-vendors') }}">Add Vendor </a></h3>
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
                            <th>Approval Status</th>
                            <th>Approval Actions</th>
                            <th>Logo</th>
                            <th>Business Name</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Landline</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Details</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                            <tbody>
                                @foreach ($vendors as $ven)
                                <tr>
                                    @if($ven->approval_status == 2)
                                    <td>
                                        Approved
                                    </td>
                                    @elseif($ven->approval_status == 3)
                                    <td>Rejected</td>
                                    @elseif($ven->approval_status == 0)
                                    <td>Pending</td>
                                    @endif
                                    <td>
                                        @if($ven->approval_status == 2)

                                    <a href="{{ route('vendors.deny', ['id' => $ven->vendorID ,'status' => $ven->approval_status ]) }}" class="btn btn-sm btn-danger">Reject <i class="fa fa-times"></i></a>
                                    <a href="{{ route('vendors.pending', ['id' => $ven->vendorID ,'status' => $ven->approval_status ])}}" class="btn btn-sm btn-warning">Pending <i class="fa fa-hourglass-end"></i></a>
                                        @elseif($ven->approval_status == 3)
                                        <a href="{{ route('vendors.pending', ['id' => $ven->vendorID ,'status' => $ven->approval_status ])}}" class="btn btn-sm btn-danger">Pending <i class="fa fa-hourglass-end"></i></a>
                                        <a href="{{ route('vendors.approve', ['id' => $ven->vendorID ,'status' => $ven->approval_status ])}}" class="btn btn-sm btn-success">Approve <i class="fa fa-check"></i></a>
                                        @elseif($ven->approval_status == 0)
                                        <a href="{{ route('vendors.deny', ['id' => $ven->vendorID ,'status' => $ven->approval_status ])}}" class="btn btn-sm btn-danger">Reject <i class="fa fa-times"></i></a>
                                        <a href="{{ route('vendors.approve', ['id' => $ven->vendorID ,'status' => $ven->approval_status ])}}" class="btn btn-sm btn-success">Approve <i class="fa fa-check"></i></a>
                                        @endif

                                    </td>
                                    <td><a href="{{ url('storage/business-logo/'.$ven->vendor_logo) }}" data-toggle="lightbox" data-title="{{$ven->vendor_logo}}">
                                        <img src="{{ url('storage/business-logo/'.$ven->vendor_logo) }}" class="product-image-thumb" alt="{{$ven->vendor_logo}}"/>
                                      </a></td>

                                <td>{{ $ven->vendor_business_name}}</td>
                                <td>{{ $ven->name}}</td>
                                <td>{{ $ven->vendor_mobile}}</td>
                                <td>{{ $ven->vendor_landline}}</td>
                                @if($ven->cat_id == null)
                                <td>TBA</td>
                                @elseif($ven->cat_id == !null)
                                <td>{{ $ven->cat_name}}</td>
                                @endif
                                @if($ven->sub_id == null)
                                <td>TBA</td>
                                @elseif($ven->sub_id == !null)

                                <td>{{ $ven->subcat_name}}</td>
                                @endif
                                <td>                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-{{$ven->vendorID}}">
                                    View Details
                                  </button>
                                <!--Modal-->
                                <div class="modal fade" id="modal-{{$ven->vendorID}}">
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

                                        @if($ven->about == null)
                                        <p>Description TBA</p>
                                        @elseif($ven->about == !null)
                                        <p>{{$ven->about}}</p>
                                        @endif
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
                                <td>
                                    <a href="{{ route('vendors.edit-vendor', ['id' => $ven->vendorID, 'name' => $ven->vendor_business_name])}}"><i class="far fa-edit"></i></a>
                                    <a href="{{ route('vendors.documents', ['id' => $ven->vendorID, 'name' => $ven->vendor_business_name])}}"><i class="far fa-file"></i></a>

                                    <a href="{{ route('vendors.delete-vendor', ['id' => $ven->vendorID])}}"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>


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
