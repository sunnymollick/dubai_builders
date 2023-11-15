<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
    novalidate>
    {{method_field('PATCH')}}
    <div id="status"></div>
    <div class="form-row">

        <div class="form-group col-md-12">
            <label for="">Category Name <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $work_category->title }}"
                   placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="d-grid gap-2">
            <button class="btn btn-primary button-submit" type="submit" data-loading-text="Loading...">
                <i class="fadeIn animated bx bx-save"></i>Update</button>
        </div>

    </div>
</form>

<script>

    $('#table_field').on('click', '#remove', function(){
        $(this).closest('tr').remove();

    });

    $('.button-submit').click(function () {
        // route name and record id
        ajax_submit_update('workcategories', "{{ $work_category->id }}")
    });




</script>
