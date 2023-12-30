@extends('backend.layouts.defaults')
@section('title')
    Job Applications
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6><i class="lni lni-briefcase" aria-hidden="true"></i> &nbsp; All Job Applications
                        <span style="float: right;">
                            {{-- <button class="btn btn-primary btn-sm" onclick="create()"><i
                                    class="fadeIn animated bx bx-plus"></i>
                                Add
                            </button> --}}
                        </span>
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="manage_all" class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>CV</th>
                                    <th>Applied For</th>
                                    <th>Action </th>
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
            table = $('#manage_all').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/admin/allJobApplications',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'mobile',
                        name: 'mobile'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'cv',
                        name: 'cv'
                    },
                    {
                        data: 'applied_for',
                        name: 'applied_for'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
                "columnDefs": [{
                        "className": "text-center",
                        "targets": "_all"
                    },
                    {
                        orderable: false,
                        targets: [1,7]
                    }
                ],
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
            ajax_submit_create('careers');
        }

        $(document).ready(function() {
            // View Form
            $("#manage_all").on("click", ".view", function() {
                var id = $(this).attr('id');
                ajax_submit_view('careers', id)
            });

            // Edit Form
            $("#manage_all").on("click", ".edit", function() {
                var id = $(this).attr('id');
                ajax_submit_edit('careers', id)
            });


            // Delete
            $("#manage_all").on("click", ".delete", function() {
                var id = $(this).attr('id');
                ajax_submit_delete('careers', id)
            });

        });
    </script>
@endsection
