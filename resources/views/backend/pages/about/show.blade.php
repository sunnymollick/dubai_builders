<div class="row">
    <div class="col-md-12">
        <form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div id="status"></div>
            {{method_field('PATCH')}}
            <div class="container">
                <div class="form-group col-md-12">
                    <strong>Title</strong>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $about->title }}"
                           placeholder="" readonly>
                    <span id="error_title" class="text-danger"></span>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <strong>Slug</strong>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $about->slug }}"
                        placeholder="" readonly>
                    <span id="error_email" class="text-danger"></span>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <strong>Description:</strong>
                    <textarea name="description" id="description" cols="56" rows="5" readonly>{!! $about->description !!}
                    </textarea>
                    <span id="error_description" class="text-danger"></span>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <strong>Short Description:</strong>
                    <textarea name="short_description" id="short_description" cols="56" rows="3" readonly>{!! $about->short_description !!}
                    </textarea>
                    <span id="error_short_description" class="text-danger"></span>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <strong>Our Mission:</strong>
                    <textarea name="our_mission" id="our_mission" cols="56" rows="3" readonly>{!! $about->our_mission !!}
                    </textarea>
                    <span id="error_our_mission" class="text-danger"></span>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12">
                    <strong>Our Vision:</strong>
                    <textarea name="our_vision" id="our_vision" cols="56" rows="3" readonly>{!! $about->our_vision !!}
                    </textarea>
                    <span id="error_our_vision" class="text-danger"></span>
                </div>
                <div class="clearfix"></div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <strong>Our Builders</strong>
                        <input type="number" class="form-control" id="our_builders" name="our_builders" value="{{ $about->our_builders }}"
                            placeholder="" readonly>
                        <span id="error_our_builders" class="text-danger"></span>
                    </div>
                    <div class="col-md-6">
                        <strong>Experience Year</strong>
                        <input type="number" class="form-control" id="experience_year" name="experience_year" value="{{ $about->experience_year }}"
                            placeholder="" readonly>
                        <span id="error_experience_year" class="text-danger"></span>
                    </div>
                </div>
                <div class="clearfix"></div>
                <p></p>
                <div class="form-group col-md-12">
                    <strong>Hero Image: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                    <img id="logoPreview" src="{{ asset($about->hero_image) }}" alt="Current Logo" width="100" height="100">
                    <p></p>
                </div>
                <div class="clearfix"></div>
                <p></p>
                <div class="form-group col-md-12">
                    <strong>About Image : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                    <img id="logoPreview_1" src="{{ asset($about->about_image) }}" alt="Current Logo" width="100" height="100">
                </div>
            </div>
        </form>

    </div>
</div>
