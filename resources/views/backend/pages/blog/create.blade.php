<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
      novalidate>
    <div id="status"></div>
    <div class="form-row">

        <div class="form-group col-md-12">
            <label for="">Blog Title <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="blog_title" name="blog_title" value=""
                   placeholder="Enter Blog Title" required>
            <span id="error_blog_title" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Blog Description <span style="color: red;">*</span></label>
            <textarea name="blog_description" id="blog_description" class="form-control" required placeholder="Enter Blog Description"></textarea>
            <span id="error_blog_description" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Author Name <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="author" name="author" value=""
                   placeholder="Enter Author Name" required>
            <span id="error_author" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Author Slug <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="author_slug" name="author_slug" value=""
                   placeholder="Enter Author Slug" required>
            <span id="error_author_slug" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Author Description <span style="color: red;">*</span></label>
            <textarea name="author_description" id="author_description" class="form-control" placeholder="Enter Author Description" required></textarea>
            <span id="error_author_description" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group row col-md-12 col-sm-12">
            <div class="col-md-6">
                <label for="">Author FB Link</label>
                <input type="text" class="form-control" id="author_fb" name="author_fb" value=""
                    placeholder="Facebook Link" >
                <span id="error_author_fb" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <label for="">Author Twitter Link</label>
                <input type="text" class="form-control" id="author_twitter" name="author_twitter" value=""
                    placeholder="Twitter Link">
                <span id="error_author_twitter" class="text-danger"></span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group row col-md-12 col-sm-12">
            <div class="col-md-6">
                <label for="">Author Instagram Link</label>
                <input type="text" class="form-control" id="author_instagram" name="author_instagram" value=""
                    placeholder="Instagram Link" >
                <span id="error_author_instagram" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <label for="">Author Linkedin Link </label>
                <input type="text" class="form-control" id="author_linkedin" name="author_linkedin" value=""
                    placeholder="Likedin Link" >
                <span id="error_author_linkedin" class="text-danger"></span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group row col-md-12 col-sm-12">
            <div class="col-md-6">
                <label for="">Author Pinterest Link </label>
                <input type="text" class="form-control" id="author_pinterest" name="author_pinterest" value=""
                    placeholder="Pinterest Link" >
                <span id="error_author_pinterest" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <label for="">Youtube Video Link </label>
                <input type="text" class="form-control" id="youtube_video_link" name="youtube_video_link" value=""
                    placeholder="Youtube Link" >
                <span id="error_youtube_video_link" class="text-danger"></span>
            </div>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="form-group  col-md-12">
            <strong>Author Image: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <img id="authorlogoPreview" src="" alt="Author Image" height="150">
            <p></p>
            <div class="input-group">
                <input id="author_image" type="file" name="author_image" style="display:none" >
                <div class="input-group-prepend">
                    <a class="btn btn-primary text-white" onclick="$('input[id=author_image]').click();">Browse</a>
                </div>
                <input type="text" name="author_file_name" class="form-control" id="author_file_name" value="" readonly>
            </div>
            <span>Image Size Must Be 370 × 260 (width - height) </span>
            <span id="error_author_image" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        <div class="form-group  col-md-12">
            <strong>Thumbnail Image: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <img id="thumbnaillogoPreview" src="" alt="Thumbnail Image" height="150">
            <p></p>
            <div class="input-group">
                <input id="thumbnail_image" type="file" name="thumbnail_image" style="display:none">
                <div class="input-group-prepend">
                    <a class="btn btn-primary text-white" onclick="$('input[id=thumbnail_image]').click();">Browse</a>
                </div>
                <input type="text" name="thumbnail_image_name" class="form-control" id="thumbnail_image_name" value="" readonly>
            </div>
            <span>Image Size Must Be 370 × 270 (width - height) </span>
            <span id="error_hero_image" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        <div class="form-group  col-md-12">
            <strong>Hero Image: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <img id="logoPreview" src="" alt="Hero Image" height="150">
            <p></p>
            <div class="input-group">
                <input id="hero_image" type="file" name="hero_image" style="display:none">
                <div class="input-group-prepend">
                    <a class="btn btn-primary text-white" onclick="$('input[id=hero_image]').click();">Browse</a>
                </div>
                <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName" value="" readonly>
            </div>
            <span>Image Size Must Be 1170 × 620 (width - height) </span>
            <span id="error_hero_image" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        <div class="form-group  col-md-12">
            <strong>About Image 1: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <img id="aboutlogoPreview1" src="" alt="About Image" height="150">
            <p></p>
            <div class="input-group">
                <input id="image_1" type="file" name="image_1" style="display:none">
                <div class="input-group-prepend">
                    <a class="btn btn-primary text-white" onclick="$('input[id=image_1]').click();">Browse</a>
                </div>
                <input type="text" name="image_1_name" class="form-control" id="image_1_name" value="" readonly>
            </div>
            <span>Image Size Must Be 370 × 260 (width - height) </span>
            <span id="error_image_1" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        <div class="form-group  col-md-12">
            <strong>About Image 2: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <img id="aboutlogoPreview2" src="" alt="About Image" height="150">
            <p></p>
            <div class="input-group">
                <input id="image_2" type="file" name="image_2" style="display:none">
                <div class="input-group-prepend">
                    <a class="btn btn-primary text-white" onclick="$('input[id=image_2]').click();">Browse</a>
                </div>
                <input type="text" name="image_2_name" class="form-control" id="image_2_name" value="" readonly>
            </div>
            <span>Image Size Must Be 370 × 260 (width - height) </span>
            <span id="error_image_2" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>

        <br>

        <div class="form-group col-md-12">
            <label for="">Publish : &nbsp;&nbsp;</label>
            <input type="checkbox" name="is_publish" id="is_publish" value="1">
        </div>

        <br>

        <div class="d-grid gap-2">
            <button class="btn btn-primary button-submit" type="submit" data-loading-text="Loading...">
                <i class="fadeIn animated bx bx-save"></i>Save</button>
        </div>

    </div>
