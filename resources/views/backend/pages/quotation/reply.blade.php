<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation" novalidate>
    <div id="status"></div>
    <div>
        <div id="items">
            <div class="item col" style="margin-bottom: 10px;">
                <input type="text" class="form-control" name="request_id" hidden value="{{$quote->id}}" placeholder="Item Name">
                <div class="row">
                    <div class="form-group col-md-3">
                        <select class="form-control" name="work_category_id" id="categorySelect" required>
                            <option value="">Select Category</option>
                            @foreach ($work_categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <select class="form-control" name="items[]" id="itemSelect" disabled>
                            <option value="">Select Item</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <textarea class="form-control" name="description[]" placeholder="Description here..." id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group col-md-3">
                        <input type="number" class="form-control" name="quantity[]" placeholder="Quantity">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="text" id="unitSelect" class="form-control" name="unit[]" placeholder="Unit">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="number" id="unitPrice" class="form-control" name="unit_price[]" placeholder="Unit Price">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="number" class="form-control" name="total_price[]" placeholder="Total Price" readonly>
                    </div>
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
        // Example: Use AJAX to fetch items based on selected category
        $('#categorySelect').change(function(e) {
            e.preventDefault();
            var categoryId = $(this).val();

            if (categoryId !== '') {
                // Make an AJAX request to fetch items and details for the selected category
                $.ajax({
                    url: 'quotation/fetch-items/' + categoryId,
                    type: 'GET',
                    success: function(data) {
                        // Update item dropdown with fetched items and details
                        var itemSelect = $('#itemSelect');
                        itemSelect.prop('disabled', false).empty();

                        if (data.items.length > 0) {
                            $('#itemSelect').html('<option value="">Select Item</option>')
                            $.each(data.items, function(index, item) {
                                itemSelect.append('<option value="' + item.id + '" data-unit="' + item.unit.title + '" data-unit-price="' + item.unit_price + '">' + item.item_work + '</option>');
                            });

                            // Set default item details based on the first item
                            updateItemDetails(data.items[0]);
                        } else {
                            itemSelect.append('<option value="">No items found</option>');
                            resetItemDetails();
                        }
                    }
                });
            } else {
                // If no category is selected, disable and reset the item dropdown
                $('#itemSelect').prop('disabled', true).empty().append('<option value="">Select Item</option>');
                resetItemDetails();
            }
        });

        // When an item is selected, update the unit and unit_price fields
        $('#itemSelect').change(function() {
            var selectedItem = $(this).find(':selected');
            var unit = selectedItem.data('unit');
            var unitPrice = selectedItem.data('unit-price');

            $('#unitSelect').val(unit);
            $('#unitPrice').val(unitPrice);
        });
        // Function to reset the unit and unit_price fields
        function resetItemDetails() {
            $('#unitSelect').val('');
            $('#unitPrice').val('');
        }
        $('#addItem').on('click', function() {
            var newItem = $('.item:first').clone();
            newItem.find('input').val('');
            $('#items').append(newItem);
            newItem.append('<br><div class="col-md-1"><button type="button" class="btn btn-danger form-control removeItem">X</button></div>');
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