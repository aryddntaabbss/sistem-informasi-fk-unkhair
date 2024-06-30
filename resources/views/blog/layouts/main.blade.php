<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="{{ asset('assets/blog/img/favicon.png') }}">
  <title>FAKULTAS TEKNIK UNIVERSITAS KHAIRUN
  </title>
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
  <link href="{{ asset('assets/blog/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/blog/css/nucleo-svg.css') }}" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link id="pagestyle" href="{{ asset('assets/blog/css/material-kit.css') }}" rel="stylesheet" />
  {{--
  <link rel="stylesheet" href="{{ asset('assets/blog/css/bootstrap5.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('assets/blog/css/style.css') }}">
  <script defer data-site="http://127.0.0.1:8000/" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body>

  <!-- ======= Main Section ======= -->
  <main id="main">

    @yield('body')
  </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- ======= Scripts ======= -->
  @include('blog.partials.scripts')
  @stack('scripts')
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var navigation = document.getElementById("navigation");
      if (navigation.classList.contains("show")) {
        navigation.classList.remove("show");
      }
    });
  </script>
</body>

</html>