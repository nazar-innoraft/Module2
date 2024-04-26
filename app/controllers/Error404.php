<?php

/**
 * This class extends Controller class, this class show error page.
 */
class Error404 extends Controller {

  /**
   * This function show error page.
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
    echo  "this  is error controller";
    $this->view('Error404');
  }
}
