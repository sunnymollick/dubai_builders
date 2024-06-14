<form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation" novalidate>
    <div id="status"></div>
    <div class="col">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="">Project Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="project_title" name="project_title" value="" placeholder="" required>
                    <span id="error_title" class="has-error"></span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

<br>
        <div class="row">

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="">Project Description <span style="color: red;">*</span></label>
                    <textarea class="form-control ckeditor" id="project_description" name="project_description" value="" cols="50" rows="4"></textarea>
                    <span id="error_title" class="has-error"></span>
                </div>
                <div class="clearfix"></div>
            </div>



        </div>
<br>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="">Project Location <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="project_location" name="project_location" value="" placeholder="" required>
                    <span id="error_title" class="has-error"></span>
                </div>
                <div class="clearfix"></div>
            </div>


            <div class="col-sm">
                <div class="form-group">
                    <label for="">Project Type <span style="color: red;">*</span></label>
                    <select class="form-control" name="project_type" id="project_type" required>
                        <option value="">Select Type</option>
                        <option value="0">Residential</option>
                        <option value="1">Commercial</option>
                        <option value="2">Highrise</option>
                        <option value="3">Business</option>
                    </select>
                    <span id="error_title" class="has-error"></span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm">
                <div class="form-group">
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
            </div>






        </div>
<br>

        <!-- <div class="form-group">
            <label for="">Thumbnail Image <span style="color: red;">*</span></label>
            <input type="file" class="form-control" id="thumbnail_image" name="thumbnail_image" required width="490" height="645">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div> -->

        <div class="row">

            <div class="col-sm">
                <div class="form-group">
                    <label for="">Hero Image <span style="color: red;">*</span></label>
                    <input type="file" class="form-control" id="hero_image" name="hero_image" required>
                    <p style="color: red; font-size: 12px">Photo must be 770 X 980 pixel (width X height)</p>
                    <span id="error_title" class="has-error"></span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="">First Image <span style="color: red;">*</span></label>
                    <input type="file" class="form-control" id="image_1" name="image_1" width="370" height="260">
                    <p style="color: red; font-size: 12px">Photo must be 370 X 260 pixel (width X height)</p>
                    <span id="error_title" class="has-error"></span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="">Second Image <span style="color: red;">*</span></label>
                    <input type="file" class="form-control" id="image_2" name="image_2" width="370" height="260">
                    <p style="color: red; font-size: 12px">Photo must be 370 X 260 pixel (width X height)</p>
                    <span id="error_title" class="has-error"></span>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>


                <div class="form-group col-sm-4">
                    <label for="">Handover_time <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="handover_time" name="handover_time" value="" placeholder="">
                    <span id="error_title" class="has-error"></span>
                </div>
                <div class="clearfix"></div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1">
                    <label class="form-check-label" for="">Is Active </label>
                    <span id="error_title" class="has-error"></span>
                </div>
                <div class="clearfix"></div>
                    <input type="checkbox" class="form-check-input" id="is_popular" name="is_popular" value="1">
                    <label class="form-check-label" for="">Is Popular </label>
                    <span id="error_title" class="has-error"></span>
                </div>
                <div class="clearfix"></div>




        <br>

        <div class="d-grid gap-2 col-sm-2">
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

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>
