<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
    class="needs-validation" novalidate>
    <div id="status"></div>
    <div class="form-row">

        <div class="row">
            <div class="form-group col-md-12">
                <label for="">Service Title <span style="color: red;">*</span></label>
                <p></p>
                <input type="text" class="form-control" id="title" name="service_title" value=""
                    placeholder="" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div> --}}
            {{-- <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-12 col-sm-12 mt-2">
                <label for="">Service Details <span style="color: red;">*</span></label>
                <p></p>
                <textarea type="text" class="form-control" id="details" name="service_details" value="" placeholder=""
                    required></textarea>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <label for="">Slogan <span style="color: red;">*</span></label>
                <p></p>
                <input type="text" class="form-control" id="slogan" name="slogan" value="" placeholder=""
                    required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div> --}}
            {{-- <br> --}}

            <div class="form-group col-md-6 col-sm-12 mt-2">
                <strong>Thumbnail Image: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                <img id="thumbPreview" src="" alt="Thumbnail Image" height="150">
                <p></p>
                <div class="input-group">
                    <input id="thumb_image" type="file" name="thumb_image" style="display:none">
                    <div class="input-group-prepend">
                        <a class="btn btn-primary text-white" onclick="$('input[id=thumb_image]').click();">Browse</a>
                    </div>
                    <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName"
                        value="" readonly>
                </div>
                <span>Image Size Must Be 370 × 340 (width - height) </span>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <strong>Hero Image: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                <img id="heroPreview" src="" alt="Hero Image" height="150">
                <p></p>
                <div class="input-group">
                    <input id="hero_image" type="file" name="hero_image" style="display:none">
                    <div class="input-group-prepend">
                        <a class="btn btn-primary text-white" onclick="$('input[id=hero_image]').click();">Browse</a>
                    </div>
                    <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName"
                        value="" readonly>
                </div>
                <span>Image Size Must Be 770 × 480 (width - height) </span>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}

            <div class="form-group col-md-6 col-sm-12 mt-2">
                <strong>First Image: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                <img id="firstImagePreview" src="" alt="First Image" height="150">
                <p></p>
                <div class="input-group">
                    <input id="image_1" type="file" name="image_1" style="display:none">
                    <div class="input-group-prepend">
                        <a class="btn btn-primary text-white" onclick="$('input[id=image_1]').click();">Browse</a>
                    </div>
                    <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName"
                        value="" readonly>
                </div>
                <span>Image Size Must Be 370 × 260 (width - height) </span>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <strong>Second Image: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                <img id="secondImagePreview" src="" alt="Second Image" height="150">
                <p></p>
                <div class="input-group">
                    <input id="image_2" type="file" name="image_2" style="display:none">
                    <div class="input-group-prepend">
                        <a class="btn btn-primary text-white" onclick="$('input[id=image_2]').click();">Browse</a>
                    </div>
                    <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName"
                        value="" readonly>
                </div>
                <span>Image Size Must Be 370 × 260 (width - height) </span>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}

            <div class="form-group col-md-6 col-sm-12 mt-2">
                <strong>Logo : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                <img id="logoPreview" src="" alt="Logo" height="150">
                <p></p>
                <div class="input-group">
                    <input id="logo" type="file" name="logo" style="display:none">
                    <div class="input-group-prepend">
                        <a class="btn btn-primary text-white" onclick="$('input[id=logo]').click();">Browse</a>
                    </div>
                    <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName"
                        value="" readonly>
                </div>
                <span>Image Size Must Be 73 × 73 (width - height) </span>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <strong>Home Image : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                <img id="homePreview" src="" alt="Home Image" height="150">
                <p></p>
                <div class="input-group">
                    <input id="home_image" type="file" name="home_image" style="display:none">
                    <div class="input-group-prepend">
                        <a class="btn btn-primary text-white" onclick="$('input[id=home_image]').click();">Browse</a>
                    </div>
                    <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName"
                        value="" readonly>
                </div>
                <span>Image Size Must Be 215 × 220 (width - height) </span>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
        <br> --}}

            <div class="form-group col-md-6 col-sm-12 mt-2">
                <label for="">Video Link <span style="color: red;">*</span></label>
                <p></p>
                <input type="text" class="form-control" id="video_link" name="video_link" value=""
                    placeholder="" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
        <br> --}}
        </div>

        <div class="d-grid gap-2 mt-2">
            <button class="btn btn-primary button-submit" type="submit" data-loading-text="Loading...">
                <i class="fadeIn animated bx bx-save"></i>Save</button>
        </div>

    </div>
