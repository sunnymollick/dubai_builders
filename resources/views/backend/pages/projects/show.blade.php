<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation" novalidate>
    <div id="status"></div>
    <div class="col">
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="">Project Name </label>
                    <input type="text" class="form-control" id="project_title" name="project_title" value="{{$project->project_title}}" placeholder="" readonly>

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="">Client Name </label>
                    <input class="form-control" name="client_id" id="client_id" value="{{$project->client->name}}" readonly>

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="">Project Permit </label>
                    <input class="form-control" name="project_permit" id="project_permit" value="{{$project->project_permit}}" readonly>

                </div>
                <div class="clearfix"></div>
            </div>






        </div>
        <br>
        <div class="row">
            <div class="form-group">
                <label for="">Project Description </label>
                <textarea readonly class="form-control" id="project_description" name="project_description" cols="50" rows="4">{{$project->project_description}}</textarea>

            </div>

            <div class="clearfix"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="" class="col-sm-3">Hero Image </label>
                    <img src="{{asset($project->hero_image)}}" alt="" height="100" width="120">

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="" class="col-sm-3">First Image </label>
                    <img src="{{asset($project->image_1)}}" alt="" height="100" width="120">

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="" class="col-sm-3">Second Image </label>
                    <img src="{{asset($project->image_2)}}" alt="" height="100" width="120">

                </div>
                <div class="clearfix"></div>
            </div>


        </div>
        <br>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="">Project Location </label>
                    <input readonly type="text" class="form-control" id="project_location" name="project_location" value="{{$project->project_location}}" placeholder="">

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="">Handover_time </label>
                    <input readonly type="text" class="form-control" id="handover_time" name="handover_time" value="{{$project->handover_time}}" placeholder="">

                </div>
                <div class="clearfix"></div>
            </div>


        </div>




        <!-- <div class="form-group">
            <label for="">Thumbnail Image </label>
            <input type="file" class="form-control" id="thumbnail_image" name="thumbnail_image"  width="490" height="645">
            
        </div>
        <div class="clearfix"></div> -->


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