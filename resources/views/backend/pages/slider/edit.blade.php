<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
    class="needs-validation" novalidate>
    {{method_field('PATCH')}}
    <div id="status"></div>
    <div class="form-row">

        <div class="row">
            <div class="form-group col-md-6">
                <label for="">Title <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="title" name="title" value="{{$slider->title}}" placeholder="Enter a video title"
                    required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
        <br> --}}

            <div class="form-group col-md-6">
                <label for="">Description </label>
                <input type="text" class="form-control" id="description" name="description" value="{{$slider->description}}"
                    placeholder="Enter a video description">
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
        <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <video src="{{asset($slider->video)}}" height="100px" width="150px" autoplay></video>
                <br>
                <label for="">Video <span style="color: red;">*</span></label>
                <input type="file" class="form-control" id="video" name="video" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}

            <div class="form-group col-md-6 mt-2">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active"@if ($slider->is_active)
                    checked
                @endif value="1">
                <label class="form-check-label" for="">Is Active </label>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
        <br> --}}
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
        ajax_submit_store('sliders')
    });
</script>
