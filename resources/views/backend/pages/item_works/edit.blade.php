<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation" novalidate>
    {{ method_field('PATCH') }}
    <div id="status"></div>
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="">Item/Work <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="item_work" name="item_work" value="{{$item_work->item_work}}" placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-8">
            <label for="">Work Category <span style="color: red;">*</span></label>
            <select class="form-control" name="work_category_id" id="work_category_id" required>
                <option value="">Select Category</option>
                @foreach ($work_categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $item_work->work_category_id ? 'selected' : '' }}>
                    {{ $category->title }}
                </option>
                @endforeach
            </select>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-8 col-sm-8">
            <label for="">Unit <span style="color: red;">*</span></label>
            <select class="form-control" name="unit_id" id="unit_id" required>
                <option value="">Select Unit</option>
                @foreach ($units as $unit)
                <option value="{{ $unit->id }}" {{ $unit->id == $item_work->unit_id ? 'selected' : '' }}>
                    {{ $unit->title }}
                </option>
                @endforeach
            </select>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-8 col-sm-8">
            <label for="">Unit Price<span style="color: red;">*</span></label>
            <input type="number" class="form-control" id="unit_price" name="unit_price" value="{{$item_work->unit_price}}" placeholder="">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="d-grid gap-2 col-md-2">
            <button class="btn btn-primary button-submit" type="submit" data-loading-text="Loading...">
                <i class="fadeIn animated bx bx-save"></i>Update</button>
        </div>

    </div>
</form>

<script>
    $('#table_field').on('click', '#remove', function() {
        $(this).closest('tr').remove();

    });

    $('.button-submit').click(function() {
        // route name and record id
        ajax_submit_update('itemworks', "{{ $item_work->id }}")
    });
</script>