</form>

<script>
    $('.button-submit').click(function() {
        // route name
        ajax_submit_store('services')
    });
</script>


<script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('details', {
        filebrowserBrowseUrl: '{{ asset('backend') }}/ckeditor/filemanager/browser/default/browser.html?Connector={{ asset('backend') }}/ckeditor/filemanager/connectors/php/connector.php',
        filebrowserImageBrowseUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=' +
            '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/connector.php',
        filebrowserFlashBrowseUrl: '/ext/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=' +
            '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/connector.php',
        filebrowserUploadUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/upload.php?Type=File',
        filebrowserImageUploadUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
        filebrowserFlashUploadUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
    });
</script>



<script type="text/javascript">
    $('input[id=home_image]').change(function() {
        // Get the selected file
        var file = this.files[0];

        // Check if a file is selected
        if (file) {
            // Create a FileReader to read the selected file
            var reader = new FileReader();

            // Set up the FileReader onload event to update the image preview
            reader.onload = function(e) {
                $('#homePreview').attr('src', e.target.result);
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        } else {
            // If no file is selected, revert to the current logo
            $('#homePreview').attr('src', '');
        }

        // Update the input field's value for display
        $('#SelectedFileName').val($(this).val());
    });
    $('input[id=logo]').change(function() {
        // Get the selected file
        var file = this.files[0];

        // Check if a file is selected
        if (file) {
            // Create a FileReader to read the selected file
            var reader = new FileReader();

            // Set up the FileReader onload event to update the image preview
            reader.onload = function(e) {
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
    $('input[id=image_2]').change(function() {
        // Get the selected file
        var file = this.files[0];

        // Check if a file is selected
        if (file) {
            // Create a FileReader to read the selected file
            var reader = new FileReader();

            // Set up the FileReader onload event to update the image preview
            reader.onload = function(e) {
                $('#secondImagePreview').attr('src', e.target.result);
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        } else {
            // If no file is selected, revert to the current logo
            $('#secondImagePreview').attr('src', '');
        }

        // Update the input field's value for display
        $('#SelectedFileName').val($(this).val());
    });
    $('input[id=image_1]').change(function() {
        // Get the selected file
        var file = this.files[0];

        // Check if a file is selected
        if (file) {
            // Create a FileReader to read the selected file
            var reader = new FileReader();

            // Set up the FileReader onload event to update the image preview
            reader.onload = function(e) {
                $('#firstImagePreview').attr('src', e.target.result);
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        } else {
            // If no file is selected, revert to the current logo
            $('#firstImagePreview').attr('src', '');
        }

        // Update the input field's value for display
        $('#SelectedFileName').val($(this).val());
    });
    $('input[id=hero_image]').change(function() {
        // Get the selected file
        var file = this.files[0];

        // Check if a file is selected
        if (file) {
            // Create a FileReader to read the selected file
            var reader = new FileReader();

            // Set up the FileReader onload event to update the image preview
            reader.onload = function(e) {
                $('#heroPreview').attr('src', e.target.result);
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        } else {
            // If no file is selected, revert to the current logo
            $('#heroPreview').attr('src', '');
        }

        // Update the input field's value for display
        $('#SelectedFileName').val($(this).val());
    });
    $('input[id=thumb_image]').change(function() {
        // Get the selected file
        var file = this.files[0];

        // Check if a file is selected
        if (file) {
            // Create a FileReader to read the selected file
            var reader = new FileReader();

            // Set up the FileReader onload event to update the image preview
            reader.onload = function(e) {
                $('#thumbPreview').attr('src', e.target.result);
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        } else {
            // If no file is selected, revert to the current logo
            $('#thumbPreview').attr('src', '');
        }

        // Update the input field's value for display
        $('#SelectedFileName').val($(this).val());
    });
</script>
