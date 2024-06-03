<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
    class="needs-validation" novalidate>
    <div id="status">
    </div>
    <div class="form-row">
        <input type="hidden" name="job_id" value="{{$job_app->id}}">

        <div class="row">
            <div class="form-group col-md-12 col-sm-12 mt-2">
                <label for="">Message <span style="color: red;">*</span></label>
                <textarea type="text" class="form-control" id="message" name="message" value="" placeholder="Give a message to your candidate"
                    required></textarea>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
        <br> --}}
        </div>

        
        <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <label for="">Interview Date <span style="color: red;">*</span></label>
                <input type="date" class="form-control" id="int_date" name="int_date" required>
                <span id="error_title" class="has-error"></span>
            </div>
            <div class="clearfix"></div>
            <br>

        </div>


        <div class="d-grid gap-2 mt-2">
            <button class="btn btn-primary button-submit" value="ignore" formnovalidate type="submit"
                data-loading-text="Loading...">
                <i class="fadeIn animated bx bx-save"></i>Save</button>
        </div>

    </div>
</form>

<script>
    $('.button-submit').click(function() {
        // route name
        ajax_submit_store('job_application/reply/store')
    });
</script>
