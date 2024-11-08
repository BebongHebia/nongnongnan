@extends('Admin.sidebar')
@section('sidebar')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Staff Secretary</h1>
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#add_staff_sec_modal">
                    <i class="fas fa-plus"></i> Add Staff Secretary
                </button>

                <div class="modal fade" id="add_staff_sec_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Secretary</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="add_staff_sec_form">
                                    @csrf

                                    <input type="hidden" name="role" class="form-control" value="Staff-Secretary">

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
                                    <input type="text" name="purok" class="form-control" placeholder="Enter Purok">

                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone">




                                </form>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" onclick="add_sec(event)" class="btn btn-primary">Submit</button>
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
                        <p class="card-text">List of Secretary</p>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped table-bordered" id="data_table">
                            <thead class="table-warning">
                                <th>Complete Name</th>
                                <th>Sex</th>
                                <th>Birthdate</th>
                                <th>Purok</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="user_table_body">

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

    display_sec();

    function display_sec(){
        $.ajax({
            type: "GET",
            url: `{{ url('/get-staff-sec') }}`,
            success: function (data) {
                let rows = '';

                $.each(data, function(index, staff_sec){
                    rows += `
                        <tr>
                            <td>${staff_sec.complete_name}</td>
                            <td>${staff_sec.sex}</td>
                            <td>${staff_sec.bday}</td>
                            <td>${staff_sec.purok}</td>
                            <td>${staff_sec.phone}</td>
                            <td>${staff_sec.status}</td>
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#edit_staff_sec_modal${staff_sec.id}">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <button class="btn btn-danger" data-toggle="modal" data-target="#delete_staff_sec_modal${staff_sec.id}">
                                    <i class="fas fa-trash"></i>
                                </button>

                                <div class="modal fade" id="delete_staff_sec_modal${staff_sec.id}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete Secretary</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="delete_staff_sec_form${staff_sec.id}">
                                                    @csrf

                                                    <input type="hidden" name="user_id" value="${staff_sec.id}">

                                                   <h5 class="text-center">Are you sure you want to delete?</h5>

                                                </form>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" onclick="delete_sec(event, ${staff_sec.id})" class="btn btn-danger">Confirm</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->


                                <div class="modal fade" id="edit_staff_sec_modal${staff_sec.id}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Secretary</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="edit_staff_sec_form${staff_sec.id}">
                                                    @csrf

                                                    <input type="hidden" name="user_id" value="${staff_sec.id}">

                                                    <label>Complete Name</label>
                                                    <input type="text" name="complete_name" value="${staff_sec.complete_name}" class="form-control">

                                                    <label>Sex</label>
                                                    <select class="form-select select2" name="sex">
                                                        <option value="${staff_sec.sex}" selected>${staff_sec.sex}</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>

                                                    <label>Date of birth</label>
                                                    <input type="date" name="bday" value="${staff_sec.bday}" class="form-control">

                                                    <label>Purok - Address</label>
                                                    <input type="text" name="purok" value="${staff_sec.purok}" class="form-control" placeholder="Enter Purok">

                                                    <label>Phone</label>
                                                    <input type="text" name="phone" value="${staff_sec.phone}" class="form-control" placeholder="Enter Phone">

                                                    <label>Status</label>
                                                    <select class="form-select select2" name="status">
                                                        <option value="${staff_sec.status}">${staff_sec.status}</option>
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>

                                                </form>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" onclick="edit_sec(event, ${staff_sec.id})" class="btn btn-primary">Save changes</button>
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

                $('#user_table_body').html(rows);
                $('.select2').select2();

            }
        });
    }

    function delete_sec(event, user_id){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: `{{ url('/delete-user') }}`,
            data: $('#delete_staff_sec_form' + user_id).serialize(),
            success: function (data) {
                $('#delete_staff_sec_form' + user_id)[0].reset();
                $('#delete_staff_sec_modal' + user_id).modal('hide');
                display_sec();
                Swal.fire({
                    title: 'Deleted',
                    text: 'Staff Secretary Deleted Successfully',
                    icon: 'warning',
                });

            }
        });
    }


    function edit_sec(event, user_id){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: `{{ url('/edit-user') }}`,
            data: $('#edit_staff_sec_form' + user_id).serialize(),
            success: function (data) {
                $('#edit_staff_sec_form' + user_id)[0].reset();
                $('#edit_staff_sec_modal' + user_id).modal('hide');
                display_sec();
                Swal.fire({
                    title: 'Edited',
                    text: 'Staff Secretary Edited Successfully',
                    icon: 'success',
                });

            }
        });
    }

    function add_sec(event){
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: `{{ url('/add-user') }}`,
            data: $('#add_staff_sec_form').serialize(),
            success: function (data) {
                $('#add_staff_sec_form')[0].reset();
                $('#add_staff_sec_modal').modal('hide');
                display_sec();
                Swal.fire({
                    title: 'Added',
                    text: 'Staff Secretary Added Successfully',
                    icon: 'success',
                });

            }
        });
    }
</script>

@endsection
