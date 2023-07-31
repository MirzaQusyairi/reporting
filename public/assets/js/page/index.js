"use strict";

$('.modal-edit-user').appendTo("body")
$('#modal-create-user').appendTo("body")
$('.modal-view-evidence').appendTo("body")
$('.modal-review').appendTo("body")
$('.modal-guide').appendTo("body")

$('.btn-delete').on('click', function (e) {
  e.preventDefault();
  let form = $(this).closest('form');
  let id = $(this).data('id');
  swal({
    title: 'Yakin Hapus Data Ini?',
    text: "Data yang sudah dihapus tidak dapat dikembalikan!",
    icon: 'warning',
    buttons: true,
    dangerMode: true,
  }).then((result) => {
    if (result) {
      form.submit();
    }
  })
});

$('.table').each(function () {
  $(this).dataTable();
});

$.uploadPreview({
  input_field: "#image-upload",   // Default: .image-upload
  preview_box: "#image-preview",  // Default: .image-preview
  label_field: "#image-label",    // Default: .image-label
  label_default: "Choose File",   // Default: Choose File
  label_selected: "Change File",  // Default: Change File
  no_label: false,                // Default: false
  success_callback: null          // Default: null
});
$(".inputtags").tagsinput('items');

// Show hide password
function togglePasswordVisibility(ID, IconID) {
  var passwordFields = document.getElementById(ID);
  var eyeIcons = document.getElementById(IconID);

  if (passwordFields.type === 'password') {
    passwordFields.type = 'text';
    eyeIcons.classList.remove('fa-eye');
    eyeIcons.classList.add('fa-eye-slash');
  } else {
    passwordFields.type = 'password';
    eyeIcons.classList.remove('fa-eye-slash');
    eyeIcons.classList.add('fa-eye');
  }
};

$(window).resize(function () {
  console.log('resize called');
  var width = $(window).width();
  if (width < 768) {
    $('.btn-guide').removeClass('btn-warning');
  } else if (width > 768) {
    $('.btn-guide').addClass('btn-warning');
  }
}).resize();

function onlyNumberKey(evt) {
  // Only ASCII character in that range allowed
  var ASCIICode = (evt.which) ? evt.which : evt.keyCode
  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
    return false;
  return true;
}

$('.upload-photo').on('change', function () {
  bsCustomFileInput.init();
});

$('#evidence').on('change', function () {
  var input = document.getElementById('evidence');
  var output = document.getElementById('fileList');
  var children = "";
  for (var i = 0; i < input.files.length; ++i) {
    children += '<li>' + input.files.item(i).name + '</li>';
  }
  output.innerHTML = '<ul>' + children + '</ul>';
});



