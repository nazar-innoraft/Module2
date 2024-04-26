<?php

/**
 * This class extends Database, this class update posts and fetch posts from db.
 */
class UserAction extends Database
{

  /**
   * This function fetch posts from db.
   *
   * @return array
   *   Return array of posts.
   */
  public function deleteStock(string $email, int $id) {
    $sql = "DELETE FROM stock WHERE email = ? AND id = ?";
    if ($this->query($sql, [$email, $id]) != false) {
      return true;
    } else {
      return false;
    }

  }


  public function updateStock(int $stock_price, int $id): bool {
    $sql = "UPDATE srock SET stock_price = ? WHERE id = ?";
    if ($this->query($sql, [$stock_price, $id]) != false) {
      return true;
    } else {
      return false;
    }

  }
}
