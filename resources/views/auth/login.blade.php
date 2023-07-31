<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SIPERNIK | Masuk</title>

  <!-- General CSS Files -->
  <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css') }}">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-xl-6 align-items-center justify-content-center d-none d-lg-flex">
            <img src="{{ asset('assets/img/bg_dprd_kepri.png') }}" alt="" style="width: 70%">
          </div>
          {{-- <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4"> --}}
          <div class="col-12 col-xl-4">
            
            <div class="card card-primary mt-5">
              <div class="card-header" style="display: grid">
                <h3 class="m-auto">SIPERNIK</h3>
                <p class="m-auto">Sistem Pertanggungjawaban secara Elektronik</p>
              </div>

              <div class="card-body">
                <form method="POST" action="{{ route('auth.authenticate') }}">
                  @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" value="{{ old('email') }}" autofocus>
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Kata Sandi</label>
                    </div>
                    <div class="input-group">
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" value="{{ old('password') }}">
                      <div class="input-group-append">
                        <div class="input-group-text" onclick="togglePasswordVisibility('password','passwordicon')">
                          <i class="fas fa-eye" id="passwordicon"></i>
                        </div>
                      </div>
                      @error('password')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Ingat saya</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-green btn-lg btn-block" tabindex="4">
                      Masuk
                    </button>
                  </div>
                </form>

              </div>
            </div>
            <div class="login-brand">
              <img src="{{ asset('assets/img/logo_prov_kepri.png') }}" alt="logo" width="60" class="">
              <img src="{{ asset('assets/img/logo_dprd_kepri.png') }}" alt="logo" width="60" class="">
              <img src="{{ asset('assets/img/logo_telkom_university.png') }}" alt="logo" width="50" class="">
            </div>

            <div class="simple-footer">
              Copyright &copy; SIPERNIK {{ date('Y') }}
            </div>
          </div>
        </div>
      </div>
    </section>
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
  <script src="{{ asset('stisla/assets/modules/sweetalert/sweetalert.min.js') }}"></script>

  <!-- Page Specific JS File -->
  @include('notification.swal')
  
  <!-- Template JS File -->
  <script src="{{ asset('stisla/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/custom.js') }}"></script>
</body>
</html>