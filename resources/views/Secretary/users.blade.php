@extends('Secretary.sidebar')
@section('sidebar')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Users</h1>
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
                <button class="btn btn-success" data-toggle="modal" data-target="#add_user_modal">
                    <i class="fas fa-plus"></i> Add User
                </button>

                <div class="modal fade" id="add_user_modal">
                    <div class="modal-dialog">
                        <div class="modal-content" style="background-color: #dfe8eb;">
                            <div class="modal-header">
                                <h4 class="modal-title">Add User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="add_user_form">
                                    @csrf

                                    <input type="hidden" name="role" class="form-control" value="User">

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
                                <button type="button" onclick="add_user(event)" class="btn btn-primary">Submit</button>
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
                        <p class="card-text">List of Users</p>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped table-bordered" id="data_table">
                            <thead class="table-warning">
                                <th>Complete Name</th>
                                <th>Sex</th>
                                <th>Birthdate</th>
                                <th>Purok</th>
                                <th>Phone</th>
                                <th>Username</th>
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
    display_users();
    function display_users(){
        $.ajax({
            type: "GET",
            url: `{{ url('/get-users') }}`,
            success: function (data) {
                let rows = '';

                $.each(data, function(index, users){

                    let color, font_color;

                    if (users.status == "Active"){
                        color = "green";
                        font_color = "white";
                    }else if (users.status == "Inactive"){
                        color = "red";
                        font_color = "white";
                    }else if (users.status == "Pending"){
                        color = "orange";
                        font_color = "white";
                    }else if (users.status == "Blocked"){
                        color = "black";
                        font_color = "white";
                    }



                    rows += `
                        <tr>
                            <td>${users.complete_name}</td>
                            <td>${users.sex}</td>
                            <td>${users.bday}</td>
                            <td>${users.purok}</td>
                            <td>${users.phone}</td>
                            <td>${users.username}</td>
                            <td><span style="background-color:${color}; color:${font_color}; padding:10px; border-radius:10px;">${users.status}</span></td>
                            <td>

                                <a href="{{ url('/view-user=${users.id}') }}" class="btn btn-warning">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <button class="btn btn-primary" data-toggle="modal" data-target="#edit_user_modal${users.id}">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <button class="btn btn-danger" data-toggle="modal" data-target="#delete_user_modal${users.id}">
                                    <i class="fas fa-trash"></i>
                                </button>

                                <div class="modal fade" id="delete_user_modal${users.id}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete User</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="delete_user_form${users.id}">
                                                    @csrf

                                                    <input type="hidden" name="user_id" value="${users.id}">

                                                   <h5 class="text-center">Are you sure you want to delete?</h5>

                                                </form>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" onclick="delete_user(event, ${users.id})" class="btn btn-danger">Confirm</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->


                                <div class="modal fade" id="edit_user_modal${users.id}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit User</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="edit_user_form${users.id}">
                                                    @csrf

                                                    <input type="hidden" name="user_id" value="${users.id}">

                                                    <label>Complete Name</label>
                                                    <input type="text" name="complete_name" value="${users.complete_name}" class="form-control">

                                                    <label>Sex</label>
                                                    <select class="form-select select2" name="sex">
                                                        <option value="${users.sex}" selected>${users.sex}</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>

                                                    <label>Date of birth</label>
                                                    <input type="date" name="bday" value="${users.bday}" class="form-control">

                                                    <label>Purok - Address</label>
                                                    <input type="text" name="purok" value="${users.purok}" class="form-control" placeholder="Enter Purok">

                                                    <label>Phone</label>
                                                    <input type="text" name="phone" value="${users.phone}" class="form-control" placeholder="Enter Phone">

                                                    <label>Status</label>
                                                    <select class="form-select select2" name="status">
                                                        <option value="${users.status}">${users.status}</option>
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                        <option value="Blocked">Block</option>
                                                    </select>

                                                </form>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" onclick="edit_user(event, ${users.id})" class="btn btn-primary">Save changes</button>
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

    function delete_user(event, user_id){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: `{{ url('/delete-user') }}`,
            data: $('#delete_user_form' + user_id).serialize(),
            success: function (data) {
                $('#delete_user_form' + user_id)[0].reset();
                $('#delete_user_modal' + user_id).modal('hide');
                display_users();
                Swal.fire({
                    title: 'Deleted',
                    text: 'User Deleted Successfully',
                    icon: 'warning',
                });

            }
        });
    }

    function edit_user(event, user_id){
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: `{{ url('/edit-user') }}`,
            data: $('#edit_user_form' + user_id).serialize(),
            success: function (data) {
                $('#edit_user_form' + user_id)[0].reset();
                $('#edit_user_modal' + user_id).modal('hide');
                display_users();
                Swal.fire({
                    title: 'Edited',
                    text: 'User Edited Successfully',
                    icon: 'success',
                });

            }
        });
    }

        function add_user(event){
            event.preventDefault();

            $.ajax({
                type: "POST",
                url: `{{ url('/add-user') }}`,
                data: $('#add_user_form').serialize(),
                success: function (data) {
                    $('#add_user_form')[0].reset();
                    $('#add_user_modal').modal('hide');
                    display_users();
                    Swal.fire({
                        title: 'Added',
                        text: 'User Added Successfully',
                        icon: 'success',
                    });

                }
        });
    }
</script>

@endsection

