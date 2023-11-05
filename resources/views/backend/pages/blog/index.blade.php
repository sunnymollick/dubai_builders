@extends('backend.layouts.defaults')
@section('title')
Blogs
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6><i class="lni lni-bootstrap" aria-hidden="true"></i> &nbsp; All Blogs
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
    <div class="col-md-12 col-sm-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="manage_all" class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Author</th>
                            <th>Author Image</th>
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
            ajax: '/admin/getAllBlogs',
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'blog_title', name: 'blog_title'},
                {data: 'blog_description', name: 'blog_description'},
                {data: 'author', name: 'author'},
                {data: 'author_image', name: 'author_image'},
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
        ajax_submit_create('blogs');
    }

    $(document).ready(function () {
        // View Form
        $("#manage_all").on("click", ".view", function () {
            var id = $(this).attr('id');
            ajax_submit_view('blogs', id)
        });

        // Edit Form
        $("#manage_all").on("click", ".edit", function () {
            var id = $(this).attr('id');
            ajax_submit_edit('blogs', id)
        });


        // Delete
        $("#manage_all").on("click", ".delete", function () {
            var id = $(this).attr('id');
            ajax_submit_delete('blogs', id)
        });

    });

</script>
@endsection
