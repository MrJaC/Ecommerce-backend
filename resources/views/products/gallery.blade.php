@extends('layout.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gallery: {{$name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item">Products</li>
                        <li class="breadcrumb-item">Gallery</li>
                        <li class="breadcrumb-item active">View: {{$name}}</li>

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                                <div class="row">

                                    <div class="col-6">
                                        <h4 class="card-title">{{$name}}</h4>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-primary btn-flat btn-sm float-right"
                                            href="{{ route('products.add-image', ['id' => $id, 'name' => $name ] ) }}">Add
                                            Image </a>
                                    </div>
                                </div>
                            </div>

                        <div class="card-body">
                            <div class="row">
                                @foreach ( $gallery as $gal )
                                <div class="col-sm-2">

                                    <a href="{{ url('storage/main-images/product-gallery/'.$gal->product_img) }}" data-toggle="lightbox"
                                        data-title="sample 1 - white" data-gallery="gallery">
                                        <img src="{{ url('storage/main-images/product-gallery/'.$gal->product_img) }}"
                                            class="img-fluid mb-4" alt="white sample" />
                                    </a>

                                </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Gallery Table</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Product ID</th>
                                  <th>Image Name</th>
                                  <th>View Image</th>
                                  <th>Created At</th>
                                  <th>Actions</th>


                                </tr>
                                </thead>

                                    <tbody>
                                        @foreach ( $gallery as $gal )
                                        <tr>
                                        <td>{{ $gal->id}}</td>
                                        <td>{{ $gal->product_id}}</td>
                                        <td>{{ $gal->product_img}}</td>
                                        <td>
                                            <a href="{{ url('storage/main-images/product-gallery/'.$gal->product_img) }}" data-toggle="lightbox"
                                                data-title="sample 1 - white" data-gallery="gallery">
                                                <i class="far fa-eye"></i>
                                            </a>

                                        </td>
                                        <td>{{ $gal->created_at}}</td>
                                        <td>
                                        <a href="{{ route('products.gal-post.delete', ['id' => $gal->id, 'name' => $name , 'product_id' => $gal->product_id])}}"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Product ID</th>
                                    <th>Image Name</th>
                                    <th>View Image</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
