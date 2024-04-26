<?php

/**
 * This class extends Controller class, this class add stocks to db.
 */
class Action extends Controller
{
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
  public function delete($para_meter1 = '', $para_meter2 = '', $para_meter3 = ''): void
  {
    if (is_loggedin()) {
      $this->model = $this->model('UserAddStocks');
      if ($para_meter1 != '' && is_numeric(trim($para_meter1))) {
        if ($this->model->deleteStock($_SESSION['email'], trim($para_meter1))) {
          $this->data['success_msg'] = 'Stock Deleted';
        } else {
          $this->data['error_msg'] = 'Stock NOT Deleted';
        }
      }
      header('Location: /home');
    } else {
      header('Location: /login');
    }
  }

  public function index () {
    $this->view('Error');
  }

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
  public function update($para_meter1 = '', $para_meter2 = '', $para_meter3 = ''): void
  {
    if (is_loggedin()) {
      $this->model = $this->model('UserAddStocks');
      if (isset($_POST['submit'])) {
        if ($_SESSION['email'] == $para_meter1) {
          if ($this->model->updateStock($para_meter2)) {
            $this->data['success_msg'] = 'Data updated';
          } else {
            $this->data['error_msg'] = 'Data NOT updated';
          }
        } else {
          $this->data['error_msg'] = 'You can not updated';
        }
      }
      $this->view('update', $this->data);
    } else {
      header('Location: /login');
    }
  }
}
