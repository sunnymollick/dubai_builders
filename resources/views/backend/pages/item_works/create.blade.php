<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
    class="needs-validation" novalidate>
    <div id="status"></div>
    <div class="form-row">

        <div class="form-group col-md-8">
            <label for="">Item/Work <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="item_work" name="item_work" value=""
                placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-8">
            <label for="">Work Category <span style="color: red;">*</span></label>
            <select class="form-control" name="work_category_id" id="work_category_id" required>
                <option value="">Select Category</option>
                @foreach ($work_categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
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
                    <option value="{{ $unit->id }}">{{ $unit->title }}</option>
                @endforeach
            </select>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-8 col-sm-8">
            <label for="">Unit Price<span style="color: red;">*</span></label>
            <input type="number" class="form-control" id="unit_price" name="unit_price" value="" placeholder="" >
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="d-grid gap-2 col-md-2">
            <button class="btn btn-primary button-submit" type="submit" data-loading-text="Loading...">
                <i class="fadeIn animated bx bx-save"></i>Save</button>
        </div>

    </div>
</form>

<script>
    $('.button-submit').click(function() {
        // route name
        ajax_submit_store('itemworks')
    });
</script>
