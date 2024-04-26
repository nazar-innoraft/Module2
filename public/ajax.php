<?php

// require_once __DIR__ . '/../app/core/Databse.php';
require_once __DIR__ . '/../app/core/config.php';
class Posts {
  private $conn;
  protected $result;

  function __construct() {
    try {
      $this->conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASSWORD);
    } catch (PDOException $e) {
      echo 'Error in connection ' . $e->getMessage();
    }
  }

  function __destruct() {
    $this->conn = null;
  }

  public function getPost(int $para) {
    $para2 = 10;
    $sql = "SELECT * FROM posts ORDER BY sno DESC LIMIT :limit_start, :limit_count";
    try {
      $this->result = $this->conn->prepare($sql);
      $this->result->bindParam(':limit_start', $para, PDO::PARAM_INT);
      $this->result->bindParam(':limit_count', $para2, PDO::PARAM_INT);
      $this->result->execute();
      $result = $this->result->fetchAll(PDO::FETCH_ASSOC);
      if ($this->result->rowCount() > 0) {
        echo json_encode($result);
      } else {
        $nodata = 'nodata';
        echo json_encode(['meaasge' => $nodata]);
      }
      // echo '<pre>';
      // echo var_dump($result);
      // echo '</pre>';
    } catch (PDOException $e) {
      echo 'ERROR';
    }
  }

  public function genarateOtp(string $email) {
    $sql = "UPDATE TABLE credential SET otp = ? WHERE email = ?";
  }
}


// Takes the starting value from where the next posts will be shown to the user.
// $start = $_POST['starting'];
$posts = new Posts;
$posts->getPost($_POST['starting']);

if (isset($_POST['starting'])) {
  $posts->getPost($_POST['starting']);
}




// Set the appropriate headers for JSON response
// header('Content-Type: application/json');

// echo json_encode($res);
// echo 'hello';

