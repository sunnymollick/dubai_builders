<style>
    .form-group {
        padding: 4px;
    }
</style>

<form id="create" action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
    class="needs-validation" novalidate>
    <div id="status"></div>
    <input type="text" class="form-control" name="quotation_id" hidden value="{{ $quote->id }}">
    <div>
        <div class="row">
            <div class="form-group col-md-8">
                <label for="">Invoice Title <span style="color: red;">*</span></label>
                <p></p>
                <input type="text" class="form-control" id="title" name="title" value=""
                    placeholder="Enter a invoice title." required>
                <span id="error_title" class="has-error"></span>
            </div>
            <div class="form-group col-md-4">
                <label for="">Invoice Date </label>
                <p></p>
                <input type="date" class="form-control" id="date" name="invoice_date" value=""
                    placeholder="" required>
                <span id="error_title" class="has-error"></span>
            </div>
        </div>
        <div id="items">
            @foreach ($quotation_details as $qd)
                <div class="item col" style="margin-bottom: 10px;">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="">Category</label>
                            <select disabled class="form-control categorySelect" name="work_category_id[]"
                                id="" required>
                                <option value="">Select Category</option>
                                @foreach ($all_work_categories as $awc)
                                    <option @if ($qd->category_id == $awc->id) selected @endif
                                        value="{{ $awc->id }}">{{ $awc->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="">Item/Work</label>
                            <select class="form-control itemSelect" name="items[]" id="" disabled>
                                <option>Select Item</option>
                                @foreach ($all_items as $ai)
                                    @if ($qd->category_id == $ai->work_category_id)
                                        <option @if ($qd->item_id == $ai->id) selected @endif
                                            value="{{ $ai->id }}">{{ $ai->item_work }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="">Quantity</label>
                            <input type="number" min="0" onkeyup="if(this.value<0){this.value= this.value * -1}"
                                class="form-control quantity" name="quantity[]" value="{{ $qd->quantity }}"
                                placeholder="Quantity">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="">Unit</label>
                            <input type="text" class="form-control unitSelect" id="" name="unit[]"
                                placeholder="Unit" value="{{ $qd->unit }}" readonly>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="">Unit Price</label>
                            <input type="number" min="0" onkeyup="if(this.value<0){this.value= this.value * -1}"
                                class="form-control unitPrice" id="" name="unit_price[]"
                                placeholder="Unit Price" value="{{ $qd->unit_price }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="">Total</label>
                            <input type="number" class="form-control totalPrice" name="total_price[]"
                                placeholder="Total Price" readonly value="{{ $qd->total_price }}">
                        </div>

                        <div class="col-md-1">
                            <br>
                            <button type="button" class="btn btn-danger form-control removeItem">X</button>
                        </div>
                    </div>
                    <hr>

                </div>
            @endforeach
        </div>
        <div class="row col-md-12 d-flex flex-row">
            <div class="form-group col-md-2 float-right">
                <label for="">Paid Amount</label>
                <input type="number" class="form-control" min="0" id="paid_amount" name="paid_amount"
                    placeholder="Paid Amount">
                <span class="error_msg danger"></span>
            </div>
        </div>
        <div class="row col-md-12 d-flex flex-row">
            <div class="form-group col-md-2 float-right">
                <label for="">Grand Total</label>
                <input type="number" class="form-control" min="0" id="grandTotal" name="grand_total"
                    placeholder="Grand Total" readonly>
            </div>
        </div>
        <br>
        <button class="btn btn-primary" type="button" id="addItem">Add Item</button>
        <button class="btn btn-primary button-submit" type="submit" data-loading-text="Loading...">
            <i class="fadeIn animated bx bx-save"></i>Generate Invoice</button>
        <button class="btn btn-primary" type="button" id="preview">
            <i class="fadeIn animated bx bx-save"></i>Preview</button>
    </div>
</form>
<script>
    $('#create').on('submit', function(e) {
        e.preventDefault();
        $('.categorySelect').prop('disabled', false);
        $('.itemSelect').prop('disabled', false);
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
                url: 'request/for/invoice/store',
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

<script>
    $(document).ready(function() {
        // $('.removeItem').hide();
        // Function to initialize event handlers for an item

        // $('.removeItem').on('click', function() {
        //     updateTotalPrice(); // Update total price when an item is removed
        //     updateGrandTotal();
        //     $(this).closest('.item').remove();
        // });

        function initializeItem(item) {
            item.find('.quantity, .unitPrice').on('change', updateTotalPrice);
            item.find('.removeItem').on('click', function() {
                $(this).closest('.item').remove();
                // updateTotalPrice(); // Update total price when an item is removed
                updateGrandTotal();
            });
        }

        $('#preview').on('click', function() {
            var formData = $("#create").serialize();
            $.ajax({
                type: 'GET',
                url: 'request/for/quotation/preview',
                data: formData,
                dataType: 'json',
                cache: false,
                success: function(data) {
                    console.log(data.data);
                    // $("#quotation_data").html(data.html);
                    // // jQuery.noConflict();
                    // $('#previewModal').modal('show'); // show bootstrap modal
                    // $('.quotation-title').text('Quotation');
                },
                error: function(result) {
                    $("#modal_data").html("Sorry Cannot Load Data");
                }
            });
        });


        // Event handler for the "Add Item" button
        $('#addItem').on('click', function() {
            var newItem = $('#items .item:first').clone(); // Clone the first item
            newItem.find('input').val(''); // Clear input values in the cloned item
            newItem.find('.removeItem').show(); // Show remove button for the cloned item
            $('#items').append(newItem); // Append the cloned item to the items container
            initializeItem(newItem); // Initialize event handlers for the new item

            // Enable the cloned item's category dropdown
            newItem.find('.categorySelect').prop('disabled', false);
            // Disable the cloned item's item dropdown initially
            newItem.find('.itemSelect').prop('disabled', false);
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

        // Event handler for updating total price when quantity or unit price changes
        $('#items').on('input', '.quantity, .unitPrice', function() {
            updateTotalPrice($(this).closest('.item'));
            updateGrandTotal(); // Update grand total when quantity or unit price changes
        });

        // Event handler for updating grand total when tax or discount changes
        $('#tax, #discount_percentage, #discount_amount,#paid_amount').on('input', function() {
            updateGrandTotal();
        });

        // Function to update grand total based on the subtotal of each item, tax, and discount
        function updateGrandTotal() {
            // console.log('Updating grand total...');
            // console.log('hi');
            var grandTotal = 0;
            $('.totalPrice').each(function() {
                grandTotal += parseFloat($(this).val()) || 0;
            });

            var tax = parseFloat($('#tax').val()) || 0;
            var discountPercentage = parseFloat($('#discount_percentage').val()) || 0;
            var discountAmount = parseFloat($('#discount_amount').val()) || 0;
            var paidAmount = parseFloat($('#paid_amount').val()) || 0;

            // console.log('Tax:', tax);
            // console.log('Discount Percentage:', discountPercentage);
            // console.log('Discount Amount:', discountAmount);

            // Apply tax to the grand total
            grandTotal = grandTotal + (grandTotal * tax) / 100;

            // Calculate discount based on either discountPercentage or discountAmount
            var discount = discountPercentage ? (grandTotal * discountPercentage) / 100 : discountAmount;

            // Subtract discount from the grand total
            grandTotal = grandTotal - discount - paidAmount;

            // console.log('Grand Total:', grandTotal);
            if (grandTotal >= 0) {
                $('#grandTotal').val(grandTotal.toFixed(2));
            } else {
                swal({
                    title: "Warning!",
                    text: "Paid amount cannot be greater than grand total!",
                    type: "warning",
                    showCancelButton: false,
                    closeOnConfirm: true,
                    showLoaderOnConfirm: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "ok"
                }, function() {
                    $('#paid_amount').val(0);
                    updateGrandTotal();
                });
            }

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
                url: 'request/for/quotation/fetch-items/' + categoryId,
                type: 'GET',
                success: function(data) {
                    // Clear existing options
                    itemSelect.empty();
                    itemSelect.append('<option>Select Item</option>')
                    // Add items based on the fetched data
                    if (data.items && data.items.length > 0) {
                        $.each(data.items, function(index, item) {

                            itemSelect.append('<option value="' + item.id +
                                '" data-unit="' + item.unit.title +
                                '" data-unit-price="' + item.unit_price +
                                '">' +
                                item.item_work + '</option>');
                        });

                        // Set the unit and unit price based on the selected item
                        var selectedItem = itemSelect.find(':selected');

                        var unit = selectedItem.data('unit');
                        var unitPrice = selectedItem.data('unit-price');
                        // console.log(unitPrice);
                        unitInput.val(unit);
                        unitPriceInput.val(unitPrice);
                    } else {
                        itemSelect.append('<option value="">No items found</option>');
                        unitInput.val('');
                        unitPriceInput.val('');
                    }
                },
                error: function(error) {
                    // console.log(error);
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

        function calculateGrandTotal() {
            var total_price_sum = 0;
            $('.totalPrice').each(function() {
                var totalPrice = parseFloat($(this).val());
                if (!isNaN(totalPrice)) {
                    total_price_sum += totalPrice;
                    // console.log('tp=' + total_price_sum);
                }
            });
            $('#grandTotal').val(total_price_sum.toFixed(2));
        }
        calculateGrandTotal();

    });
</script>
