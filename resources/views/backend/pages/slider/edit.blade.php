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
                <strong>Video: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                <video id="logoPreview" src="{{ asset($slider->video) }}" height="100px" width="150px" autoplay></video>
                <p></p>
                <div class="input-group">
                    <input id="video" type="file" name="video" style="display:none">
                    <div class="input-group-prepend">
                        <a class="btn btn-primary text-white" onclick="$('input[id=video]').click();">Browse</a>
                    </div>
                    <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName"
                        value="{{ $slider->video }}" readonly>
                </div>
                <span>Video resolution must be 1080p </span>
                <span id="error_video" class="text-danger"></span>
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
    $('.button-submit').click(function () {
        // route name and record id
        ajax_submit_update('sliders', "{{ $slider->id }}")
    });
</script>


<script type="text/javascript">
    $('input[id=video]').change(function () {
        // Get the selected file
        var file = this.files[0];

        // Check if a file is selected
        if (file) {
            // Create a FileReader to read the selected file
            var reader = new FileReader();

            // Set up the FileReader onload event to update the image preview
            reader.onload = function (e) {
                $('#logoPreview').attr('src', e.target.result);
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        } else {
            // If no file is selected, revert to the current logo
            $('#logoPreview').attr('src', '');
        }

        // Update the input field's value for display
        $('#SelectedFileName').val($(this).val());
    });
</script>