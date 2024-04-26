<?php

/**
 * This class extends Database, this class update password, otp, token and also check if anything present or not.

 */
class Google extends Database {

  /**
   * This function user present in db or not.
   *
   * @param  mixed $email
   *   User's email.
   *
   * @return bool
   *   Return true if present else false.
   */
  public function isUserPresent(string $email): bool {
    $sql = "SELECT email from credential WHERE email = ? LIMIT 1";
    $this->query($sql, [$email]);
    if ($this->fetch() != null) {
      return true;
    }
    return false;
  }

  /**
   * This function insert user's details.
   *
   * @param  mixed $email
   *   User's email.
   * @param  mixed $first_name
   *   User's first name.
   * @param  mixed $last_name
   *   User's last name.
   *
   * @return void
   */
  public function insert(string $email, string $first_name, string $last_name):void {
    $sql = "INSERT INTO credential (email, first_name, last_name, password) VALUES (?, ?, ?, ?)";
    $this->query($sql, [$email, $first_name, $last_name, pass_hash(uniqid())]);
  }
}
