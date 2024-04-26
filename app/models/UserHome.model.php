<?php

/**
 * This class extends Database, this class update posts and fetch posts from db.
 */
class UserHome extends Database {

  /**
   * This function fetch posts from db.
   *
   * @return array
   *   Return array of posts.
   */
  public function getStocks():array {
    $sql = "SELECT * FROM stock LIMIT 0,10";
    $this->query($sql);
    return $this->fetch_all();
  }
}