</form>

<script>

    $('.button-submit').click(function () {
        // route name
        ajax_submit_store('blogs')
    });
</script>

<script type="text/javascript">
    $('input[id=hero_image]').change(function () {
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
<script type="text/javascript">
    $('input[id=author_image]').change(function () {
        // Get the selected file
        var file = this.files[0];

        // Check if a file is selected
        if (file) {
            // Create a FileReader to read the selected file
            var reader = new FileReader();

            // Set up the FileReader onload event to update the image preview
            reader.onload = function (e) {
                $('#authorlogoPreview').attr('src', e.target.result);
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        } else {
            // If no file is selected, revert to the current logo
            $('#authorlogoPreview').attr('src', '');
        }

        // Update the input field's value for display
        $('#author_file_name').val($(this).val());
    });
</script>
<script type="text/javascript">
    $('input[id=thumbnail_image]').change(function () {
        // Get the selected file
        var file = this.files[0];

        // Check if a file is selected
        if (file) {
            // Create a FileReader to read the selected file
            var reader = new FileReader();

            // Set up the FileReader onload event to update the image preview
            reader.onload = function (e) {
                $('#thumbnaillogoPreview').attr('src', e.target.result);
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        } else {
            // If no file is selected, revert to the current logo
            $('#thumbnaillogoPreview').attr('src', '');
        }

        // Update the input field's value for display
        $('#thumbnail_image_name').val($(this).val());
    });
</script>
<script type="text/javascript">
    $('input[id=image_1]').change(function () {
        // Get the selected file
        var file = this.files[0];

        // Check if a file is selected
        if (file) {
            // Create a FileReader to read the selected file
            var reader = new FileReader();

            // Set up the FileReader onload event to update the image preview
            reader.onload = function (e) {
                $('#aboutlogoPreview1').attr('src', e.target.result);
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        } else {
            // If no file is selected, revert to the current logo
            $('#aboutlogoPreview1').attr('src', '');
        }

        // Update the input field's value for display
        $('#image_1_name').val($(this).val());
    });
</script>
<script type="text/javascript">
    $('input[id=image_2]').change(function () {
        // Get the selected file
        var file = this.files[0];

        // Check if a file is selected
        if (file) {
            // Create a FileReader to read the selected file
            var reader = new FileReader();

            // Set up the FileReader onload event to update the image preview
            reader.onload = function (e) {
                $('#aboutlogoPreview2').attr('src', e.target.result);
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        } else {
            // If no file is selected, revert to the current logo
            $('#aboutlogoPreview2').attr('src', '');
        }

        // Update the input field's value for display
        $('#image_2_name').val($(this).val());
    });
</script>
