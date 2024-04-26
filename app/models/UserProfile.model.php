<?php

/**
 * This class extends Database, this class check profile details.
 */
class UserProfile extends Database {

  /**
   *  This function check check profile exists or not.
   *
   * @param  string $email
   *   User's email.
   *
   * @return array or bool
   *   Return result string or false.
   */
  public function isProfileExist($email):array | bool {
    try {
      $sql = "SELECT * from user WHERE email = ? LIMIT 1";
      $this->query($sql, [$email]);
      $res = $this->fetch();
      if ($res == null) {
        return false;
      }
      return $res;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  /**
   *  This function update profile.
   *
   * @param  string $email
   *   User's email.
   *
   * @return string
   *   Return result string.
   */
  public function update(string $first_name, string $last_name, string $phone, string $email):string {
    try {
      $sql = "UPDATE user SET first_name = ?, last_name = ?, phone = ? WHERE email = ?";
      $this->query($sql, [$first_name, $last_name, $phone, $email]);
      return 'SUCCESS';
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
