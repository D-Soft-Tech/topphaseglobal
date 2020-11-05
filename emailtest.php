<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    if(isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['message']) && !empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['message']))
    {
        $name  = $_POST["name"];
        $email = $_POST["email"];
        $mobile   = $_POST["phone"];
        $subject = $_POST['subject'];
        $message   = $_POST["message"];
        $to    = "dynamicsofttechnology@gmail.com";

        require 'assets/vendor/php-email-form/src/PHPMailer.php';
        require 'assets/vendor/php-email-form/src/SMTP.php';
        require 'assets/vendor/php-email-form/src/Exception.php';

        $mail = new PHPMailer();
        $mail->IsSmtp();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->IsHTML(true);
        $mail->Username = 'oloyedeadebayoolawale@gmail.com';
        $mail->Password = 'oloyede12345678910';
        $mail->AddAddress('customerservice@topphaseglobal.com.ng');
        $mail->addReplyTo($email, $name); //<-- this is the line i changed
        $mail->setFrom("$email", "$email");
        $mail->FromName = "You have a message from $name, $mobile";
        $mail->WordWrap = 70;
        $mail->Subject = $subject;
        $mail->Body = $message;

        if($mail->Send())
        {
            $alertMessage = '<div class="alert alert-success alert-dismissable mt-2" style="margin-right: 10%; margin-top: 10px; margin-bottom: 0px; margin-left: 10%;">'.
                                    '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                                    '<div class="">'.
                                        '<h6><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp; Thank you for contacting us!!!</h6>'.
                                    '</div>'.
                                '</div>';
        }
        else{
            $alertMessage = '<div class="alert alert-danger alert-dismissable mt-2" style="margin-right: 10%; margin-top: 10px; margin-bottom: 0px; margin-left: 10%;">'.
                                    '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'.
                                    '<div class="">'.
                                        '<h6><i class="fa fa-check"></i>&nbsp;&nbsp;&nbsp; Error sending the message, please try again later!!!</h6>'.
                                    '</div>'.
                                '</div>';
        }
    }
?>