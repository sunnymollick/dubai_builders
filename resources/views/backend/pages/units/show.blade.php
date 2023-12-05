<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
      novalidate>
    <div id="status"></div>
    <div class="form-row">

        <div class="form-group col-md-12">
            <label for="">Unit Name <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $unit->title }}"
                   placeholder="" readonly>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

    </div>
</form>

