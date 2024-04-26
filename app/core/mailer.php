<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';

/**
 * This class is used to send email.
 */
class Mailer {
  /**
   * This function sends reset link email and otp.
   *
   * @param mixed $recipient_email
   *   User's email.
   * @param mixed $data
   *   System generated unique token for validation.
   *
   * @return bool
   *   Returns true if email sent else false.
   */
  function sendEmail(string $recipient_email, string $data): bool {
    $mail = new PHPMailer(true);
    global $sender_email, $sender_password, $sender_name, $email_host;

    try {
      // Server settings.
      $mail->isSMTP();
      $mail->Host = $email_host;
      $mail->SMTPAuth = true;
      $mail->Username = $sender_email;
      $mail->Password = $sender_password;
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;

      // Sender.
      $mail->setFrom($sender_email, $sender_name);
      // Add a recipient.
      $mail->addAddress($recipient_email);
      $mail->addReplyTo($recipient_email, $sender_name);

      $mail->isHTML(true);
      // Set email subject.
      $mail->Subject = "Reset password link";
      // Set email message.
      if (ctype_digit($data)) {
        $mail->Body = <<<END
        Your otp is {$data}
      END;
      } else {
        $mail->Body = <<<END
        Click <a href="module2.com/forgotpassword/updatewithtoken/{$data}">here</a> to reset your password.
      END;
      }
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      $mail->send();
      return true;
    } catch (Exception $e) {
      echo "Mailer Error: {$mail->ErrorInfo}";
      return false;
    }
  }
}

?>
