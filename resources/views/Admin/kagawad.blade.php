@extends('Admin.sidebar')
@section('sidebar')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kagawad</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">




        <div class="row">
            <div class="col-sm-12">
                <button class="btn btn-primary" data-toggle="modal" data-target="#add_kagawad_modal">
                    <i class="fas fa-plus"></i> Add Kagawad
                </button>

                <div class="modal fade" id="add_kagawad_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Kagawad</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="add_kagawad_form">
                                    @csrf

                                    <label>Complete Name</label>
                                    <input type="text" name="complete_name" class="form-control" placeholder="Enter Complete Name">

                                    <label>Sex</label>
                                    <select class="form-select select2" name="sex">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>

                                    <label>Date of birth</label>
                                    <input type="date" name="bday" class="form-control">

                                    <label>Purok - Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter Purok">

                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone">

                                </form>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" onclick="add_kagawad(event)" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
        </div>


        <div class="row mt-2">
            <div class="col-sm-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <p class="text-start">List of Kagawad</p>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover table-striped table-bordered" id="data_table">
                            <thead class="table-warning">
                                <th>Complete name</th>
                                <th>Sex</th>
                                <th>Birthday</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="kagawad_table_body">

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>


    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<script>

    display_kagawad();

    function display_kagawad(){
        $.ajax({
            type: "GET",
            url: `{{ url('/get_kagawad') }}`,
            success: function (data) {
                let rows = '';
                $.each(data, function (index, kagawad) {
                    rows += `

                        <tr>
                            <td>${kagawad.complete_name}</td>
                            <td>${kagawad.sex}</td>
                            <td>${kagawad.bday}</td>
                            <td>${kagawad.address}</td>
                            <td>${kagawad.phone}</td>
                            <td>${kagawad.status}</td>
                            <td>

                                <a href="{{ url('/view-kagawad=${kagawad.id}') }}" class="btn btn-warning">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <button class="btn btn-success" data-toggle="modal" data-target="#edit_kagawad_modal${kagawad.id}">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <button class="btn btn-danger" data-toggle="modal" data-target="#delete_kagawad_modal${kagawad.id}">
                                    <i class="fas fa-trash"></i>
                                </button>


                                <div class="modal fade" id="delete_kagawad_modal${kagawad.id}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete Kagawad</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="delete_kagawad_form${kagawad.id}">
                                                    @csrf

                                                    <input type="hidden" value="${kagawad.id}" name="kag_id">
                                                    <h5 class="text-center">Are you sure you want to delete?</h5>
                                                </form>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" onclick="delete_kagawad(event, ${kagawad.id})" class="btn btn-danger">Confirm Delete</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->


                                <div class="modal fade" id="edit_kagawad_modal${kagawad.id}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Kagawad</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="edit_kagawad_form${kagawad.id}">
                                                    @csrf

                                                    <input type="hidden" value="${kagawad.id}" name="kag_id">
                                                    <label>Complete Name</label>
                                                    <input type="text" value="${kagawad.complete_name}" name="complete_name" class="form-control" placeholder="Enter Complete Name">

                                                    <label>Sex</label>
                                                    <select class="form-select select2" name="sex">
                                                        <option value="${kagawad.complete_name}" selected>${kagawad.complete_name} selected</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>

                                                    <label>Date of birth</label>
                                                    <input type="date" value="${kagawad.bday}"  name="bday" class="form-control">

                                                    <label>Purok - Address</label>
                                                    <input type="text" value="${kagawad.address}" name="address" class="form-control" placeholder="Enter Purok">

                                                    <label>Phone</label>
                                                    <input type="text" value="${kagawad.phone}" name="phone" class="form-control" placeholder="Enter Phone">


                                                    <label>Status</label>
                                                    <select class="form-select select2" name="status">
                                                        <option value="${kagawad.status}" selected>${kagawad.status} selected</option>
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                </form>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" onclick="edit_kagawad(event, ${kagawad.id})" class="btn btn-primary">Save change</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                            </td>
                        </tr>


                    `;
                });

                $('#kagawad_table_body').html(rows);
            }
        });
    }


    function delete_kagawad(event, kag_id){
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: `{{ url('/delete-kagawad') }}`,
            data: $('#delete_kagawad_form' + kag_id).serialize(),
            success: function (data) {
                $('#delete_kagawad_form' + kag_id)[0].reset();
                $('#delete_kagawad_modal' + kag_id).modal('hide');
                display_kagawad();

                Swal.fire({
                    title: 'Deleted',
                    text: 'Kagawad Deleted Successfully',
                    icon: 'warning',
                });
            }
        });
    }

    function edit_kagawad(event, kag_id){
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: `{{ url('/edit-kagawad') }}`,
            data: $('#edit_kagawad_form' + kag_id).serialize(),
            success: function (data) {
                $('#edit_kagawad_form' + kag_id)[0].reset();
                $('#edit_kagawad_modal' + kag_id).modal('hide');
                display_kagawad();

                Swal.fire({
                    title: 'Edited',
                    text: 'Kagawad Edited Successfully',
                    icon: 'success',
                });
            }
        });
    }

    function add_kagawad(event){
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: `{{ url('/add-kagawad') }}`,
            data: $('#add_kagawad_form').serialize(),
            success: function (data) {
                $('#add_kagawad_form')[0].reset();
                $('#add_kagawad_modal').modal('hide');

                display_kagawad();
                Swal.fire({
                    title: 'Added',
                    text: 'Kagawad Added Successfully',
                    icon: 'success',
                });
            }
        });
    }
</script>
@endsection

