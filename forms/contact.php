<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  // $receiving_email_address = 'oloyedeadebayoolawale@gmail.com';

  // if( file_exists($php_email_form = '../assets/vendor/php-email-form/PHPMailer.php' )) {
  //   include( $php_email_form );

  //   $contact = new PHPMailer;
  // $contact->ajax = true;
  
  // $contact->to = $receiving_email_address;
  // $contact->from_name = $_POST['name'];
  // $contact->from_email = $_POST['email'];
  // $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials

  // $contact->smtp = array(
  //   'host' => 'gmail.com',
  //   'username' => 'oloyedeadebayoolawale@gmail.com',
  //   'password' => 'oloyede12345678910',
  //   'port' => '465'
  // );

  // $contact->add_message( $_POST['name'], 'From');
  // $contact->add_message( $_POST['email'], 'Email');
  // $contact->add_message( $_POST['message'], 'Message', 10);

  // echo $contact->send();
  // } else {
  //   die( 'Unable to load the "PHP Email Form" Library!');
  // }



  $subject = $_POST['subject'];
  $name = $_POST['name'];
  $message = $_POST['message'];
  $email = $_POST['email'];

  use PHPMailer\PHPMailer;

  require_once '../assets/vendor/php-email-form/src/PHPMailer.php'; //download the phpmailer class 
  // require_once 'assets\PHPMailer\src\SMTP.php';
  // require_once 'assets\PHPMailer\src\POP3.php';
  // require_once 'assets\PHPMailer\src\OAuth.php';
  // require_once 'assets\PHPMailer\src\Exception.php';

  $mail = new PHPMailer;
  $mail->IsSmtp();
  $mail->SMTPDebug = 0;
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = '465';
  $mail->SMTPAuth = 'true';
  $mail->Username = 'oloyedeadebayoolawale@gmail.com';
  $mail->Password = 'oloyede12345678910';
  $mail->SMTPSecure = 'ssl';
  $mail->From = $email;
  $mail->AddAddress("oloyedeadebayoolawale@gmail.com", 'Name');
  $mail->WordWrap = 70;
  $mail->Subject = $subject;
  $mail->Body = $message;

  if($mail->Send()){
      $result = '<div class="alert alert-success alert-dismissable" id="flash-msg">
                      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                      <h4><i class="icon fa fa-pe-7s-check"></i> Success, Your response has been sent </h4>
                  </div>';
  }else{
      $result = '<div class="alert alert-danger alert-dismissable" id="flash-msg">
                      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                      <h5><i class="icon fa fa-pe-7s-attention"></i> Error sending the email, 
                      this could be due to network, please try again later</h5>
                  </div>';
  }
  result($result);
?>
