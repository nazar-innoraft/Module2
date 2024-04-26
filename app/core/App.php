<?php

/**
 * This class takes care of routing.
 */
class App {
  private $controller = 'Home';
  private $method = 'index';
  private $data = [];

  /**
   * This function splits url.
   *
   * @return array
   *   Returns array of strings.
   */
  private function splitUrl ():array {
    if (isset($_GET['url'])) {
      $url = $_GET['url'];
      $url = trim($url);
      $url = explode("/", $url);
      return $url;
    }
    return explode("/", '/home');
  }

  /**
   * This function load Controller based on url.
   *
   * @return void
   */
  public function loadController ():void {
    $url = $this->splitUrl();
    $cnt = 0;
    $url_val = '';
    if($url[0] == "" ){
      if (sizeof($url) > 1) {
        $cnt = 1;
        $url_val = ucfirst($url[$cnt]);

      } else {
        $url_val = 'Home';
      }
    }

    $filename = "../app/controllers/" . $url_val . ".php";

    if (file_exists($filename)) {
      require "$filename";
      $this->controller = $url_val;
      unset($url[$cnt]);
    } else {
      require '../app/controllers/Error404.php';
      $this->controller = 'Error404';
    }

    $this->controller = new $this->controller;
    if(isset($url[$cnt+1]) && !empty($url[$cnt + 1])){
      if(method_exists($this->controller, $url[$cnt + 1])){
        $this->method = $url[$cnt + 1];
        unset($url[$cnt + 1]);
        if (isset($url[$cnt+2])) {
          array_push($this->data, $url[$cnt + 2]);
        }
      } else {
        array_push($this->data, $url[$cnt + 1]);
      }
    }
    call_user_func_array([$this->controller, $this->method], $this->data);
  }
}
