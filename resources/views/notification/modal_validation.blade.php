@if(Session::has('error_modal_type'))
  <script>
    $('#modal-create-type').modal('show');
  </script>
@elseif(Session::has('error_modal_type_edit'))
  <script>
    $('#modal-edit-type-{{ Session::get('error_modal_type_edit') }}').modal('show');
  </script>
@elseif(Session::has('error_modal_user'))
  <script>
    $('#modal-create-user').modal('show');
  </script>
@elseif(Session::has('error_modal_user_edit'))
<script>
  $('#modal-edit-user-{{ Session::get('error_modal_user_edit') }}').modal('show');
</script>
@elseif(Session::has('error_modal_facility'))
  <script>
    $('#modal-create-facility').modal('show');
  </script>
@elseif(Session::has('error_modal_facility_edit'))
<script>
  $('#modal-edit-facility-{{ Session::get('error_modal_facility_edit') }}').modal('show');
</script>
@endif