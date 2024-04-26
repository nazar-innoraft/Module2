/**
 *This function show preview of selected image.
 *
 * @param input
 *   Input elements.
 *
 * @return void
 */
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById("imagePreview").src = e.target.result;
    };
    reader.readAsDataURL(input.files[0]);
  }
}

const pass = document.getElementById("pass");
const c_pass = document.getElementById("c_pass");

/**
 * This function check both password and confirm password are same and password is in proper length.
 *
 * @return void
 */
function check_pass() {
  if (pass.value != c_pass.value) {
    document.getElementById("submit").disabled = true;
    document.getElementById("wrong").innerHTML = "password not matched";
  } else {
    if (pass.value.length < 4) {
      document.getElementById("wrong").innerHTML = "password must be greater than 3";
      document.getElementById("submit").disabled = true;
    } else {
      document.getElementById("submit").disabled = false;
      document.getElementById("wrong").innerHTML = "";
    }
  }
}
pass.addEventListener("input", check_pass);
c_pass.addEventListener("input", check_pass);
