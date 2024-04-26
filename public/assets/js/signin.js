const pass = document.getElementById('password');
const eye = document.getElementsByClassName('eye-solid')[0];
const eye_slash = document.getElementsByClassName('eye-slash')[0];

/**
 * This function show and hide eye buttons.
 *
 * @return void
 */
function toggle() {
  if (pass.type === "text") {
    pass.setAttribute("type", "password");
    eye.style.display = "none";
    eye_slash.style.display = "inline";
  } else {
    pass.setAttribute("type", "text");
    eye.style.display = 'inline';
    eye_slash.style.display = "none";
  }
}

eye.addEventListener('click', toggle);
eye_slash.addEventListener('click', toggle);
