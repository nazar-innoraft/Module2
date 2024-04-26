<?php

require './../vendor/autoload.php';

use Google\Client as Google_Client;
use Google\Service\Oauth2 as Google_Service_Oauth2;

/**
 * This class login with google.
 */
class GoogleLogin extends Controller {
  private $model;
  private $data;

  /**
   * This function index
   *
   * @return void
   */
  public function index():void {
    global $client_id, $client_secret, $redirect_uri;
    $client = new Google_Client();
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($redirect_uri);
    $client->addScope('profile');
    $client->addScope('email');
    $this->data['login_url'] = $client->createAuthUrl();
    if (isset($_GET['code'])) {
      $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

      $oAuth = new Google_Service_OAuth2($client);
      $user_data = $oAuth->userinfo_v2_me->get();
      $email_address = $user_data['email'];
      $first_name = $user_data['givenName'];
      $last_name = $user_data['familyName'];
      if ($email_address && $first_name && $last_name) {
        $this->model = $this->model('Google');
        if (!$this->model->isUserPresent($email_address)) {
          $this->model->insert($email_address, $first_name, $last_name);
        }
        setSession($email_address);
      }
      header('Location: /home');
    } else {
      $this->view('Google', $this->data);
    }

  }
}
