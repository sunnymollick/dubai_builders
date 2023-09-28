<!-- All JavaScript Files -->
<script src="{{ asset('frontend/') }}/js/jquery-3.6.0.min.js"></script>
<script src="{{ asset('frontend/') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('frontend/') }}/plugins/swiper/swiper-bundle.min.js"></script>

<script src="{{ asset('frontend/') }}/plugins/menu/ma5-menu.min.js"></script>
<script src="{{ asset('frontend/') }}/plugins/owlcarousel/owl.carousel.min.js"></script>

<!-- Select2 -->
<script src="{{ asset('frontend/') }}/plugins/select2/js/select2.min.js"></script>

<!-- Isotope -->
<script src="{{ asset('frontend/') }}/plugins/isotope/isotope.pkgd.min.js"></script>
<script src="{{ asset('frontend/') }}/plugins/isotope/imagesloaded.pkgd.min.js"></script>

<script src="{{ asset('frontend/') }}/plugins/aos/aos.js"></script>

<script src="{{ asset('frontend/') }}/js/custom.js"></script>




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
    $.fn.modal.Constructor.prototype.enforceFocus = function () {
    };
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
