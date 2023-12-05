<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation" novalidate>
    <div id="status"></div>
    <div class="form-row">

        <div class="form-group col-md-8">
            <label for="">Item/Work </label>
            <input type="text" class="form-control" id="item_work" name="item_work" value="{{$item_work->item_work}}"
                placeholder="" readonly>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-8">
            <label for="">Work Category </label>
            <input type="text" class="form-control" id="work_category_id" name="work_category_id" value="{{$item_work->workcategory->title}}"
                placeholder="" readonly>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-8 col-sm-8">
            <label for="">Unit </label>
            <input type="text" class="form-control" id="unit_id" name="unit_id" value="{{$item_work->unit->title}}" placeholder=""  readonly>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-8 col-sm-8">
            <label for="">Unit Price</label>
            <input type="number" class="form-control" id="unit_price" name="unit_price" value="{{$item_work->unit_price}}" placeholder=""  readonly>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

    </div>
</form>