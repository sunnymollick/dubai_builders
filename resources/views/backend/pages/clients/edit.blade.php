<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation"
    novalidate>
    {{method_field('PATCH')}}
    <div id="status"></div>
    <div class="form-row">

        <div class="form-group col-md-12">
            <label for="">Client Name <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $client->name }}"
                   placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Oraganization Name <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="organization_name" name="organization_name" value="{{ $client->organization_name }}"
                   placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Email <span style="color: red;">*</span></label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}"
                   placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Phone <span style="color: red;">*</span></label>
            <input type="phone" class="form-control" id="phone" name="phone" value="{{ $client->phone }}"
                   placeholder="" required>
            <span id="error_title" class="has-error"></span>
        </div>
        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Address <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $client->address }}"
                   placeholder="" required>
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

    $('#table_field').on('click', '#remove', function(){
        $(this).closest('tr').remove();

    });

    $('.button-submit').click(function () {
        // route name and record id
        ajax_submit_update('clients', "{{ $client->id }}")
    });




</script>
