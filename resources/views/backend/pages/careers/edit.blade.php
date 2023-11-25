<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
    class="needs-validation" novalidate>
    {{ method_field('PATCH') }}
    <div id="status"></div>
    <div class="form-row">

        <div class="row">
            <div class="form-group col-md-6">
                <label for="">Job Title <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="title" name="job_title"
                    value="{{ $career->job_title }}" placeholder="" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
        <br> --}}

            <div class="form-group col-md-6">
                <label for="">Slug <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ $career->slug }}"
                    placeholder="" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
        <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <label for="">Deadline <span style="color: red;">*</span></label>
                <input type="date" class="form-control" value="{{ $career->deadline }}" id="deadline"
                    name="deadline" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
    <br> --}}

            <div class="form-group col-md-6 mt-2">
                <label for="">Job Type <span style="color: red;">*</span></label>
                <select class="form-control" name="job_type" id="job_type" required>
                    <option value="fulltime" @if ($career->job_type == 'fulltime') selected @endif>Full Time</option>
                    <option value="parttime" @if ($career->job_type == 'parttime') selected @endif>Part Time</option>
                    <option value="remote" @if ($career->job_type == 'remote') selected @endif>Remote</option>
                </select>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
    <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <label for="">No. of Vacancy <span style="color: red;">*</span></label>
                <input type="number" min="1" class="form-control" id="vacancy" name="vacancy"
                    value="{{ $career->no_of_vacancy }}" placeholder="" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
    <br> --}}

            <div class="form-group col-md-6 col-sm-12 mt-2">
                <label for="">Salary Range <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="salary" name="salary" value="{{ $career->salary }}"
                    placeholder="" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
    <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <label for="">Job Location <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="location" name="location"
                    value="{{ $career->job_location }}" placeholder="" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
    <br> --}}

            <div class="form-group col-md-6 col-sm-12 mt-2">
                <label for="">Experience <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="experience" name="experience"
                    value="{{ $career->experience }}" placeholder="" required>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
    <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 mt-2">
                <strong>Poster: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
            <img id="logoPreview" src="{{ asset($career->poster) }}" alt="Poster" height="150">
            <p></p>
            <div class="input-group">
                <input id="poster" type="file" name="poster" style="display:none">
                <div class="input-group-prepend">
                    <a class="btn btn-primary text-white" onclick="$('input[id=poster]').click();">Browse</a>
                </div>
                <input type="text" name="SelectedFileName" class="form-control" id="SelectedFileName" value="{{ $career->poster }}" readonly>
            </div>
            <span>Image Size Must Be 1170 × 620 (width - height) </span>
            <span id="error_poster" class="text-danger"></span>
            </div>
            {{-- <div class="clearfix"></div>
    <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-12 col-sm-12 mt-2">
                <label for="">Job Description <span style="color: red;">*</span></label>
                <textarea type="text" class="form-control" id="description" name="job_description" value=""
                    placeholder="" required>{!! $career->job_description !!}</textarea>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
        <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-12 col-sm-12 mt-2">
                <label for="">Educational Reqiurement <span style="color: red;">*</span></label>
                <textarea type="text" class="form-control" id="ed_requirement" name="ed_requirement" value=""
                    placeholder="" required>{!! $career->educational_requirement !!}</textarea>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
        <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-12 col-sm-12 mt-2">
                <label for="">Experience Reqiurement <span style="color: red;">*</span></label>
                <textarea type="text" class="form-control" id="ex_requirement" name="ex_requirement" value=""
                    placeholder="" required>{!! $career->experience_requirement !!}</textarea>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
        <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-12 col-sm-12 mt-2">
                <label for="">Additional Reqiurement <span style="color: red;">*</span></label>
                <textarea type="text" class="form-control" id="ad_requirement" name="ad_requirement" value=""
                    placeholder="" required>{!! $career->additional_requirement !!}</textarea>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
        <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-12 col-sm-12 mt-2">
                <label for="">Compasations & Other Benifits <span style="color: red;">*</span></label>
                <textarea type="text" class="form-control" id="compensations" name="compensations" value=""
                    placeholder="" required>{!! $career->compensations !!}</textarea>
                <span id="error_title" class="has-error"></span>
            </div>
            {{-- <div class="clearfix"></div>
        <br> --}}
        </div>

        <div class="row">
            <div class="form-group col-md-6 mt-2 mt-2">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" @if($career->is_active == 'active')checked @endif value="active">
                <label for="">Is Active <span style="color: red;">*</span></label>
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
        ajax_submit_update('careers', "{{ $career->id }}")
    });
</script>

<script type="text/javascript">
    $('input[id=poster]').change(function () {
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


<script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('description', {
        filebrowserBrowseUrl: '{{ asset('backend') }}/ckeditor/filemanager/browser/default/browser.html?Connector={{ asset('backend') }}/ckeditor/filemanager/connectors/php/connector.php',
        filebrowserImageBrowseUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=' +
            '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/connector.php',
        filebrowserFlashBrowseUrl: '/ext/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=' +
            '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/connector.php',
        filebrowserUploadUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/upload.php?Type=File',
        filebrowserImageUploadUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
        filebrowserFlashUploadUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
    });
    CKEDITOR.replace('ed_requirement', {
        filebrowserBrowseUrl: '{{ asset('backend') }}/ckeditor/filemanager/browser/default/browser.html?Connector={{ asset('backend') }}/ckeditor/filemanager/connectors/php/connector.php',
        filebrowserImageBrowseUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=' +
            '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/connector.php',
        filebrowserFlashBrowseUrl: '/ext/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=' +
            '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/connector.php',
        filebrowserUploadUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/upload.php?Type=File',
        filebrowserImageUploadUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
        filebrowserFlashUploadUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
    });
    CKEDITOR.replace('ex_requirement', {
        filebrowserBrowseUrl: '{{ asset('backend') }}/ckeditor/filemanager/browser/default/browser.html?Connector={{ asset('backend') }}/ckeditor/filemanager/connectors/php/connector.php',
        filebrowserImageBrowseUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=' +
            '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/connector.php',
        filebrowserFlashBrowseUrl: '/ext/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=' +
            '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/connector.php',
        filebrowserUploadUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/upload.php?Type=File',
        filebrowserImageUploadUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
        filebrowserFlashUploadUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
    });
    CKEDITOR.replace('ad_requirement', {
        filebrowserBrowseUrl: '{{ asset('backend') }}/ckeditor/filemanager/browser/default/browser.html?Connector={{ asset('backend') }}/ckeditor/filemanager/connectors/php/connector.php',
        filebrowserImageBrowseUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=' +
            '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/connector.php',
        filebrowserFlashBrowseUrl: '/ext/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=' +
            '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/connector.php',
        filebrowserUploadUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/upload.php?Type=File',
        filebrowserImageUploadUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
        filebrowserFlashUploadUrl: '{{ asset('backend') }}/ext/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
    });
    CKEDITOR.replace('compensations', {
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
