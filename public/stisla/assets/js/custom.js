/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

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