<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation" novalidate>
    <div id="status"></div>
    <div class="form-row">

        <div class="form-group col-md-12">
            <label for="">Project Name <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="project_title" name="project_title" value="" placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12">
            <label for="">Client Name <span style="color: red;">*</span></label>
            <select class="form-control" name="client_id" id="client_id" required>
                <option value="">Select Client</option>
                @foreach($clients as $client)
                <option value="{{$client->id}}">{{$client->name}}</option>
                @endforeach
            </select>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Project Description <span style="color: red;">*</span></label>
            <textarea class="form-control" id="project_description" name="project_description" value="" cols="50" rows="4" required></textarea>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Project Features <span style="color: red;">*</span></label>
            <textarea class="form-control" id="project_features" name="project_features" value="" cols="50" rows="4" required></textarea>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Project Location <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="project_location" name="project_location" value="" placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Project Problem <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="project_problem" name="project_problem" value="" placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Handover_time <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="handover_time" name="handover_time" value="" placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Project Type <span style="color: red;">*</span></label>
            <select class="form-control" name="project_type" id="project_type" required>
                <option value="">Select Type</option>
                <option value="0">Residential</option>
                <option value="1">Commercial</option>
            </select>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Project Status <span style="color: red;">*</span></label>
            <select class="form-control" name="project_status" id="project_status" required>
                <option value="">Select Status</option>
                <option value="0">Running</option>
                <option value="1">Upcoming</option>
                <option value="2">Completed</option>
            </select>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <!-- <div class="form-group col-md-12 col-sm-12">
            <label for="">Thumbnail Image <span style="color: red;">*</span></label>
            <input type="file" class="form-control" id="thumbnail_image" name="thumbnail_image" required width="490" height="645">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div> -->

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Hero Image <span style="color: red;">*</span></label>
            <input type="file" class="form-control" id="hero_image" name="hero_image" required width="772" height="978">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">First Image <span style="color: red;">*</span></label>
            <input type="file" class="form-control" id="image_1" name="image_1" required width="370" height="260">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Second Image <span style="color: red;">*</span></label>
            <input type="file" class="form-control" id="image_2" name="image_2" required width="370" height="260">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-check" >
 
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1">
            <label class="form-check-label" for="">Is Active <span style="color: red;">*</span></label>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="is_popular" name="is_popular" value="1">
            <label class="form-check-label" for="">Is Popular <span style="color: red;">*</span></label>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <br>

        <div class="d-grid gap-2">
            <button class="btn btn-primary button-submit" type="submit" data-loading-text="Loading...">
                <i class="fadeIn animated bx bx-save"></i>Save</button>
        </div>

    </div>
</form>

<script>
    $('.button-submit').click(function() {
        // route name
        ajax_submit_store('projects')
    });
</script>