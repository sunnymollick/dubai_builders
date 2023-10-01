<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8"
    class="needs-validation" novalidate>
    {{method_field('PATCH')}}
    <div id="status"></div>
    <div class="form-row">

        <div class="form-group col-md-12">
            <label for="">Service Title <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="title" name="service_title"
                value="{{ $service->service_title }}" placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        <div class="form-group col-md-12 col-sm-12">
            <label for="">Service Details <span style="color: red;">*</span></label>
            <textarea type="text" class="form-control" id="details" name="service_details"
             placeholder="" required>{!! $service->service_details !!}</textarea>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        
        <div class="form-group col-md-12 col-sm-12">
            <label for="">Slogan <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="slogan" name="slogan" value="{{ $service->slogan }}"
            placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        
        <img src="{{asset($service->thumbnail_image)}}" alt="thumbnail image" height="80px" width="100px">
        <div class="form-group col-md-12 col-sm-12">
            <label for="">Thumbnail Image <span style="color: red;">*</span></label>
            <input type="file" class="form-control" id="thumb_image" value="{{$service->thumbnail_image}}" name="thumb_image" >
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        
        <img src="{{asset($service->hero_image)}}" alt="thumbnail image" height="80px" width="100px">
        <div class="form-group col-md-12 col-sm-12">
            <label for="">Hero Image <span style="color: red;">*</span></label>
            <input type="file" class="form-control" id="hero_image" vallue="{{$service->hero_image}}" name="hero_image" >
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        
        <img src="{{asset($service->image_1)}}" alt="thumbnail image" height="80px" width="100px">
        <div class="form-group col-md-12 col-sm-12">
            <label for="">First Image <span style="color: red;">*</span></label>
            <input type="file" class="form-control" id="image_1" value="{{$service->image_1}}" name="image_1" >
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        
        <img src="{{asset($service->image_2)}}" alt="thumbnail image" height="80px" width="100px">
        <div class="form-group col-md-12 col-sm-12">
            <label for="">Second Image <span style="color: red;">*</span></label>
            <input type="file" class="form-control" id="image_2" value="{{$service->image_2}}" name="image_2" >
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        
        <img src="{{asset($service->logo)}}" alt="thumbnail image" height="80px" width="100px">
        <div class="form-group col-md-12 col-sm-12">
            <label for="">Logo <span style="color: red;">*</span></label>
            <input type="file" class="form-control" id="logo" value="{{$service->logo}}" name="logo" >
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        
        <img src="{{asset($service->home_image)}}" alt="thumbnail image" height="80px" width="100px">
        <div class="form-group col-md-12 col-sm-12">
            <label for="">Home Image <span style="color: red;">*</span></label>
            <input type="file" class="form-control" id="home_image" value="{{$service->home_image}}" name="home_image" >
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>

        <div class="form-group col-md-12">
            <label for="">Video Link <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="video_link" name="video_link"
                value="{{ $service->video_link }}" placeholder="" required>
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
        // route name and record id
        ajax_submit_update('services', "{{ $service->id }}")
    });
</script>
