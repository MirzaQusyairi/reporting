"use strict";

$('.modal-edit-facility').appendTo("body")
$('#modal-create-facility').appendTo("body")
$('.modal-edit-type').appendTo("body")
$('#modal-create-type').appendTo("body")
$('.modal-edit-user').appendTo("body")
$('#modal-create-user').appendTo("body")
$('.modal-edit-reservation').appendTo("body")
$('.modal-view-evidence').appendTo("body")
$('.modal-review').appendTo("body")

$('.btn-delete').on('click', function (e) {
  e.preventDefault();
  let form = $(this).closest('form');
  let id = $(this).data('id');
  swal({
    title: 'Yakin Menghapus Data Ini?',
    text: "data yang sudah dihapus tidak dapat dikembalikan!",
    icon: 'warning',
    buttons: true,
    dangerMode: true,
  }).then((result) => {
    if (result) {
      form.submit();
    }
  })
});

// $("#table-1").dataTable({
//   // "columnDefs": [
//   //   { "sortable": false, "targets": [2,3] }
//   // ]
// });

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

$('.currency').each(function () {
  var cleaveC = new Cleave(this, {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
  });
});

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

// Set maxlength for identity number
$('#identity_type').on('change', function () {
  var value = $('#identity_type option:selected').val();

  if (value == 'ktp') {
    $('#identity_number').val('');
    $('#identity_number').attr('maxlength', '16');
  } else if (value == 'sim') {
    $('#identity_number').val('');
    $('#identity_number').attr('maxlength', '12');
  } else {
    $('#identity_number').val('');
    $('#identity_number').attr('maxlength', '20');
  }
});

function onlyNumberKey(evt) {
  // Only ASCII character in that range allowed
  var ASCIICode = (evt.which) ? evt.which : evt.keyCode
  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
    return false;
  return true;
}

$('#check_in').on('change', function () {
  var checkInDate = new Date($('#check_in').val());

  var checkOutDate = new Date(checkInDate);
  checkOutDate.setDate(checkInDate.getDate() + 1);

  var formattedCheckOutDate = checkOutDate.toISOString().split('T')[0];

  $('#check_out').daterangepicker({
    locale: { format: 'YYYY-MM-DD' },
    singleDatePicker: true,
    minDate: formattedCheckOutDate,
  });
});

$('#check_in').daterangepicker({
  locale: { format: 'YYYY-MM-DD' },
  singleDatePicker: true,
  minDate: new Date(),
});

var checkout = new Date();
checkout.setDate(checkout.getDate() + 1);
$('#check_out').daterangepicker({
  locale: { format: 'YYYY-MM-DD' },
  singleDatePicker: true,
  minDate: checkout,
});

$(function () {
  // Multiple images preview with JavaScript
  var previewImages = function (input, imgPreviewPlaceholder) {
    if (input.files) {
      var filesAmount = input.files.length;
      for (var i = 0; i < filesAmount; i++) {
        var reader = new FileReader();
        reader.onload = function (event) {
          $($.parseHTML('<img>')).attr('src', event.target.result).attr('class', 'image-item').appendTo(imgPreviewPlaceholder);
        }
        reader.readAsDataURL(input.files[i]);
      }
    }
  };

  $('#images').on('change', function () {
    document.querySelectorAll(".images-preview-div img").forEach(img => img.remove());

    previewImages(this, 'div.images-preview-div');
  });

  $('#image_360').on('change', function () {
    document.querySelectorAll(".image-360-preview-div img").forEach(img => img.remove());

    previewImages(this, 'div.image-360-preview-div');
  });

  $('#photo').on('change', function () {
    bsCustomFileInput.init();
  });
  // $(function () {
  //   bsCustomFileInput.init();
  // });

  $('#evidence').on('change', function () {
    var input = document.getElementById('evidence');
    var output = document.getElementById('fileList');
    var children = "";
    for (var i = 0; i < input.files.length; ++i) {
      children += '<li>' + input.files.item(i).name + '</li>';
    }
    output.innerHTML = '<ul>' + children + '</ul>';
  });

  // Set maxlength for identity number
  if ($('#identity_number').length > 0) {
    var value = $('#identity_type option:selected').val();

    if (value == 'ktp') {
      $('#identity_number').attr('maxlength', '16');
    } else if (value == 'sim') {
      $('#identity_number').attr('maxlength', '12');
    } else {
      $('#identity_number').attr('maxlength', '20');
    }
  }
});

// swal({
//   title: 'Are you sure?',
//   text: 'Once deleted, you will not be able to recover this imaginary file!',
//   icon: 'warning',
//   buttons: true,
//   dangerMode: true,
// })
// .then((willDelete) => {
//   if (willDelete) {
//   swal('Poof! Your imaginary file has been deleted!', {
//     icon: 'success',
//   });
//   } else {
//   swal('Your imaginary file is safe!');
//   }
// });


