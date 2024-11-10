@extends('Admin.sidebar')
@section('sidebar')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kagawad Profile</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">

                            @php
                                $get_kagawad_profile_exist = App\Models\KagawadIdPic::where('user_id', $kagawad_details->id)->count();
                                $get_kagawad_profile = App\Models\KagawadIdPic::where('user_id', $kagawad_details->id)->get();
                            @endphp

                            @if ($get_kagawad_profile_exist)
                            @foreach ($get_kagawad_profile as $item_get_kagawad_profile)
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/'.$item_get_kagawad_profile->path) }}" alt="User profile picture">
                            @endforeach

                            @else
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/user_icon.png') }}" alt="User profile picture">
                            @endif

                            <form action="{{ url('/add-kagawad-id') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="kagawad_id" value="{{ $kagawad_details->id }}">
                                <label>Upload/Change User Profile</label>
                                <input type="file" name="im age" class="form-control">
                                <button class="btn btn-success btn-block mt-2">
                                    <i class="fas fa-arrow-alt-circle-up"></i> Upload
                                </button>
                            </form>

                        </div>


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
                            <li class="nav-item"><b>User Details</b></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">

                                <form action="{{ url('/update-kagawad-profile') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="kagawad_id" value="{{ $kagawad_details->id }}">

                                    <label>Complete Name</label>
                                    <input type="text" name="complete_name" value="{{ $kagawad_details->complete_name }}" class="form-control">

                                    <label>Sex</label>
                                    <select class="form-select select2" name="sex" style="width:100%">
                                        <option value="{{ $kagawad_details->sex }}" selected>{{ $kagawad_details->sex }}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>

                                    <label>Date of birth</label>
                                    <input type="date" name="bday" value="{{ $kagawad_details->bday }}" class="form-control">

                                    <label>Purok - Address</label>
                                    <input type="text" name="address" value="{{ $kagawad_details->address }}" class="form-control" placeholder="Enter Purok">

                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{ $kagawad_details->phone }}" class="form-control" placeholder="Enter Phone">


                                    <button class="btn btn-primary mt-3">
                                        <i class="fas fa-save"></i> Save changes
                                    </button>
                                </form>
                            </div>


                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->



        </div>


    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
