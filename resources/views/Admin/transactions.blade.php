@extends('Admin.sidebar')
@section('sidebar')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Transactions</h1>
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
                <div class="card card-primary">
                    <div class="card-header">
                        <p>List of Transactions</p>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-striped" id="data_table">
                            <thead class="table-warning">
                                <th>Transaction Code</th>
                                <th>Complete Name</th>
                                <th>Address</th>
                                <th>Document Type</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $item_transactions)
                                    <tr>
                                        <td>{{ $item_transactions->transaction_code }}</td>
                                        <td>{{ $item_transactions->get_user->complete_name }}</td>
                                        <td>{{ $item_transactions->address }}</td>
                                        <td>{{ $item_transactions->document_type }}</td>
                                        <td>
                                            <a href="{{ url('/admin-transactions/document-type=' . $item_transactions->document_type . '/transaction-id=' . $item_transactions->id) }}" class="btn btn-primary">
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

