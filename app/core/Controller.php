<?php

class Controller {
  /**
   * This function require view page.
   *
   * @param  mixed $name
   *   View page name.
   * @param  mixed $data
   *   Data array which will be shown in view page.
   *
   * @return void
   */
  public function view (string $name, mixed $data = []):void {
    $filename = "../app/views/" .ucfirst($name) . ".view.php";
    if (file_exists($filename)) {
      require $filename;
    } else {
      require '../app/views/Error.view.php';
    }
  }

  /**
   * This function returns input value of form after checking method.
   *
   * @param  mixed $input_val
   *   Input name.
   *
   * @return string
   *   Returns input value.
   */
  public function input(string $input_val):string {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'post') {
      return htmlentities(trim($_POST[$input_val]));
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'get') {
      return htmlentities(trim($_GET[$input_val]));
    }
  }

  /**
   * This function requires model and returns an object.
   *
   * @param  string $name
   *   Model name.
   *
   * @return object
   *   Returns an object.
   */
  public function model(string $name):mixed {
    $model_name = "../app/models/" . ucfirst($name) . ".model.php";
    if (file_exists($model_name)) {
      require $model_name;
      return new $name;
    }
  }
}
