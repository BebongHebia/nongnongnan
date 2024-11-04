@extends('Admin.sidebar')
@section('sidebar')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">View Transaction : <span style="color:red; font-weight:bold">{{ $transactions->transaction_code }}</span> - Request for : <span style="color:red; font-weight:bold">{{ $transactions->document_type }}</span></h1>
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

                        <h5 class="text-center">Resident Details</h5>

                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('dist/img/user4-128x128.jpg') }}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $transactions->get_user->complete_name }}</h3>

                        <p class="text-muted text-center">{{ $transactions->get_user->phone }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Sex</b> <a class="float-right">{{ $transactions->get_user->sex }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Date of Birth</b> <a class="float-right">{{ $transactions->get_user->bday }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Phone</b> <a class="float-right">{{ $transactions->get_user->phone }}</a>
                            </li>
                        </ul>

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
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Document</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">

                                @if ($transactions->document_type == "Certificate of Indigency")
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <center>
                                                <img src="{{ asset('images/logo.png') }}" class="img-fluid">
                                                <p class="text-center; font-weight:bold">Republic of the Philippines <br> Brgy Old Nongnongan, Don Carlos. <br> Bukidnon. <br> Region X.</p>

                                            </center>
                                            <hr>

                                            <div class="row">
                                                <div class="col-sm-6"></div>
                                                <div class="col-sm-6">
                                                    <center>

                                                        <p style="font-weight: bold">{{ date("m-d-Y") }}<br>____________________________________________ <br>Date:</p>
                                                    </center>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <center>
                                                        <h4>Certification of Indigency</h4>
                                                    </center>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <center>
                                                        <p class="text-justify">This is to clarify that <input type="text" name="complete_name" value="{{ $transactions->get_user->complete_name }}" style="width:300px"> of legal age, Filipino and a resident of Purok <input type="text" name="complete_name" value="{{ $transactions->address }}" style="width:100"> is in the list of indigent families of Barangay Old Nongnongan, Don Carlos, Bukidnon. </p>
                                                        <p class="text-justify">This certificatio is issued for <input type="text" name="complete_name" value="{{ $transactions->purpose }}" style="width:300px"> only to it may serve</p>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($transactions->document_type == "Barangay Clearance")
                                    <h5>Barangay Clearance</h5>

                                @elseif($transactions->document_type == "Barangay Certification")
                                    <h5>Barangay Certification</h5>

                                @elseif($transactions->document_type == "Barangay Cert - First-time Job Seeker")
                                    <h5>Barangay Cert - First-time Job Seeker</h5>

                                @endif

                            </div>
                            <!-- /.tab-pane -->
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
