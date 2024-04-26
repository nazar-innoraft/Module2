<?php

/**
 * This class extends Controller class, this class show home page.
 */
class Home extends Controller {
  private $model;
  private $data = [];
  private $data1 = [];
  private $data2 = [];

  /**
   * This function shows home page.
   *
   * @param  mixed $para_meter1
   *   Url data.
   * @param  mixed $para_meter2
   *   Url data.
   * @param  mixed $para_meter3
   *   Url data.
   *
   * @return void
   */
  public function index ($para_meter1 = '', $para_meter2 = '', $para_meter3 = ''):void {
    $this->model = $this->model('UserHome');
    $this->data = $this->model->getStocks();
    $this->view('Home', $this->data);
    // if(is_loggedin()){
    //   $this->view('Home', $this->data);
    // } else {
    //   header('Location: /login');
    // }
  }

}
