<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
    class="needs-validation" novalidate>
    <div id="status"></div>
    <div class="form-row">

        <div class="row">
            <div class="form-group col-md-12">
                <label for="">Service Title <span style="color: red;">*</span></label>
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
                <input type="text" class="form-control" id="slogan" name="slogan" value="" placeholder=""
                    required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div> --}}
            {{-- <br> --}}

            <div class="form-group col-md-6 col-sm-12 mt-2">
                <label for="">Thumbnail Image <span style="color: red;">*</span></label>
                <input type="file" class="form-control" id="thumb_image" name="thumb_image" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <label for="">Hero Image <span style="color: red;">*</span></label>
                <input type="file" class="form-control" id="hero_image" name="hero_image" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}

            <div class="form-group col-md-6 col-sm-12 mt-2">
                <label for="">First Image <span style="color: red;">*</span></label>
                <input type="file" class="form-control" id="image_1" name="image_1" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <label for="">Second Image <span style="color: red;">*</span></label>
                <input type="file" class="form-control" id="image_2" name="image_2" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}

            <div class="form-group col-md-6 col-sm-12 mt-2">
                <label for="">Logo <span style="color: red;">*</span></label>
                <input type="file" class="form-control" id="logo" name="logo" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <label for="">Home Image <span style="color: red;">*</span></label>
                <input type="file" class="form-control" id="home_image" name="home_image" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
        <br> --}}

            <div class="form-group col-md-6 col-sm-12 mt-2">
                <label for="">Video Link <span style="color: red;">*</span></label>
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
