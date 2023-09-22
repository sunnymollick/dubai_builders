<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div id="status"></div>
    {{method_field('PATCH')}}
    <div id="status"></div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="">Blog Title <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="blog_title" name="blog_title" value="{{ $blog->blog_title }}"
                   placeholder="Enter Blog Title" readonly>
            <span id="error_blog_title" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Blog Description <span style="color: red;">*</span></label>
            <textarea name="blog_description" id="blog_description" class="form-control" required placeholder="Enter Blog Description" readonly>{!! $blog->blog_description !!}</textarea>
            <span id="error_blog_description" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Author Name <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="author" name="author" value="{{ $blog->author }}"
                   placeholder="Enter Author Name" readonly>
            <span id="error_author" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Author Slug <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="author_slug" name="author_slug" value="{{ $blog->author_slug }}"
                   placeholder="Enter Author Slug" readonly>
            <span id="error_author_slug" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Author Description <span style="color: red;">*</span></label>
            <textarea name="author_description" id="author_description" readonly class="form-control" placeholder="Enter Author Description" required>{{ $blog->author_description }}</textarea>
            <span id="error_author_description" class="text-danger"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group row col-md-12 col-sm-12">
            <div class="col-md-6">
                <label for="">Author FB Link</label>
                <input type="text" class="form-control" id="author_fb" name="author_fb" value="{{ $blog->author_fb }}"
                    placeholder="Facebook Link" readonly>
                <span id="error_author_fb" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <label for="">Author Twitter Link</label>
                <input type="text" class="form-control" id="author_twitter" name="author_twitter" value="{{ $blog->author_twitter }}"
                    placeholder="Twitter Link" readonly>
                <span id="error_author_twitter" class="text-danger"></span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group row col-md-12 col-sm-12">
            <div class="col-md-6">
                <label for="">Author Instagram Link</label>
                <input type="text" class="form-control" id="author_instagram" name="author_instagram" value="{{ $blog->author_instagram }}"
                    placeholder="Instagram Link" readonly>
                <span id="error_author_instagram" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <label for="">Author Linkedin Link </label>
                <input type="text" class="form-control" id="author_linkedin" name="author_linkedin" value="{{ $blog->author_linkedin }}"
                    placeholder="Likedin Link" readonly>
                <span id="error_author_linkedin" class="text-danger"></span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group row col-md-12 col-sm-12">
            <div class="col-md-6">
                <label for="">Author Pinterest Link </label>
                <input type="text" class="form-control" id="author_pinterest" name="author_pinterest" value="{{ $blog->author_pinterest }}"
                    placeholder="Pinterest Link" readonly>
                <span id="error_author_pinterest" class="text-danger"></span>
            </div>
            <div class="col-md-6">
                <label for="">Youtube Video Link </label>
                <input type="text" class="form-control" id="youtube_video_link" name="youtube_video_link" value="{{ $blog->youtube_video_link }}"
                    placeholder="Youtube Link" readonly>
                <span id="error_youtube_video_link" class="text-danger"></span>
            </div>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="form-group  col-md-12">
            <strong>Author Image: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <img id="authorlogoPreview" src="{{ asset($blog->author_image) }}" alt="Author Image" width="100%">
        </div>
        <div class="clearfix"></div>
        <br>
        <div class="form-group  col-md-12">
            <strong>Thumbnail Image: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <img id="thumbnaillogoPreview" src="{{ asset($blog->thumbnail_image) }}" alt="Thumbnail Image" width="100%">
        </div>
        <div class="clearfix"></div>
        <br>
        <div class="form-group  col-md-12">
            <strong>Hero Image: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <img id="logoPreview" src="{{ asset($blog->hero_image) }}" alt="Hero Image" width="100%">
        </div>
        <div class="clearfix"></div>
        <br>
        <div class="form-group  col-md-12">
            <strong>About Image 1: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <img id="aboutlogoPreview1" src="{{ asset($blog->image_1) }}" alt="About Image" width="100%">
        </div>
        <div class="clearfix"></div>
        <br>
        <div class="form-group  col-md-12">
            <strong>About Image 2: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <img id="aboutlogoPreview2" src="{{ asset($blog->image_2) }}" alt="About Image" width="100%">
        </div>
        <div class="clearfix"></div>

        <br>

    </div>
</form>

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
