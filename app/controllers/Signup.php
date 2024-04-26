<?php

/**
 * This class extends Controller class, this class signup page.
 */
class Signup extends Controller {
  private $data = [];
  /**
   * This function show signup page.
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
  public function index($para_meter1 = '', $para_meter2 = '', $para_meter3 = ''):void {
    $this->view('Signup', $this->data);
  }

  /**
   * This function handles signup page submitted data.
   *
   * @return void
   */
  public function signup(): void {
    $userModel = $this->model('UserSignUp');
    if(isset($_POST['sign_up'])){
      $file_name = null;
      if (isset($_FILES['imageFile']) && $_FILES['imageFile']['error'] === UPLOAD_ERR_OK) {
        $file_name = $this->input('email'). '.jpg';
        $uploadDir = 'assets/profile_images/';
        $file_name = $this->input('email') . '.' . 'jpg';

        $uploadedFile = $uploadDir . $file_name;
        if (move_uploaded_file($_FILES['imageFile']['tmp_name'], $uploadedFile)) {
        } else {
          $this->data['error_message'] = 'No file selected.';
        }
      }

      $no_error = true;
      if (empty($this->input('email'))) {
        $no_error = false;
        $this->data['error_message'] .= 'email cannot be blank ';
      }
      if (empty($this->input('first_name'))) {
        $no_error = false;
        $this->data['error_message'] .= 'first_name cannot be blank ';
      }
      if (empty($this->input('last_name'))) {
        $no_error = false;
        $this->data['error_message'] .= 'last_name cannot be blank ';
      }
      if (empty($this->input('last_name'))) {
        $no_error = false;
        $this->data['error_message'] .= 'last_name cannot be blank ';
      }

      if ($no_error) {
        $result = is_password_valid($this->input('password'), $this->input('c_password'));
        if ($result == 'SUCCESS') {
          $res = $userModel->insert($this->input('email'), $this->input('first_name'), $this->input('last_name'), $this->input('phone'), $this->input('password'), $file_name);
          if ($res == 'SUCCESS') {
            $this->data['success_message'] = 'You are registered successfully';
          } else {
            $this->data['error_message'] = $res;
          }
        } else {
          $this->data['error_message'] = $result;
        }
      }
    }
    $this->index();
  }
}
