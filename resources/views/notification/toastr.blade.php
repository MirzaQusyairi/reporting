<script>
	function msg() {
		@if(Session::has('success_message'))
      iziToast.success({
        title: 'Success!',
        message: '{{Session::get("success_message")}}',
        position: 'topRight'
      });
		@elseif(Session::has('warning_message'))
      iziToast.warning({
        title: 'Warning!',
        message: '{{Session::get("warning_message")}}',
        position: 'topRight'
      });
    @elseif(Session::has('error_message'))
      iziToast.error({
        title: 'Error!',
        message: '{{Session::get("error_message")}}',
        position: 'topRight'
      });
		@endif
		// @foreach($errors->all() as $error)
    //   iziToast.error({
    //     title: 'Error!',
    //     message: '{{ $error }}',
    //     position: 'topRight'
    //   });
		// @endforeach 
		// @if(!empty($warning))
    //   iziToast.error({
    //     title: 'Warning!',
    //     message: '{{$warning}}',
    //     position: 'topRight'
    //   });
		// @endif
    
	}

	window.onload = msg;
</script>