<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation" novalidate>
    {{ method_field('PATCH') }}
    <div id="status"></div>
    <div class="form-row">

        <div class="form-group col-md-12">
            <label for="">Name <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="name" name="name" value="{{$team->name}}" placeholder="" >
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12">
            <label for="">Designation <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="designation" name="designation" value="{{$team->designation}}" placeholder="" >
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12">
            <label for="">Email <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="email" name="email" value="{{$team->email}}" placeholder="" >
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12">
            <label for="">Phone No. <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{$team->phone}}" placeholder="" >
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12">
            <label for="">Facebook <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="fb_link" name="fb_link" value="{{$team->fb_link}}" placeholder="" >
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12">
            <label for="">Twitter <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="x_link" name="x_link" value="{{$team->x_link}}" placeholder="" >
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12">
            <label for="">Linkedin <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="linkedin_link" name="linkedin_link" value="{{$team->linkedin_link}}" placeholder="" >
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12">
            <label for="">Order <span style="color: red;">*</span></label>
            <input type="number" class="form-control" id="order" name="order" value="{{$team->order}}" placeholder="" >
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>


        <div class="form-group col-md-12 col-sm-12">
            <label for="">Description <span style="color: red;">*</span></label>
            <textarea class="form-control ckeditor" id="description" name="description" cols="50" rows="4" >{{$team->description}}</textarea>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Photo <span style="color: red;">*</span></label>

            <input type="file" class="form-control" id="image" name="image" width="772" height="978"><br>
            <img src="{{asset($team->image)}}" height="100px" width="100px" alt="">
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

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>

    $('#table_field').on('click', '#remove', function(){
        $(this).closest('tr').remove();

    });

    $('.button-submit').click(function () {
        // route name and record id
        ajax_submit_update('team', "{{ $team->id }}")
    });


    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });

</script>
