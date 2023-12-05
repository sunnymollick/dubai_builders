<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
      novalidate>
    <div id="status"></div>
    <div class="form-row">

        <div class="form-group col-md-6">
            <label for="">Unit Title <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="title" name="title" value=""
                   placeholder="" required>
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

    $('.button-submit').click(function () {
        // route name
        ajax_submit_store('units')
    });


</script>
