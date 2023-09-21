<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
    class="needs-validation" novalidate>
    {{ method_field('PATCH') }}
    <div id="status"></div>
    <div class="form-row">

        <div class="form-group col-md-12">
            <label for="">Job Title <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="title" name="job_title" value="{{ $career->job_title }}"
                placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="form-group col-md-12">
            <label for="">Slug <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $career->slug }}"
                placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>



        <div class="form-group col-md-12 col-sm-12">
            <label for="">Job Description <span style="color: red;">*</span></label>
            <textarea type="text" class="form-control" id="description" name="job_description" value="" placeholder=""
                required>{!! $career->job_description !!}</textarea>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Educational Reqiurement <span style="color: red;">*</span></label>
            <textarea type="text" class="form-control" id="ed_requirement" name="ed_requirement" value="" placeholder=""
                required>{!! $career->educational_requirement !!}</textarea>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Experience Reqiurement <span style="color: red;">*</span></label>
            <textarea type="text" class="form-control" id="ex_requirement" name="ex_requirement" value="" placeholder=""
                required>{!! $career->experience_requirement !!}</textarea>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Additional Reqiurement <span style="color: red;">*</span></label>
            <textarea type="text" class="form-control" id="ad_requirement" name="ad_requirement" value="" placeholder=""
                required>{!! $career->additional_requirement !!}</textarea>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">No. of Vacancy <span style="color: red;">*</span></label>
            <input type="number" min="1" class="form-control" id="vacancy" name="vacancy"
                value="{{ $career->no_of_vacancy }}" placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Salary Range <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="salary" name="salary" value="{{ $career->sarary }}"
                placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="form-group col-md-12 col-sm-12">
            <img src="{{asset($career->poster)}}" alt="poster" height="80px"><br>
            <label for="">Poster <span style="color: red;">*</span></label>
            <input type="file" class="form-control" id="poster" name="poster" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Job Location <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="location" name="location"
                value="{{ $career->job_location }}" placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Experience <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="experience" name="experience"
                value="{{ $career->experience }}" placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Deadline <span style="color: red;">*</span></label>
            <input type="date" class="form-control" value="{{ $career->deadline }}" id="deadline"
                name="deadline" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="form-group col-md-12">
            <label for="">Job Type <span style="color: red;">*</span></label>
            <select class="form-control" name="job_type" id="job_type" required>
                <option value="fulltime" @if ($career->job_type == 'fulltime') selected @endif>Full Time</option>
                <option value="parttime" @if ($career->job_type == 'parttime') selected @endif>Part Time</option>
                <option value="remote" @if ($career->job_type == 'remote') selected @endif>Remote</option>
            </select>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Compasations & Other Benifits <span style="color: red;">*</span></label>
            <textarea type="text" class="form-control" id="copansations" name="copansations" value="" placeholder=""
                required>{!! $career->compensations !!}</textarea>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        <div class="form-group col-md-12">
            <label for="">Is Active <span style="color: red;">*</span></label>
            <select class="form-control" name="is_active" id="is_active" required>
                <option value="active" @if ($career->is_active == 'active') selected @endif>Active</option>
                <option value="inactive" @if ($career->is_active == 'inactive') selected @endif>Inactive</option>
            </select>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="d-grid gap-2">
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
