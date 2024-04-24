<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="manage_all" class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Payment Date</th>
                                <th>Paid Amount</th>
                                <th>Payment Method</th>
                                <th>Cheque Date</th>
                                <th>Cheque Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($invoice_payments as $payment)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $payment->payment_date }}</td>
                                    <td>{{ $payment->paid_amount }}</td>
                                    <td>{{ $payment->payment_method }}</td>
                                    <td>{{ $payment->cheque_date }}</td>
                                    <td>{{ $payment->cheque_number }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

