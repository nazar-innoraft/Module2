<?php

/**
 * This function checks is user is loggedin or not.
 *
 * @return bool
 *   Returns true if logged in else false.
 */
function is_loggedin():bool {
  session_start();
  if (isset($_SESSION['username'])) {
    return true;
  } else {
    return false;
  }
}

/**
 * This function convert text to password hash.
 *
 * @return string
 *  Returns password hash.
 */
function pass_hash(string $pass):string {
  return password_hash($pass, PASSWORD_DEFAULT);
}

/**
 * This function unset session when user logged out.
 *
 * @return void
 */
function unset_session() {
  session_start();
  $_SESSION = [];
  unset($_SESSION['email']);
  session_destroy();
}

/**
 * This function checks is password is valid or not.
 *
 * @return string
 *   Returns result.
 */
function is_password_valid(string $password, string $cpassword): string {
  $passwordErr = 'SUCCESS';
  if ($password != null && $cpassword != null) {
    if (strlen($password) < 4) {
      $passwordErr = "Your Password Must Contain At Least 8 Characters!";
    } elseif (!preg_match("/[0-9]+/", $password)) {
      $passwordErr = "Your Password Must Contain At Least 1 Number!";
    } elseif (!preg_match("/[A-Z]+/", $password)) {
      $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    } elseif (!preg_match("/[a-z]+/", $password)) {
      $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    } elseif (!preg_match("/[\W]+/", $password)) {
      $passwordErr = "Your Password Must Contain At Least 1 Special Character!";
    } elseif (strcmp($password, $cpassword) !== 0) {
      $passwordErr = "Passwords must match!";
    }
  } else {
    $passwordErr = "Please enter password ";
  }
  return $passwordErr;
}

/**
 * This function genrate otp.
 *
 * @return int
 *   Returns random number of length 6.
 */
function genarate_otp():int {
  return mt_rand(111111, 999999);
}

  /**
   * This function sets session.
   *
   * @return void
   */
  function setSession(string $email):void {
    session_start();
    $_SESSION['email'] = $email;
  }
