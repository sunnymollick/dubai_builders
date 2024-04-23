<style>
    .form-group {
        padding: 4px;
    }
</style>

<form id="create" action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
    class="needs-validation" novalidate>
    <div id="status"></div>
    <input type="text" class="form-control" id="invoice_id" name="invoice_id" hidden value="{{ $invoice->id }}">
    <div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">Invoice Title <span style="color: red;">*</span></label>
                <p></p>
                <input type="text" class="form-control" id="title" name="title" value="{{ $invoice->title }}"
                    placeholder="Enter a invoice title." readonly>
                <span id="error_title" class="has-error"></span>
            </div>
            <div class="form-group col-md-6">
                <label for="">Payment Date </label>
                <p></p>
                <input type="date" class="form-control" id="payment_date" name="payment_date" value=""
                    placeholder="" required>
                <span id="error_title" class="has-error"></span>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6 float-right">
                <label for="">Paying Amount</label>
                <input type="number" class="form-control" min="0" id="amount" name="amount"
                    placeholder="Paying Amount" value="{{ $invoice->grand_total - $invoice->paid_amount }}">
                <span class="error_msg danger"></span>
            </div>
            <div class="form-group col-md-6 float-right">
                <label for="">Payment Method</label>
                <select name="payment_method" id="payment_method" class="form-control">
                    <option value="" selected disabled>Select Payment Method</option>
                    <option value="Cash">Cash</option>
                    <option value="Cheque">Cheque</option>
                    <option value="Card">Card</option>
                </select>
            </div>
        </div>
        <div class="row" id="cheque_portion">
            <div class="form-group col-md-6">
                <label for="">Cheque Date</label>
                <input type="date" name="cheque_date" id="cheque_date" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="">Cheque Number</label>
                <input type="text" name="cheque_number" id="cheque_number" class="form-control" placeholder="Enter Cheque Number">
            </div>
        </div>
        <br>
        <button class="btn btn-primary button-submit" type="submit" data-loading-text="Loading...">
            <i class="fadeIn animated bx bx-save"></i>Submit
        </button>
    </div>
</form>
<script>
    $('#create').on('submit', function(e) {
        e.preventDefault();
        var myData = new FormData($("#create")[0]);
        myData.append('_token', CSRF_TOKEN);

        swal({
            title: "Are you sure to submit?",
            text: "Submit Form",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, Submit!"
        }, function() {
            // console.log('hi');
            $.ajax({
                url: '/admin/invoice_payment_store',
                type: 'POST',
                data: myData,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.type === 'success') {
                        $('#myModal').modal('hide');
                        swal("Done!", "It was succesfully done!", "success");
                        reload_table();
                    } else if (data.type === 'error') {
                        if (data.errors) {
                            $.each(data.errors, function(key, val) {
                                $('#error_' + key).html(val);
                            });
                        }
                        $("#status").html(data.message);
                        swal("Error sending!", "Please fix the errors", "error");
                    }
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#cheque_portion").hide();

        $("#payment_method").change(function(){
            var value = $("#payment_method").val();
            if (value == 'Cheque') {
                $("#cheque_portion").show();
            } else {
                $("#cheque_portion").hide();
            }
        });

    });
</script>
