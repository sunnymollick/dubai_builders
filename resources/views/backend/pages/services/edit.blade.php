<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
    class="needs-validation" novalidate>
    {{ method_field('PATCH') }}
    <div id="status"></div>
    <div class="form-row">

        <div class="row">
            <div class="form-group col-md-12c">
                <label for="">Service Title <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="title" name="service_title"
                    value="{{ $service->service_title }}" placeholder="" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-12 col-sm-12 mt-2">
                <label for="">Service Details <span style="color: red;">*</span></label>
                <textarea type="text" class="form-control" id="details" name="service_details" placeholder="" required>{!! $service->service_details !!}</textarea>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-12 col-sm-12 mt-2">
                <label for="">Slogan <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="slogan" name="slogan" value="{{ $service->slogan }}"
                    placeholder="" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
        <br> --}}

        </div>
        <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <img src="{{ asset($service->thumbnail_image) }}" alt="thumbnail image" height="80px" width="100px">
                <label for="">Thumbnail Image <span style="color: red;">*</span></label>
                <input type="file" class="form-control" id="thumb_image" value="{{ $service->thumbnail_image }}"
                    name="thumb_image">
                    <span>Image Size Must Be 370 × 340 (width - height) </span>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div> --}}
            {{-- <br> --}}
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <img src="{{ asset($service->hero_image) }}" alt="thumbnail image" height="80px" width="100px">
                <label for="">Hero Image <span style="color: red;">*</span></label>
                <input type="file" class="form-control" id="hero_image" vallue="{{ $service->hero_image }}"
                    name="hero_image">
                    <span>Image Size Must Be 770 × 480 (width - height) </span>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
        <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <img src="{{ asset($service->image_1) }}" alt="thumbnail image" height="80px" width="100px">
                <label for="">First Image <span style="color: red;">*</span></label>
                <input type="file" class="form-control" id="image_1" value="{{ $service->image_1 }}"
                    name="image_1">
                    <span>Image Size Must Be 370 × 260 (width - height) </span>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}

            <div class="form-group col-md-6 col-sm-12 mt-2">
                <img src="{{ asset($service->image_2) }}" alt="thumbnail image" height="80px" width="100px">
                <label for="">Second Image <span style="color: red;">*</span></label>
                <input type="file" class="form-control" id="image_2" value="{{ $service->image_2 }}"
                    name="image_2">
                    <span>Image Size Must Be 370 × 260 (width - height) </span>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <img src="{{ asset($service->logo) }}" alt="thumbnail image" height="80px" width="100px">
                <label for="">Logo <span style="color: red;">*</span></label>
                <input type="file" class="form-control" id="logo" value="{{ $service->logo }}"
                    name="logo">
                    <span>Image Size Must Be 73 × 73 (width - height) </span>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}

            <div class="form-group col-md-6 col-sm-12 mt-2">
                <img src="{{ asset($service->home_image) }}" alt="thumbnail image" height="80px" width="100px">
                <label for="">Home Image <span style="color: red;">*</span></label>
                <input type="file" class="form-control" id="home_image" value="{{ $service->home_image }}"
                    name="home_image">
                    <span>Image Size Must Be 215 × 220 (width - height) </span>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
            <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-12 col-sm-12 mt-2">
                <label for="">Video Link <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="video_link" name="video_link"
                    value="{{ $service->video_link }}" placeholder="" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
        <br> --}}
        </div>
        <br>
        <div class="d-grid gap-2">
            <button class="btn btn-primary button-submit" type="submit" data-loading-text="Loading...">
                <i class="fadeIn animated bx bx-save"></i>Save</button>
        </div>

    </div>
</form>

<script>
    $('.button-submit').click(function() {
        // route name and record id
        ajax_submit_update('services', "{{ $service->id }}")
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
