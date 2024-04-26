<?php

/**
 * This class extends Controller class, this class show profiles.
 */
class Profile extends Controller {
  private $data = ['success_message' => '', 'error_message' => ''];
  private $model;

  /**
   * This function show profile.
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
      $this->model = $this->model('UserProfile');
      if (isset($_POST['update'])) {
        $this->updateProfile();
      }
      if ($para_meter1 == '') {
        $this->view('Error');
      } else {
        $res = $this->model->isProfileExist(trim($para_meter1));
        if ($res == false) {
          $this->view('Error');
        } else {
          $this->view('Profile', $res);
        }
      }
    } else {
      header('Location: /login');
      exit;
    }
  }

  /**
   * This function update profile.
   *
   * @return void
   */
  private function updateProfile(): void {

    if (isset($_FILES['imageFile'])) {
      $file_name = $_SESSION['username'] . '.jpg';
      $uploadDir = 'assets/profile_images/';
      $file_name = $_SESSION['username'] . '.' . 'jpg';

      $uploadedFile = $uploadDir . $file_name;
      if (move_uploaded_file($_FILES['imageFile']['tmp_name'], $uploadedFile)) {
      } else {
        $this->data['error_message'] = 'No file selected.';
      }
    }

    $no_error = true;
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
      $res = $this->model->update($this->input('first_name'), $this->input('last_name'), $this->input('phone'), $_SESSION['username']);
      if ($res == 'SUCCESS') {
        $this->data['success_message'] = 'Updated successfully';
      } else {
        $this->data['error_message'] = $res;
      }
    }
  }
}
