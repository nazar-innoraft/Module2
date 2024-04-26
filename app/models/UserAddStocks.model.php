<?php

/**
 * This class extends Database, this class handles signup process.
 */
class UserAddStocks extends Database {

  public function createStock(string $email, string $stock_name, string $stock_price) {
    $sql = "INSERT INTO stock (email, stock_name, stock_price, created_at) VALUES (?, ?, ?, ?)";
    if ($this->isUserPresent($email)) {
      $this->query($sql, [$email, $stock_name, $stock_price, date('Y-m-d H:i:s', time())]);
      return 'SUCCESS';
    } else {
      return 'User already registered';
    }
  }

  /**
   * This function checks if user present in db or not.
   *
   * @param  mixed $email
   *   User's email.
   *
   * @return bool
   *   Returns true if present else false.
   */
  private function isUserPresent(string $email): bool {
    $sql = "SELECT email from user WHERE email = ? LIMIT 1";
    $this->query($sql, [$email]);
    if ($this->fetch() != null) {
      return true;
    }
    return false;
  }
}
