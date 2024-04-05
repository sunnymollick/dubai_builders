@extends('backend.layouts.defaults')
@section('title')
    Services
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6><i class="lni lni-construction-hammer" aria-hidden="true"></i> &nbsp; Invoices
                        <span style="float: right;">
                            <button class="btn btn-primary btn-sm" onclick="create()"><i
                                    class="fadeIn animated bx bx-plus"></i>
                                Add
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
            //alert("alert");
            var id = $('#quote_id').val();
            table = $('#manage_all').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/admin/invoice/get_project_invoices/'+id,
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
                        data: 'action',
                        name: 'action'
                    },
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
        function create() {
            ajax_submit_create('services');
        }

        $(document).ready(function() {
            // View Form
            $("#manage_all").on("click", ".view", function() {
                var id = $(this).attr('id');
                ajax_submit_view('services', id)
            });

            // Edit Form
            $("#manage_all").on("click", ".edit", function() {
                var id = $(this).attr('id');
                ajax_submit_edit('services', id)
            });


            // Delete
            $("#manage_all").on("click", ".delete", function() {
                var id = $(this).attr('id');
                ajax_submit_delete('services', id)
            });

        });
    </script>
@endsection
