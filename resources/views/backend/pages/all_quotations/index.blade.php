@extends('backend.layouts.defaults')
@section('title')
Projects
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6><i class="lni lni-user" aria-hidden="true"></i> &nbsp; All Quotations
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
                                <th>Company Name</th>
                                <th>Client Name</th>
                                <th>Project Type</th>
                                <th>Location</th>
                                <th>Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($quotation_requests as $row)
                            <tr>
                                <td><b> {{ $i++ }} </b></td>
                                <td><b> {{ $row->company_name }} </b></td>
                                <td><b> {{ $row->name }} </b></td>
                                <td><b> {{ $row->project_type }} </b></td>
                                <td><b> {{ $row->location }} </b></td>
                                <td>
                                    <a data-toggle="tooltip" id="{{ $row->id }}" class="btn btn-success mr-1 view" title="View"><i class="lni lni-eye"></i> </a>
                                    <a data-toggle="tooltip" href="{{URL('admin/all-quotations/generate-pdf/'.$row->id)}}" id="{{ $row->id }}" class="btn btn-info mr-1" title="Invoice"><i class="lni lni-printer"></i> </a>
                                    <a data-toggle="tooltip" id="{{ $row->id }}" class="btn btn-warning delete" title="Save"><i class="lni lni-checkmark-circle"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
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
        });
        $('.dataTables_filter input[type="search"]').attr('placeholder', 'Type here to search...').css({
            'width': '220px',
            'height': '30px'
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        // Edit Form
        $("#manage_all").on("click", ".generate_invoice", function() {
            var id = $(this).attr('id');
            console.log(id);
            $.ajax({
                url: 'generate_invoice' + '/' + id,
                type: 'get',
                success: function(data) {
                    console.log(data);
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

    $(document).ready(function() {
        // View Form
        $("#manage_all").on("click", ".view", function() {
            var id = $(this).attr('id');
            $.ajax({
                url: 'all-quotations/view' + '/' + id,
                type: 'get',
                success: function(data) {
                    $("#modal_data").html(data.html);
                    $('.modal-title').text('Quotation');
                    $('#myModal').modal('show'); // show bootstrap modal
                },
                error: function(result) {
                    $("#modal_data").html("Sorry Cannot Load Data");
                }
            });

        });




        // Delete
        $("#manage_all").on("click", ".delete", function() {
            var id = $(this).attr('id');
            swal({
                title: "Done!",
                text: "Saved in Projects!",
                icon: "success"
            }, function() {
                $.ajax({
                    url: 'all-quotations/save' + '/' + id,
                    type: 'Delete',
                    headers: {
                        "X-CSRF-TOKEN": CSRF_TOKEN,
                    },
                    "dataType": 'json',
                    success: function(data) {
                        if (data.type === 'success') {
                            swal("Done!", "Successfully Saved in Projects", "success");
                            location.reload();
                        } else if (data.type === 'danger') {
                            swal("Error saving!", "Try again", "error");
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal("Error saving!", "Try again", "error");
                    }
                });
            });
        });

    });
</script>
@endsection