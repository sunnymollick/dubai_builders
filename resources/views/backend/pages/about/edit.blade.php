<div class="row">
    <div class="col-md-12">
        <form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div id="status"></div>
            {{method_field('PATCH')}}
            <div class="container">
                <div class="form-group col-md-12">
                    <strong>Title</strong>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $about->title }}"
                           placeholder="" required>
                    <span id="error_title" class="text-danger"></span>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <strong>Slug</strong>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $about->slug }}"
                        placeholder="">
                    <span id="error_email" class="text-danger"></span>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <strong>Description:</strong>
                    <textarea name="description" id="description" class="form-control">{!! $about->description !!}
                    </textarea>
                    <span id="error_description" class="text-danger"></span>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <strong>Short Description:</strong>
                    <textarea name="short_description" id="short_description" class="form-control">{!! $about->short_description !!}
                    </textarea>
                    <span id="error_short_description" class="text-danger"></span>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <strong>Our Mission:</strong>
                    <textarea name="our_mission" id="our_mission" class="form-control">{!! $about->our_mission !!}
                    </textarea>
                    <span id="error_our_mission" class="text-danger"></span>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <strong>Our Vision:</strong>
                    <textarea name="our_vision" id="our_vision" class="form-control">{!! $about->our_vision !!}
                    </textarea>
                    <span id="error_our_vision" class="text-danger"></span>
                </div>
                <div class="clearfix"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <strong>Our Builders</strong>
                        <input type="number" class="form-control" id="our_builders" name="our_builders" value="{{ $about->our_builders }}"
                            placeholder="">
                        <span id="error_our_builders" class="text-danger"></span>
                    </div>
                    <div class="col-md-6">
                        <strong>Experience Year</strong>
                        <input type="number" class="form-control" id="experience_year" name="experience_year" value="{{ $about->experience_year }}"
                            placeholder="Enter Experience Year">
                        <span id="error_experience_year" class="text-danger"></span>
                    </div>
                </div>
                <div class="clearfix"></div>
                <p></p>
                <div class="form-group col-md-12">
                    <strong>Hero Image: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                    <img id="logoPreview" src="{{ asset($about->hero_image) }}" alt="Current Logo" width="100" height="100">
                    <p></p>
                    <div class="input-group">
                        <input id="hero_image" type="file" name="hero_image" style="display:none">
                        <div class="input-group-prepend">
                            <a class="btn btn-primary text-white" onclick="$('input[id=hero_image]').click();">Browse</a>
                        </div>
                        <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName" value="{{$about->hero_image}}" readonly>
                    </div>
                    <p>Image Size Must Be 1170 × 663 (width - height)</p>
                    <span id="error_hero_image" class="text-danger"></span>
                </div>
                <div class="clearfix"></div>
                <p></p>
                <div class="form-group col-md-12">
                    <strong>About Image : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                    <img id="logoPreview_1" src="{{ asset($about->about_image) }}" alt="Current Logo" width="100" height="100">
                    <p></p>
                    <div class="input-group">
                        <input id="about_image" type="file" name="about_image" style="display:none">
                        <div class="input-group-prepend">
                            <a class="btn btn-primary text-white" onclick="$('input[id=about_image]').click();">Browse</a>
                        </div>
                        <input type="text" name="SelectedFileName_1" class="form-control" id="SelectedFileName_1" value="{{$about->about_image}}" readonly>
                    </div>
                    <p>Image Size Must Be 512 × 652 (width - height)</p>
                    <span id="error_about_image" class="text-danger"></span>
                </div>
                <br>
                <div class="clearfix"></div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary button-submit "
                            data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Update
                    </button>
                </div>
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
                    $('#logoPreview').attr('src', '{{ asset($about->hero_image) }}');
                }

                // Update the input field's value for display
                $('#SelectedFileName').val($(this).val());
            });
        </script>
        <script type="text/javascript">
            $('input[id=about_image]').change(function () {
                // Get the selected file
                var file = this.files[0];

                // Check if a file is selected
                if (file) {
                    // Create a FileReader to read the selected file
                    var reader = new FileReader();

                    // Set up the FileReader onload event to update the image preview
                    reader.onload = function (e) {
                        $('#logoPreview_1').attr('src', e.target.result);
                    };

                    // Read the selected file as a data URL
                    reader.readAsDataURL(file);
                } else {
                    // If no file is selected, revert to the current logo
                    $('#logoPreview_1').attr('src', '{{ asset($about->about_image) }}');
                }

                // Update the input field's value for display
                $('#SelectedFileName_1').val($(this).val());
            });
        </script>
        <script>
            $('.button-submit').click(function () {
                // route name and record id
                ajax_submit_update('abouts', "{{ $about->id }}")
            });
        </script>

    </div>
</div>
