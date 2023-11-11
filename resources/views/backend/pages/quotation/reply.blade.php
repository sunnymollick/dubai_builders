<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation" novalidate>
    <div id="status"></div>
    <div>
        <div id="items">
            <div class="item row" style="margin-bottom: 10px;">
                <input type="text" class="form-control" name="request_id" hidden value="{{$quote->id}}" placeholder="Item Name">
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="item[]" placeholder="Item Name">
                </div>
                <div class="form-group col-md-2">
                    <input type="number" class="form-control" name="quantity[]" placeholder="Quantity">
                </div>
                <div class="form-group col-md-2">
                    <input type="number" class="form-control" name="unit_price[]" placeholder="Unit Price">
                </div>
                <div class="form-group col-md-3">
                    <input type="number" class="form-control" name="total_price[]" placeholder="Total Price" readonly>
                </div>

            </div>
        </div>
        <br>
        <button class="btn btn-primary" type="button" id="addItem">Add Item</button>
        <button class="btn btn-primary button-submit" type="submit" data-loading-text="Loading...">
            <i class="fadeIn animated bx bx-save"></i>Send Quotation</button>




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
                url: 'quotation/store',
                type: 'POST',
                data: myData,
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.type === 'success') {
                        // $('#myModal').modal('hide');
                        swal("Done!", "It was succesfully done!", "success");
                        // reload_table();
                        location.reload();
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#addItem').on('click', function() {
            var newItem = $('.item:first').clone();
            newItem.find('input').val('');
            newItem.find('input[name^="item"]').attr("name", "item[]"); // Ensure new inputs have the correct names
            newItem.find('input[name^="quantity"]').attr("name", "quantity[]");
            newItem.find('input[name^="unit_price"]').attr("name", "unit_price[]");
            newItem.find('input[name^="total_price"]').attr("name", "total_price[]");
            $('#items').append(newItem);
            newItem.append('<button type="button" class="btn btn-danger form-control col removeItem">X</button>');
        });

        $('#items').on('click', '.removeItem', function() {
            if ($('#items .item').length > 1) {
                $(this).closest('.item').remove();
            }
        });

        $('#items').on('input', 'input[name="quantity[]"], input[name="unit_price[]"]', function() {
            var item = $(this).closest('.item');
            var quantity = parseFloat(item.find('input[name="quantity[]"]').val()) || 0;
            var unitPrice = parseFloat(item.find('input[name="unit_price[]"]').val()) || 0;
            var totalPrice = quantity * unitPrice;
            item.find('input[name="total_price[]"]').val(totalPrice);
        });
    });
</script>