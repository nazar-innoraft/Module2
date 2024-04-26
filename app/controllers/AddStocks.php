<?php

/**
 * This class extends Controller class, this class add stocks to db.
 */
class AddStocks extends Controller {
  private $data = ['error_msg' => '', 'success_msg' => ''];
  private $model;

  /**
   * This function index checks if user login or not and redirect to home or login.
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
  public function index($para_meter1 = '', $para_meter2 = '', $para_meter3 = ''): void {
    if (is_loggedin()) {
      if (isset($_POST['submit'])) {
        $this->model = $this->model('UserAddStocks');
        $this->addStock();
      }
      $this->view('AddStocks', $this->data);
    } else {
      header('Location: /login');
    }
  }

  /**
   * This function add stock to db.
   *
   * @return void
   */
  public function addStock() {
    if ($this->model->createStock('nazar.ali@innoraft.com', $this->input('stock_name'), $this->input('stock_price')) == 'SUCCESS') {
      $this->data['success_msg'] = 'Data Inserted';
    } else {
      $this->data['error_msg'] = 'Data NOT Inserted';
    }
  }

}
