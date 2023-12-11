<form id='edit' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation" novalidate>
    <div id="status"></div>
    <div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="">Client Name </label>
                <input class="form-control" name="name" id="name" value="{{$quotation_request->name}}" readonly>
            </div>
            <div class="col-md-6">
                <label for="">Email </label>
                <input readonly type="text" class="form-control" id="email" name="email" value="{{$quotation_request->email}}" placeholder="">
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="form-group row">
            <div class="col-md-6">
                <label for="">Mobile</label>
                <input readonly type="text" class="form-control" id="mobile" name="mobile" value="{{$quotation_request->mobile}}" placeholder="">
            </div>
            <div class="col-md-6">
                <label for="">Project Type </label>
                <input readonly type="text" class="form-control" id="project_type" name="project_type" value="{{$quotation_request->project_type}}" placeholder="">
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="form-group row">
            <div class="col-md-12">
                <label for="">Location </label>
                <input readonly type="text" class="form-control" id="location" name="location" value="{{$quotation_request->location}}" placeholder="">
            </div>

        </div>
        <div class="clearfix"></div>

        <div class="form-group row">
            <div class="col-md-3">
                <label for="">Requested Budget </label>
                <input readonly type="text" class="form-control" id="evaluate_budget" name="evaluate_budget" value="{{$quotation_request->evaluate_budget}} TK" placeholder="">
            </div>
            <div class="col-md-3">
                <label for="">Requested Time </label>
                <input readonly type="text" class="form-control" id="project_time" name="project_time" value="{{$quotation_request->project_time}}" placeholder="">
            </div>
            <div class="col-md-6">
                <label for="">Company Name </label>
            <input readonly type="text" class="form-control" id="company_name" name="company_name" value="{{$quotation_request->company_name ?? ''}}" placeholder="">
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="form-group col-md-12 col-sm-12">
            <label for="">Message </label>
            <textarea readonly class="form-control" id="message" name="message" >{{$quotation_request->message}}</textarea>

        </div>
        <div class="clearfix"></div>

    </div>
</form>

