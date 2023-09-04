@extends('backend.layouts.defaults')
@section('title')
Projects
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6><i class="lni lni-user" aria-hidden="true"></i> &nbsp; All Projects
                    <span style="float: right;">
                        <button class="btn btn-primary btn-sm" onclick="create()"><i class="fadeIn animated bx bx-user-plus"></i>
                            Add
                        </button>
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
                                <th>Project Name</th>
                                <th>Client Name</th>
                                <th>Type</th>
                                <th>Location</th>
                                <th>Status</th>
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
            ajax: '/admin/allProjects',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'project_title',
                    name: 'project_title'
                },
                {
                    data: 'client_name',
                    name: 'client_name'
                },
                {
                    data: 'project_type',
                    name: 'project_type'
                },
                {
                    data: 'project_location',
                    name: 'project_location'
                },
                {
                    data: 'project_status',
                    name: 'project_status'
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
        ajax_submit_create('projects');
    }

    $(document).ready(function() {
        // View Form
        $("#manage_all").on("click", ".view", function() {
            var id = $(this).attr('id');
            ajax_submit_view('projects', id)
        });

        // Edit Form
        $("#manage_all").on("click", ".edit", function() {
            var id = $(this).attr('id');
            ajax_submit_edit('projects', id)
        });


        // Delete
        $("#manage_all").on("click", ".delete", function() {
            var id = $(this).attr('id');
            ajax_submit_delete('projects', id)
        });

    });
</script>
@endsection