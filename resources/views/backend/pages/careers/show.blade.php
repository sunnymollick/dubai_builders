<div class="form-row">

    <div class="form-group col-md-12">
        <label for="">Job Title <span style="color: red;">*</span></label>
        <input type="text" class="form-control" disabled id="title" name="job_title" value="{{ $career->job_title }}"
            placeholder="" required>
        <span id="error_title" class="has-error"></span>
    </div>
    <div class="clearfix"></div>
    <br>

    <div class="form-group col-md-12">
        <label for="">Slug <span style="color: red;">*</span></label>
        <input type="text" class="form-control" disabled id="slug" name="slug" value="{{ $career->slug }}"
            placeholder="" required>
        <span id="error_title" class="has-error"></span>
    </div>
    <div class="clearfix"></div>
    <br>



    <div class="form-group col-md-12 col-sm-12">
        <label for="">Job Description <span style="color: red;">*</span></label>
        <textarea type="text" class="form-control" disabled id="description" name="job_description" value="" placeholder=""
            required>{!! $career->job_description !!}</textarea>
        <span id="error_title" class="has-error"></span>
    </div>
    <div class="clearfix"></div>
    <br>

    <div class="form-group col-md-12 col-sm-12">
        <label for="">Educational Reqiurement <span style="color: red;">*</span></label>
        <textarea type="text" class="form-control" disabled id="ed_requirement" name="ed_requirement" value="" placeholder=""
            required>{!! $career->educational_requirement !!}</textarea>
        <span id="error_title" class="has-error"></span>
    </div>
    <div class="clearfix"></div>
    <br>

    <div class="form-group col-md-12 col-sm-12">
        <label for="">Experience Reqiurement <span style="color: red;">*</span></label>
        <textarea type="text" class="form-control" disabled id="ex_requirement" name="ex_requirement" value="" placeholder=""
            required>{!! $career->experience_requirement !!}</textarea>
        <span id="error_title" class="has-error"></span>
    </div>
    <div class="clearfix"></div>
    <br>

    <div class="form-group col-md-12 col-sm-12">
        <label for="">Additional Reqiurement <span style="color: red;">*</span></label>
        <textarea type="text" class="form-control" disabled id="ad_requirement" name="ad_requirement" value="" placeholder=""
            required>{!! $career->additional_requirement !!}</textarea>
        <span id="error_title" class="has-error"></span>
    </div>
    <div class="clearfix"></div>
    <br>

    <div class="form-group col-md-12 col-sm-12">
        <label for="">No. of Vacancy <span style="color: red;">*</span></label>
        <input type="number" min="1" class="form-control" disabled id="vacancy" name="vacancy"
            value="{{ $career->no_of_vacancy }}" placeholder="" required>
        <span id="error_title" class="has-error"></span>
    </div>
    <div class="clearfix"></div>
    <br>

    <div class="form-group col-md-12 col-sm-12">
        <label for="">Salary Range <span style="color: red;">*</span></label>
        <input type="text" class="form-control" disabled id="salary" name="salary" value="{{ $career->salary }}"
            placeholder="" required>
        <span id="error_title" class="has-error"></span>
    </div>
    <div class="clearfix"></div>
    <br>

    <div class="form-group col-md-12 col-sm-12">
        <label for="">Poster <span style="color: red;">*</span></label><br>
        <img src="{{asset($career->poster)}}" alt="poster" height="80px">
        <span id="error_title" class="has-error"></span>
    </div>
    <div class="clearfix"></div>
    <br>

    <div class="form-group col-md-12 col-sm-12">
        <label for="">Job Location <span style="color: red;">*</span></label>
        <input type="text" class="form-control" disabled id="location" name="location"
            value="{{ $career->job_location }}" placeholder="" required>
        <span id="error_title" class="has-error"></span>
    </div>
    <div class="clearfix"></div>
    <br>

    <div class="form-group col-md-12 col-sm-12">
        <label for="">Experience <span style="color: red;">*</span></label>
        <input type="text" class="form-control" disabled id="experience" name="experience"
            value="{{ $career->experience }}" placeholder="" required>
        <span id="error_title" class="has-error"></span>
    </div>
    <div class="clearfix"></div>
    <br>

    <div class="form-group col-md-12 col-sm-12">
        <label for="">Deadline <span style="color: red;">*</span></label>
        <input type="date" class="form-control" disabled  value="{{ $career->deadline }}" id="deadline" name="deadline"
            required>
        <span id="error_title" class="has-error"></span>
    </div>
    <div class="clearfix"></div>
    <br>

    <div class="form-group col-md-12">
        <label for="">Job Type <span style="color: red;">*</span></label>
        <select class="form-control" disabled name="job_type" id="job_type" required>
            <option value="fulltime" @if ($career->job_type == 'fulltime') selected disabled @endif>Full Time</option>
            <option value="parttime" @if ($career->job_type == 'parttime') selected disabled @endif>Part Time</option>
            <option value="remote" @if ($career->job_type == 'remote') selected @endif>Remote</option>
        </select>
        <span id="error_title" class="has-error"></span>
    </div>
    <div class="clearfix"></div>
    <br>

    <div class="form-group col-md-12 col-sm-12">
        <label for="">Compasations & Other Benifits <span style="color: red;">*</span></label>
        <textarea type="text" class="form-control" disabled id="compensations" name="compensations" value="" placeholder=""
            required>{!! $career->compensations !!}</textarea>
        <span id="error_title" class="has-error"></span>
    </div>
    <div class="clearfix"></div>
    <br>
    <div class="form-group col-md-12">
        <label for="">Is Active <span style="color: red;">*</span></label>
        <select class="form-control" disabled name="is_active" id="is_active" required>
            <option value="active" @if ($career->is_active == 'active') selected disabled @endif>Active</option>
            <option value="inactive" @if ($career->is_active == 'inactive') selected disabled @endif>Inactive</option>
        </select>
        <span id="error_title" class="has-error"></span>
    </div>
    <div class="clearfix"></div>
    <br>

</div>
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
