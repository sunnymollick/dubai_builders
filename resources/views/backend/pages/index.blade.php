@extends('backend.layouts.defaults')
@section('title')
Dashboard
@endsection
@section('content')

<!--start page wrapper -->
<div class="row row-cols-1 row-cols-lg-4">
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-cosmic">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Total Project</p>
                        <h5 class="mb-0 text-white">{{ $running_project }}</h5>
                    </div>
                    <div class="ms-auto text-white"><i class='bx bx-cart font-30'></i>
                    </div>
                </div>
                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 46%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-burning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white" style="font-size: 12px;">Quotation Request Pending</p>
                        <h5 class="mb-0 text-white">{{ $pending_quotation_request }}</h5>
                    </div>
                    <div class="ms-auto text-white"><i class='bx bx-wallet font-30'></i>
                    </div>
                </div>
                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 72%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-Ohhappiness">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Total Clients</p>
                        <h5 class="mb-0 text-white">{{ $total_customers }}</h5>
                    </div>
                    <div class="ms-auto text-white"><i class='bx bx-bulb font-30'></i>
                    </div>
                </div>
                <div class="progress bg-white-2 radius-10 mt-4" style="height:4.5px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 68%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 overflow-hidden bg-gradient-moonlit">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Job Application Pending</p>
                        <h5 class="mb-0 text-white">{{ $job_application }}</h5>
                    </div>
                    <div class="ms-auto text-white"><i class='bx bx-chat font-30'></i>
                    </div>
                </div>
                <div class="progress  bg-white-2 radius-10 mt-4" style="height:4.5px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 66%"></div>
                </div>
            </div>
        </div>
    </div>
</div><!--end row-->


<div class="card radius-10">
    <div class="card-header border-bottom-0 bg-transparent">
        <div class="d-flex align-items-center">
            <div>
                <h5 class="font-weight-bold mb-0">Recent Projects</h5>
            </div>
            <div class="ms-auto">
                <button type="button" class="btn btn-white radius-10">View More</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table mb-0 align-middle">
                <thead>
                    <tr>
                        <th>Project Title</th>
                        <th>Customer</th>
                        <th>Project Code</th>
                        <th>Project Type</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nike Sports NK</td>
                        <td>Mitchell Daniel</td>
                        <td>#9668521</td>
                        <td>$99.85</td>
                        <td><a href="javaScript:;" class="btn btn-sm btn-success radius-30">Delivered</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--end page wrapper -->

@endsection
@section('scripts')
<script src="{{asset('backend')}}/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script src="{{asset('backend')}}/js/index3.js"></script>
<script>
    new PerfectScrollbar('.best-selling-products');
    new PerfectScrollbar('.recent-reviews');
    new PerfectScrollbar('.support-list');
</script>
@endsection
