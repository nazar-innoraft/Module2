<?php

/**
 * This class logout the user and unset session.
 */
class Logout {
  /**
   * This function unset session and redirect to login page.
   *
   * @return void
   */
  public function index():void {
    unset_session();
    header('Location: /login');
  }
}
