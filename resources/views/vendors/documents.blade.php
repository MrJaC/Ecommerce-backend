@extends('layout.main')
@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{ $name}}: Documents</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item">Vendor Documents</li>
            <li class="breadcrumb-item active">View : {{ $name}}</li>
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
                  <h3 class="card-title">Add Document</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('vendors.add-document', ['id' => $id] ) }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                    <div class="form-group">
                      <label for="banner-name">Document name</label>
                      <input type="text" class="form-control" id="document-name" name="document-name" placeholder="Enter Document Name" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="banner-name">Document description</label>
                      <input type="text" class="form-control" id="document-description" name="document-description" placeholder="Document Description" required>
                    </div>
                  </div>
                  <div class="col-6">
                      <div class="form-group">
                        <label for="banner-item">Document File</label>
                        <input type="file"  id="document-item" name="document-item" placeholder="Choose document" required>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Documents list </h3>
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
                            <th>Vendor ID</th>
                            <th>Business Name</th>
                            <th>Created</th>
                            <th>Document Description</th>
                            <th>Document Name</th>
                            <th>Document View</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                            <tbody>
                                @foreach ($data as $docs)
                                <tr>
                                <td>{{$docs->vendor_doc_id}}</td>
                                <td>{{$docs->vendor_id}}</td>
                                <td>{{$docs->vendor_business_name}}</td>
                                <td>{{$docs->time_created}}</td>
                                <td>{{$docs->document_description}}</td>
                                <td>{{$docs->document_name}}</td>
                                <td>
                                    <a href="{{ url('storage/vendor/vendor-documents/'.$docs->document_location) }}">
                                        <i class="far fa-eye"></i>
                                  </a>

                                </td>
                                <td>     <a href="{{ route('vendors.delete-document', ['venID' => $docs->vendor_id, 'id' => $docs->vendor_doc_id])}}"><i class="far fa-trash-alt"></i></a>      </td>
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
