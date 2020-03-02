@extends('layout.main')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile: {{$user->name}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">User Profile: {{$user->name}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                  src="{{ url('storage/user/user-images/'.$user->user_image) }}"
                       alt="User profile picture">
                </div>

            <h3 class="profile-username text-center">{{$user->name}}</h3>

            <p class="text-muted text-center">
                 @if ($user->role == 1)
                Admin
           @elseif ($user->role == 2)
               Employee
               @elseif ($user->role == 3)
               Customer
               @elseif ($user->role == 4)
               Vendor
           @endif</p>



              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link " href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- /.tab-pane -->
                  @if ($message = Session::get('message'))
                  <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong>{{ $message }}</strong>
                  </div>

                  @endif
                  <div class="tab-pane active" id="settings">

                  @if($hasProfile == false)
                    <form class="form-horizontal" action="{{ route('profile.user-profile-add')}}" method="post">
                    @csrf
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Landline</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="landline" name="landline" placeholder="Landline">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="address" name="address" placeholder="Address"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="city" name="city" placeholder="City">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">State</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="state" name="state" placeholder="State">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Country</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="country" name="country" placeholder="Country">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                    @elseif($hasProfile == true)
                        <form class="form-horizontal" action="{{ route('profile.user-profile-update')}}" method="post">
                            @csrf
                            @foreach($userDetails as $det)
                              <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Mobile</label>
                                <div class="col-sm-10">
                                <input type="number" class="form-control" id="mobile" name="mobile" value="{{$det->mobile_number}}" placeholder="Mobile">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Landline</label>
                                <div class="col-sm-10">
                                  <input type="number" class="form-control" id="landline" name="landline" value="{{$det->landline_number}}" placeholder="Landline">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="address" name="address"  placeholder="Address">{{$det->address}}</textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">City</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="city" name="city" value="{{$det->city}}" placeholder="City">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">State</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="state" name="state" value="{{$det->state}}" placeholder="State">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Country</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="country" name="country"  value="{{$det->country}}"placeholder="Country">
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                  <button type="submit" class="btn btn-danger">Update</button>
                                </div>
                              </div>
                              @endforeach
                            </form>

                    @endif
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
