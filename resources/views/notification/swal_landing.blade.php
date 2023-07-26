<script>
  function msg() {
    @if(session()->has('error_message'))
      swal({
        title: 'Error!',
        text: "{{ session('error_message') }}",
        icon: 'error',
      });
    @elseif(session()->has('warning_message'))
      swal({
        title: 'Warning!',
        text: "{{ session('warning_message') }}",
        icon: 'warning',
      });
    @endif
  }

  window.onload = msg;
</script>