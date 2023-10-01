
    <div id="status"></div>
    <div class="form-row">

        <div class="form-group col-md-12">
            <label for="">Service Title <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="title" name="service_title"
                value="{{ $service->service_title }}" readonly placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        <div class="form-group col-md-12 col-sm-12">
            <label for="">Service Details <span style="color: red;">*</span></label>
            <textarea readonly type="text" class="form-control" id="details" name="service_details"
             placeholder="" required>{!! $service->service_details !!}</textarea>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        
        <div class="form-group col-md-12 col-sm-12">
            <label for="">Slogan <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="slogan" name="slogan" readonly value="{{ $service->slogan }}"
            placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        
        <div class="form-group col-md-12 col-sm-12">
            <label for="">Thumbnail Image <span style="color: red;">*</span></label><br>
            <img src="{{asset($service->thumbnail_image)}}" alt="thumbnail image" height="80px" width="100px">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        
        <div class="form-group col-md-12 col-sm-12">
            <label for="">Hero Image <span style="color: red;">*</span></label><br>
            <img src="{{asset($service->hero_image)}}" alt="thumbnail image" height="80px" width="100px">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        
        <div class="form-group col-md-12 col-sm-12">
            <label for="">First Image <span style="color: red;">*</span></label><br>
            <img src="{{asset($service->image_1)}}" alt="thumbnail image" height="80px" width="100px">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        
        <div class="form-group col-md-12 col-sm-12">
            <label for="">Second Image <span style="color: red;">*</span></label><br>
            <img src="{{asset($service->image_2)}}" alt="thumbnail image" height="80px" width="100px">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        
        <div class="form-group col-md-12 col-sm-12">
            <label for="">Logo <span style="color: red;">*</span></label><br>
            <img src="{{asset($service->logo)}}" alt="thumbnail image" height="80px" width="100px">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>
        
        <div class="form-group col-md-12 col-sm-12">
            <label for="">Home Image <span style="color: red;">*</span></label><br>
            <img src="{{asset($service->home_image)}}" alt="thumbnail image" height="80px" width="100px">
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <br>


    </div>

