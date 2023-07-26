<script>
  function msg() {
    @if(session()->has('loginError'))
      swal({
        title: 'Error!',
        text: "{{ session('loginError') }}",
        icon: 'error',
      });
    @elseif(session()->has('loginWarning'))
      swal({
        title: 'Warning!',
        text: "{{ session('loginWarning') }}",
        icon: 'warning',
      });
    @endif
  }

  window.onload = msg;
</script>