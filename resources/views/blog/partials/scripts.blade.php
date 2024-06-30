<!--   Core JS Files   -->
<script src="{{ asset('assets/blog/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/blog/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/blog/js/plugins/perfect-scrollbar.min.js') }}"></script>
<!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
<script src="{{ asset('assets/blog/js/plugins/countup.min.js') }}"></script>
<script src="{{ asset('assets/blog/js/plugins/prism.min.js') }}"></script>
<script src="{{ asset('assets/blog/js/plugins/highlight.min.js') }}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
<script src="{{ asset('assets/blog/js/material-kit.min.js?v=3.0.4') }}" type="text/javascript"></script>
<script>
  if (document.getElementById('typed')) {
      var typed = new Typed("#typed", {
        stringsElement: '#typed-strings',
        typeSpeed: 70,
        backSpeed: 50,
        backDelay: 200,
        startDelay: 500,
        loop: true
      });
    }
</script>
{{-- <!--  Sharrre libray -->
<script src="{{ asset('assets/blog/js/jquery.js') }}"></script>
<script src="{{ asset('assets/blog/js/bootstrap5.js') }}"></script>
<script src="{{ asset('assets/blog/js/script.js') }}"></script> --}}