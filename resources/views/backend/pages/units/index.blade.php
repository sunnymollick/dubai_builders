@extends('backend.layouts.defaults')
@section('title')
Units
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6><i class="lni lni-user" aria-hidden="true"></i> &nbsp; All Work Categories
                    <span style="float: right;">
                        <button class="btn btn-primary btn-sm" onclick="create()"><i
                        class="fadeIn animated bx bx-user-plus"></i>
                        Add
                        </button>
                    </span>
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="manage_all" class="align-middle mb-0 table table-borderless table-striped table-hover" style="text-align: center; width: 900px">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
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
    $(function () {
        //alert("alert");
        table = $('#manage_all').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/admin/allWorkCategories',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'title', name: 'title'},
                {data: 'action', name: 'action'},
            ],
            "columnDefs": [
                {"className": "", "targets": "_all"}
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
        ajax_submit_create('workcategories');
    }

    $(document).ready(function () {
        // View Form
        $("#manage_all").on("click", ".view", function () {
            var id = $(this).attr('id');
            ajax_submit_view('workcategories', id)
        });

        // Edit Form
        $("#manage_all").on("click", ".edit", function () {
            var id = $(this).attr('id');
            ajax_submit_edit('workcategories', id)
        });


        // Delete
        $("#manage_all").on("click", ".delete", function () {
            var id = $(this).attr('id');
            ajax_submit_delete('workcategories', id)
        });

    });

</script>
@endsection
