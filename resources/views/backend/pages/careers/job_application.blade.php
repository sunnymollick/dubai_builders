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
                                    <th>Status</th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for PDF Viewer -->
        <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pdfModalLabel">PDF Viewer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe id="pdfIframe" src="" style="width: 100%; height: 500px;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
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
                        data: 'is_replied',
                        name: 'is_replied'
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
                        targets: [1, 8, 4, 5]
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
        $(document).ready(function() {
            // View Form
            $("#manage_all").on("click", ".view", function() {
                var id = $(this).attr('id');
                ajax_submit_view('careers', id)
            });

            $("#manage_all").on("click", ".reply", function() {
                var id = $(this).attr('id');
                $("#modal_data").empty();
                $('.modal-title').text('Edit data');

                $.ajax({
                    url: '/admin/job_application/reply/' + id,
                    type: 'get',
                    success: function(data) {
                        $("#modal_data").html(data.html);
                        $('#myModal').modal('show'); // show bootstrap modal
                    },
                    error: function(result) {
                        $("#modal_data").html("Sorry Cannot Load Data");
                    }
                });
            });

            // Edit Form
            // $("#manage_all").on("click", ".reply", function() {
            //     var id = $(this).attr('id');
            //     swal({
            //         title: "Are you sure?",
            //         text: "Candidate will get a reply!!",
            //         type: "warning",
            //         showCancelButton: true,
            //         closeOnConfirm: false,
            //         showLoaderOnConfirm: true,
            //         showCancelButton: true,
            //         confirmButtonClass: "btn-danger",
            //         confirmButtonText: "Send"
            //     }, function() {
            //         $.ajax({
            //             url: 'job_application/reply' + '/' + id,
            //             type: 'POST',
            //             headers: {
            //                 "X-CSRF-TOKEN": CSRF_TOKEN,
            //             },
            //             "dataType": 'json',
            //             success: function(data) {
            //                 if (data.type === 'success') {
            //                     swal("Done!", "Successfully sent reply", "success");
            //                     location.reload();
            //                 } else if (data.type === 'danger') {
            //                     swal("Error sending reply!", "Try again", "error");
            //                 }
            //             },
            //             error: function(xhr, ajaxOptions, thrownError) {
            //                 swal("Error sending reply!", "Try again", "error");
            //             }
            //         });
            //     });
            // });


            // Delete
            $("#manage_all").on("click", ".delete", function() {
                var id = $(this).attr('id');
                ajax_submit_delete('careers', id)
            });

            $('#manage_all tbody').on('click', '.cv-link', function(e) {
                e.preventDefault();
                var pdfLink = $(this).data('pdf');
                $('#pdfIframe').attr('src', pdfLink);
                $('#pdfModal').modal('show');
            });

            $('#pdfModal .close').on('click', function() {
                $('#pdfIframe').attr('src', ''); // Clear the iframe src when the modal is closed
                $('#pdfModal').modal('hide');
            });
        });
    </script>
@endsection
