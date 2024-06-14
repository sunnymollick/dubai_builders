<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
      novalidate>
    <div id="status"></div>
    <div class="container">
        <div class="form-group col-md-12">
            <strong>Name</strong>
            <input type="text" class="form-control" id="app_name" name="app_name" value="{{ old('app_name') }}"
                placeholder="" required>
            <span id="error_app_name" class="text-danger"></span>
        </div>
        <div class="form-group row col-xs-12 col-sm-12 col-md-12">
            <div class="col-md-6">
                <strong>Primary Email</strong>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"
                    placeholder="">
                <span id="error_email" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <strong>Secondary Email</strong>
                <input type="text" class="form-control" id="email_secondary" name="email_secondary" value="{{ old('email_secondary') }}"
                    placeholder="">
                <span id="error_email_secondary" class="text-danger"></span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <strong>Address :</strong>
            <textarea id="address" name="address" class="form-control" placeholder="Enter Primary Address" ></textarea>
            <span id="error_address" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <strong>Secondary Address :</strong>
            <textarea id="address_secondary" name="address_secondary" class="form-control" placeholder="Enter Secondary Address" ></textarea>
            <span id="error_address_secondary" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>
        <div class="form-group row">
            <div class="col-md-6">
                <strong>Contact (Primary)</strong>
                <input type="text" class="form-control" id="phone_1" name="phone_1" value="{{ old('phone_1') }}"
                    placeholder="">
                <span id="error_phone_1" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <strong>Contact (Secondary)</strong>
                <input type="text" class="form-control" id="phone_2" name="phone_2" value="{{ old('phone_2') }}"
                    placeholder="">
                <span id="error_phone_2" class="text-danger"></span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12">
            <strong>Opening Time</strong>
            <input type="text" class="form-control" id="opening_time" name="opening_time" value="{{ old('opening_time') }}"
                placeholder="">
            <span id="error_opening_time" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>
        <p></p>
        <div class="form-group col-md-12">
            <strong>Logo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <img id="logoPreview" src="" alt="upload logo" width="100" height="100">
            <p></p>
            <div class="input-group">
                <input id="app_logo" type="file" name="app_logo" style="display:none">
                <div class="input-group-prepend">
                    <a class="btn btn-primary text-white" onclick="$('input[id=app_logo]').click();">Browse</a>
                </div>
                <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName" value="" readonly>
            </div>
            <span id="error_app_logo" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group row">
            <div class="col-md-6">
                <strong>Facebook:</strong>
                <input type="text" class="form-control" id="fb_link" name="fb_link"
                value="{{ old('fb_link') }}"
                    placeholder="">
                <span id="error_fb_link" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <strong>Twitter:</strong>
                <input type="text" class="form-control" id="twitter_link" name="twitter_link"
                    value="{{ old('twitter_link') }}"
                    placeholder="">
                <span id="error_twitter_link" class="text-danger"></span>
            </div>

        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <strong>Linkedin:</strong>
                <input type="text" class="form-control" id="linkedin_link" name="linkedin_link"
                    value="{{ old('linkedin_link') }}"
                    placeholder="">
                <span id="error_linkedin_link" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <strong>Instagram:</strong>
                <input type="text" class="form-control" id="instragram_link" name="instragram_link"
                    value="{{ old('instragram_link') }}"
                    placeholder="">
                <span id="error_instragram_link" class="text-danger"></span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <strong>GooglePlus:</strong>
            <input type="text" class="form-control" id="dribble_link" name="dribble_link"
                    value="{{ old('dribble_link') }}"
                   placeholder="">
            <span id="error_dribble_link" class="text-danger"></span>
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-6">

        </div>
        <div class="clearfix"></div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <strong>Google Maps</strong>
            <textarea type="text" class="form-control" id="maps" name="maps"
                    placeholder=""></textarea>
            <span id="error_maps" class="text-danger"></span>
            <p class="help-block">Google maps Iframe code here</p>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <strong>Footer Text</strong>
            <textarea type="text" class="form-control" id="footer_text" name="footer_text"
                    placeholder=""></textarea>
            <span id="error_footer_text" class="text-danger"></span>
            <p class="help-block">Enter Footer Text here</p>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1">
            <label class="form-check-label" for="">Is Active </label>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary button-submit"
                    data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Create
            </button>
        </div>
    </div>
</form>

<script>
    $('.button-submit').click(function () {
        // route name
        ajax_submit_store('settings')
    });
</script>

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
            $('#logoPreview').attr('src', '');
        }

        // Update the input field's value for display
        $('#SelectedFileName').val($(this).val());
    });
</script>
