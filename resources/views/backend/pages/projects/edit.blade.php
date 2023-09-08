<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
    class="needs-validation" novalidate>
    {{ method_field('PATCH') }}
    <div id="status"></div>
    <div class="form-row">

        <div class="form-group col-md-12">
            <label for="">Project Name <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="project_title" name="project_title"
                value="{{ $project->project_title }}" placeholder="">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12">
            <label for="">Client Name <span style="color: red;">*</span></label>
            <select class="form-control" name="client_id" id="client_id">
                <option value="">Select Client</option>

                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $project->client_id ? 'selected' : '' }}>
                        {{ $client->name }}</option>
                @endforeach
            </select>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Project Description <span style="color: red;">*</span></label>
            <textarea class="form-control" id="project_description" name="project_description" cols="50" rows="4">{{ $project->project_description }}</textarea>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Project Features <span style="color: red;">*</span></label>
            <textarea class="form-control ckeditor" id="project_features" name="project_features" cols="50" rows="4">{{ $project->project_features }}</textarea>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Project Location <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="project_location" name="project_location"
                value="{{ $project->project_location }}" placeholder="">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Project Problem <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="project_problem" name="project_problem"
                value="{{ $project->project_problem }}" placeholder="">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Handover_time <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="handover_time" name="handover_time"
                value="{{ $project->handover_time }}" placeholder="">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Project Type <span style="color: red;">*</span></label>
            <select class="form-control" name="project_type" id="project_type">
                <option value="">Select Type</option>
                <option value="0" {{ $project->project_type == '0' ? 'selected' : '' }}>Residential</option>
                <option value="1" {{ $project->project_type == '1' ? 'selected' : '' }}>Commercial</option>
                <option value="2" {{ $project->project_type == '2' ? 'selected' : '' }}>Highrise</option>
                <option value="3" {{ $project->project_type == '3' ? 'selected' : '' }}>Business</option>
            </select>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Project Status <span style="color: red;">*</span></label>
            <select class="form-control" name="project_status" id="project_status">
                <option value="">Select Status</option>
                <option value="0" {{ $project->project_status == '0' ? 'selected' : '' }}>Running</option>
                <option value="1" {{ $project->project_status == '1' ? 'selected' : '' }}>Upcoming</option>
                <option value="2" {{ $project->project_status == '2' ? 'selected' : '' }}>Completed</option>
            </select>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <!-- <div class="form-group col-md-12 col-sm-12">
            <label for="">Thumbnail Image <span style="color: red;">*</span></label>
            <input type="file" class="form-control" id="thumbnail_image" name="thumbnail_image"  width="490" height="645">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div> -->

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Hero Image <span style="color: red;">*</span></label>
            <input type="file" class="form-control" id="hero_image" name="hero_image" width="772"
                height="978">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">First Image <span style="color: red;">*</span></label>
            <input type="file" class="form-control" id="image_1" name="image_1" width="370"
                height="260">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Second Image <span style="color: red;">*</span></label>
            <input type="file" class="form-control" id="image_2" name="image_2" width="370"
                height="260">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-check">

            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1"
                {{ $project->is_active == '1' ? 'checked' : '' }}>
            <label class="form-check-label" for="">Is Active <span style="color: red;">*</span></label>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="is_popular" name="is_popular" value="1"
                {{ $project->is_popular == '1' ? 'checked' : '' }}>
            <label class="form-check-label" for="">Is Popular <span style="color: red;">*</span></label>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="d-grid gap-2">
            <button class="btn btn-primary button-submit" type="submit" data-loading-text="Loading...">
                <i class="fadeIn animated bx bx-save"></i>Update</button>
        </div>

    </div>
</form>

<script>
    $('#table_field').on('click', '#remove', function() {
        $(this).closest('tr').remove();

    });

    $('.button-submit').click(function() {
        // route name and record id
        ajax_submit_update('projects', "{{ $project->id }}")
    });
</script>

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $('#project_features').ckeditor();
</script>
