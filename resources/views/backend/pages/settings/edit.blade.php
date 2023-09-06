<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div id="status"></div>
    {{method_field('PATCH')}}
    <div class="container">
        <div class="form-group col-md-12">
            <strong>Name</strong>
            <input type="text" class="form-control" id="app_name" name="app_name" value="{{ $setting->app_name }}"
                   placeholder="" required>
            <span id="error_app_name" class="text-danger"></span>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <strong>Email</strong>
            <input type="text" class="form-control" id="email" name="email" value="{{ $setting->email }}"
                   placeholder="">
            <span id="error_email" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <strong>Address:</strong>
            <input type="text" class="form-control" id="address" name="address" value="{{ $setting->address }}"
                   placeholder="">
            <span id="error_address" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>
        <div class="form-group row">
            <div class="col-md-6">
                <strong>Contact (Primary)</strong>
                <input type="text" class="form-control" id="phone_1" name="phone_1" value="{{ $setting->phone_1 }}"
                    placeholder="">
                <span id="error_phone_1" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <strong>Contact (Secondary)</strong>
                <input type="text" class="form-control" id="phone_2" name="phone_2" value="{{ $setting->phone_2 }}"
                    placeholder="">
                <span id="error_phone_2" class="text-danger"></span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12">
            <strong>Opening Time</strong>
            <input type="text" class="form-control" id="opening_time" name="opening_time" value="{{ $setting->opening_time }}"
                placeholder="">
            <span id="error_opening_time" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>
        <p></p>
        <div class="form-group col-md-12">
            <strong>Logo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <img id="logoPreview" src="{{ asset($setting->app_logo) }}" alt="Current Logo" width="100" height="100">
            <p></p>
            <div class="input-group">
                <input id="app_logo" type="file" name="app_logo" style="display:none">
                <div class="input-group-prepend">
                    <a class="btn btn-primary text-white" onclick="$('input[id=app_logo]').click();">Browse</a>
                </div>
                <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName" value="{{$setting->app_logo}}" readonly>
            </div>
            <span id="error_app_logo" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group row">
            <div class="col-md-6">
                <strong>Facebook:</strong>
                <input type="text" class="form-control" id="fb_link" name="fb_link"
                    value="{{ $setting->fb_link }}"
                    placeholder="">
                <span id="error_fb_link" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <strong>Twitter:</strong>
                <input type="text" class="form-control" id="twitter_link" name="twitter_link"
                    value="{{ $setting->twitter_link }}"
                    placeholder="">
                <span id="error_twitter_link" class="text-danger"></span>
            </div>

        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <strong>Linkedin:</strong>
                <input type="text" class="form-control" id="linkedin_link" name="linkedin_link"
                    value="{{ $setting->linkedin_link }}"
                    placeholder="">
                <span id="error_linkedin_link" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <strong>Instagram:</strong>
                <input type="text" class="form-control" id="instragram_link" name="instragram_link"
                    value="{{ $setting->instragram_link }}"
                    placeholder="">
                <span id="error_instragram_link" class="text-danger"></span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <strong>GooglePlus:</strong>
            <input type="text" class="form-control" id="dribble_link" name="dribble_link"
                   value="{{ $setting->dribble_link }}"
                   placeholder="">
            <span id="error_dribble_link" class="text-danger"></span>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-6">

        </div>
        <div class="clearfix"></div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <strong>Google Maps</strong>
            <textarea type="text" class="form-control" id="maps" name="maps"
                      placeholder="">{{ $setting->maps }}</textarea>
            <span id="error_maps" class="text-danger"></span>
            <p class="help-block">Google maps Iframe code here</p>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <strong>Footer Text</strong>
            <textarea type="text" class="form-control" id="footer_text" name="footer_text"
                      placeholder="">{{ $setting->footer_text }}</textarea>
            <span id="error_footer_text" class="text-danger"></span>
            <p class="help-block">Enter Footer Text here</p>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary button-submit"
                    data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Update
            </button>
        </div>
    </div>
</form>
<script type="text/javascript">
    $('input[id=app_logo]').change(function () {
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
            $('#logoPreview').attr('src', '{{ asset($setting->app_logo) }}');
        }

        // Update the input field's value for display
        $('#SelectedFileName').val($(this).val());
    });
</script>
<script>
    $('.button-submit').click(function () {
        // route name and record id
        ajax_submit_update('settings', "{{ $setting->id }}")
    });
</script>
