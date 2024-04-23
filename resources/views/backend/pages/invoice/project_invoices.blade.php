@extends('backend.layouts.defaults')
@section('title')
    Invoices
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6><i class="lni lni-construction-hammer" aria-hidden="true"></i> &nbsp; Invoices
                        <span style="float: right;">
                            <button class="btn btn-primary btn-sm add_invoice"><i class="fadeIn animated bx bx-plus"></i>
                                Add
                            </button>
                            <button class="btn btn-primary btn-sm invoice_summery"><i class="fadeIn animated bx bx-archive"></i>
                                Summary
                            </button>
                        </span>
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <input type="hidden" value="{{ $id }}" id="quote_id">
        <div class="col-md-12 col-sm-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="manage_all" class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Invoice Code</th>
                                    <th>Invoice Date</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            var id = $('#quote_id').val();
            table = $('#manage_all').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/admin/invoice/get_project_invoices/' + id,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'invoice_code',
                        name: 'invoice_code'
                    },
                    {
                        data: 'invoice_date',
                        name: 'invoice_date'
                    },
                    {
                        data: 'grand_total',
                        name: 'grand_total'
                    },
                    {
                        data: 'paid_amount',
                        name: 'paid_amount'
                    },
                    {
                        data: 'due',
                        name: 'due'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
                dom: 'Bfrtip',
                buttons: [
                    'print',
                    'excel',
                    'pdf',
                    'csv'
                ],
                "columnDefs": [{
                    "className": "",
                    "targets": "_all"
                }],
                "autoWidth": false,
            });
            $('.dataTables_filter input[type="search"]').attr('placeholder', 'Type here to search...').css({
                'width': '220px',
                'height': '30px'
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            // Delete
            $("#manage_all").on("click", ".delete", function() {
                var id = $(this).attr('id');
                swal({
                    title: "Are you sure?",
                    text: "Deleted data cannot be recovered!!",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Delete"
                }, function() {
                    $.ajax({
                        url: '/admin/invoices/' + id,
                        type: 'DELETE',
                        headers: {
                            "X-CSRF-TOKEN": CSRF_TOKEN,
                        },
                        "dataType": 'json',
                        success: function(data) {
                            if (data.type === 'success') {
                                swal("Done!", "Successfully Deleted", "success");
                                reload_table();
                            } else if (data.type === 'danger') {
                                swal("Error deleting!", "Try again", "error");
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal("Error deleting!", "Try again", "error");
                        }
                    });
                });
            });

            $("#manage_all").on("click", ".add_payment", function() {
                var id = $(this).attr('id');
                $.ajax({
                    url: '/admin/create_invoice_payments' + '/' + id,
                    type: 'get',
                    success: function(data) {
                        // console.log(data);
                        $("#modal_data").html(data.html);
                        $('#myModal').modal('show'); // show bootstrap modal
                        $('.modal-title').text('Create Invoice Payments');
                    },
                    error: function(result) {
                        $("#modal_data").html("Sorry Cannot Load Data");
                    }
                });
            });

            $("#manage_all").on("click", ".show_payments", function() {
                var id = $(this).attr('id');
                $.ajax({
                    url: '/admin/show_invoice_payments' + '/' + id,
                    type: 'get',
                    success: function(data) {
                        // console.log(data);
                        $("#modal_data").html(data.html);
                        $('#myModal').modal('show'); // show bootstrap modal
                        $('.modal-title').text('All Payments');
                    },
                    error: function(result) {
                        $("#modal_data").html("Sorry Cannot Load Data");
                    }
                });
            });

            $(".add_invoice").on("click", function() {
                var id = $('#quote_id').val();
                // console.log(id);
                $.ajax({
                    url: '/admin/generate_invoice' + '/' + id,
                    type: 'get',
                    success: function(data) {
                        // console.log(data);
                        $("#modal_data").html(data.html);
                        $('#myModal').modal('show'); // show bootstrap modal
                        $('.modal-title').text('Generate Invoice');
                    },
                    error: function(result) {
                        $("#modal_data").html("Sorry Cannot Load Data");
                    }
                });
            });

            $(".invoice_summery").on("click", function() {
                var id = $('#quote_id').val();
                // console.log(id);
                $.ajax({
                    url: '/admin/invoice_summery' + '/' + id,
                    type: 'get',
                    success: function(data) {
                        // console.log(data);
                        $("#modal_data").html(data.html);
                        $('#myModal').modal('show'); // show bootstrap modal
                        $('.modal-title').text('Generate Invoice');
                    },
                    error: function(result) {
                        $("#modal_data").html("Sorry Cannot Load Data");
                    }
                });
            });

        });
    </script>
@endsection
