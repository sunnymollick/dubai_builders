<form id="create" action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation" novalidate>
    <div id="status"></div>
    <div>
        <div id="items">
            <div class="item col" style="margin-bottom: 10px;">
                <input type="text" class="form-control" name="request_id" hidden value="{{$quote->id}}">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="">Category</label>
                        <select class="form-control categorySelect" name="work_category_id" id="" required>
                            <option value="">Select Category</option>
                            @foreach ($work_categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Item/Work</label>
                        <select class="form-control itemSelect" name="items[]" id="" disabled>
                            <option value="">Select Item</option>
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description[]" placeholder="Description here...">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control quantity" name="quantity[]" placeholder="Quantity">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="">Unit</label>
                        <input type="text" class="form-control unitSelect" id="" name="unit[]" placeholder="Unit" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Unit Price</label>
                        <input type="number" class="form-control unitPrice" id="" name="unit_price[]" placeholder="Unit Price">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Total</label>
                        <input type="number" class="form-control totalPrice" name="total_price[]" placeholder="Total Price" readonly>
                    </div>
                    <div class="col-md-1">
                        <br>
                        <button type="button" class="btn btn-danger form-control removeItem">X</button>
                    </div>
                </div>
                <br>
            </div>
        </div>

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
        $('.removeItem').hide();
        // Function to initialize event handlers for an item
        function initializeItem(item) {
            item.find('.quantity, .unitPrice').on('change', updateTotalPrice);
            item.find('.removeItem').on('click', function() {
                $(this).closest('.item').remove();
                updateTotalPrice(); // Update total price when an item is removed
            });
        }

        // Event handler for the "Add Item" button
        $('#addItem').on('click', function() {
            var newItem = $('#items .item:first').clone(); // Clone the first item
            newItem.find('input').val(''); // Clear input values in the cloned item
            newItem.find('.removeItem').show(); // Show remove button for the cloned item
            $('#items').append('<hr>');
            $('#items').append(newItem); // Append the cloned item to the items container
            initializeItem(newItem); // Initialize event handlers for the new item

            // Enable the cloned item's category dropdown
            newItem.find('.categorySelect').prop('disabled', false);
            // Disable the cloned item's item dropdown initially
            newItem.find('.itemSelect').prop('disabled', true);
        });

        // Initialize event handlers for the initial item
        initializeItem($('#items .item:first'));

        // Event handler for updating total price when quantity changes
        $('#items').on('input', '.quantity', function() {
            updateTotalPrice($(this).closest('.item'));
        });

        // Function to update total price based on quantity and unit price
        function updateTotalPrice(item) {
            var quantity = parseFloat(item.find('.quantity').val()) || 0;
            var unitPrice = parseFloat(item.find('.unitPrice').val()) || 0;
            var totalPrice = quantity * unitPrice;
            item.find('.totalPrice').val(totalPrice.toFixed(2));
        }

        // Event handler for updating item dropdown based on the selected category
        $('#items').on('change', '.categorySelect', function() {
            var categoryId = $(this).val();
            var itemSelect = $(this).closest('.item').find('.itemSelect');
            var unitInput = $(this).closest('.item').find('.unitSelect');
            var unitPriceInput = $(this).closest('.item').find('.unitPrice');
            // Enable the item dropdown
            itemSelect.prop('disabled', false);

            // Fetch items based on the selected category using Ajax
            $.ajax({
                url: 'quotation/fetch-items/' + categoryId,
                type: 'GET',
                success: function(data) {
                    // Clear existing options
                    itemSelect.empty();
                    itemSelect.append('<option>Select Item</option>')
                    // Add items based on the fetched data
                    if (data.items && data.items.length > 0) {
                        $.each(data.items, function(index, item) {

                            itemSelect.append('<option value="' + item.id + '" data-unit="' + item.unit.title + '" data-unit-price="' + item.unit_price + '">' + item.item_work + '</option>');
                        });

                        // Set the unit and unit price based on the selected item
                        var selectedItem = itemSelect.find(':selected');

                        var unit = selectedItem.data('unit');
                        var unitPrice = selectedItem.data('unit-price');
                        console.log(unitPrice);
                        unitInput.val(unit);
                        unitPriceInput.val(unitPrice);
                    } else {
                        itemSelect.append('<option value="">No items found</option>');
                        unitInput.val('');
                        unitPriceInput.val('');
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        // Event handler for updating item dropdown based on the selected category
        $('#items').on('change', '.itemSelect', function() {
            var itemSelect = $(this);
            var unitInput = itemSelect.closest('.item').find('.unitSelect');
            var unitPriceInput = itemSelect.closest('.item').find('.unitPrice');

            var selectedItem = itemSelect.find(':selected');
            var unit = selectedItem.data('unit');
            var unitPrice = selectedItem.data('unit-price');

            // Set the unit and unit price based on the selected item
            unitInput.val(unit);
            unitPriceInput.val(unitPrice);
        });

    });
</script>