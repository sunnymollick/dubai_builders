<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation" novalidate>
    <div id="status"></div>
    <div class="form-row">

        <div class="form-group col-md-12">
            <label for="">Project Name </label>
            <input type="text" class="form-control" id="project_title" name="project_title" value="{{$project->project_title}}" placeholder="" readonly>
            
        </div>
        <div class="clearfix"></div>


        <div class="form-group col-md-12">
            <label for="">Client Name </label>
            <input class="form-control" name="client_id" id="client_id" value="{{$project->client->name}}" readonly>
            
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Project Description </label>
            <textarea readonly class="form-control" id="project_description" name="project_description" cols="50" rows="4">{{$project->project_description}}</textarea>
            
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Project Features </label>
            <textarea readonly class="form-control" id="project_features" name="project_features" cols="50" rows="4">{{$project->project_features}}</textarea>
            
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Project Location </label>
            <input readonly type="text" class="form-control" id="project_location" name="project_location" value="{{$project->project_location}}" placeholder="">
            
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Project Problem </label>
            <input readonly type="text" class="form-control" id="project_problem" name="project_problem" value="{{$project->project_problem}}" placeholder="">
            
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Handover_time </label>
            <input readonly type="text" class="form-control" id="handover_time" name="handover_time" value="{{$project->handover_time}}" placeholder="">
            
        </div>
        <div class="clearfix"></div>


        <!-- <div class="form-group col-md-12 col-sm-12">
            <label for="">Thumbnail Image </label>
            <input type="file" class="form-control" id="thumbnail_image" name="thumbnail_image"  width="490" height="645">
            
        </div>
        <div class="clearfix"></div> -->

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Hero Image </label><br>
            <img src="{{asset($project->hero_image)}}" alt="" height="80" width="80">
            
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">First Image </label><br>
            <img src="{{asset($project->image_1)}}" alt="" height="80" width="80">
            
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Second Image </label><br>
            <img src="{{asset($project->image_2)}}" alt="" height="80" width="80">
            
        </div>
        <div class="clearfix"></div>

        <!-- <div class="form-check">

            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ $project->is_active == '1' ? 'checked' : '' }}>
            <label class="form-check-label" for="">Is Active </label>
            
        </div>
        <div class="clearfix"></div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="is_popular" name="is_popular" value="1" {{ $project->is_popular == '1' ? 'checked' : '' }}>
            <label class="form-check-label" for="">Is Popular </label>
            
        </div>
        <div class="clearfix"></div> -->
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
