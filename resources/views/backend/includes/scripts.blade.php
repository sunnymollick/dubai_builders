<!-- Bootstrap JS -->
<script src="{{asset('backend')}}/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{asset('backend')}}/js/jquery.min.js"></script>
<script src="{{asset('backend')}}/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{asset('backend')}}/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{asset('backend')}}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>


<script src="{{asset('backend')}}/js/index5.js"></script>

<!--app JS-->
<script src="{{asset('backend')}}/js/app.js"></script>

<script src="{{ asset('backend/assets/js/main.js') }}"></script>
<script src="{{ asset('backend/assets/js/ajax_submit.js') }}"></script>
<script src="{{ asset('backend/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/jquery.plainoverlay.min.js') }}"></script>

<!-- Sweet Alert library -->
<link rel="stylesheet" href="{{ asset('backend/assets/plugins/sweet-alert/sweetalert.css') }}">
<script src="{{ asset('backend/assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>

<link rel="stylesheet" href="{{ asset('backend/assets/plugins/select2/select2.min.css') }}">
<script src="{{ asset('backend/assets/plugins/select2/select2.full.min.js') }}"></script>


<!-- Toastr  library -->
<link rel="stylesheet" href="{{ asset('backend/assets/plugins/toastr/toastr.min.css') }}">
<script src="{{ asset('backend/assets/plugins/toastr/toastr.min.js') }}"></script>

<!-- icheck  library -->
<link rel="stylesheet" href="{{ asset('backend/assets/plugins/iCheck/all.css') }}">
<script src="{{ asset('backend/assets/plugins/iCheck/icheck.min.js') }}"></script>

<!-- Datepicker library -->
<link rel="stylesheet" href="{{ asset('backend/assets/plugins/datepicker/datepicker3.css') }}">
<script src="{{ asset('backend/assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('backend/assets/js/jquery.printElement.min.js') }}"></script>


<script>
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
</script>
<script>
    function notify_view(type, message) {

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr[type](message);

    }
</script>
