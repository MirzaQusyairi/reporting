<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SIFERNIK | @yield('page_name')</title>

  <!-- General CSS Files -->
  <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('stisla/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/modules/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/modules/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/modules/jquery-selectric/selectric.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/modules/izitoast/css/iziToast.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/modules/chocolat/dist/css/chocolat.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css') }}">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      @include('layouts.admin-header')
      
      @include('layouts.admin-sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="" class="btn btn-icon" onclick="window.history.go(-1); return false;"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>@yield('page_name')</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">SIFERNIK</a></div>
              {{-- <div class="breadcrumb-item"><a href="#">Posts</a></div> --}}
              <div class="breadcrumb-item">@yield('page_name')</div>
            </div>
          </div>
      
          <div class="section-body">
            @yield('content')
          </div>
        </section>
      </div>

      @include('layouts.admin-footer')

    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('stisla/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/popper.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->
  <script src="{{ asset('stisla/assets/modules/cleave-js/dist/cleave.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/chart.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/summernote/summernote-bs4.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/izitoast/js/iziToast.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/sweetalert/sweetalert.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
  <script src="{{ asset('stisla/assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('stisla/assets/js/page/index.js') }}"></script>
  <script src="{{ asset('assets/js/page/index.js') }}"></script>
  
  <!-- Template JS File -->
  <script src="{{ asset('stisla/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/custom.js') }}"></script>

  @if(auth()->user()->status == 0)
    <script>
      document.getElementById('logout-form').submit();
    </script>
  @endif
  
  @include('notification.modal_validation')
</body>
</html>