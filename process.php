<?
$name  = $_REQUEST["name"];
$email = $_REQUEST["email"];
$mobile   = $_REQUEST["mobile"];
$msg   = $_REQUEST["msg"];
$to    = "surjithctly@gmail.com"; /* <= Change this Email ID to yours */
if (isset($email) && isset($name) && isset($msg)) {
    $subject = "$name sent you a message via Catholic"; /* <= Change the Subject If you want */
		$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= "From: ".$name." <".$email.">\r\n"."Reply-To: ".$email."\r\n" ;
$msg     = "From: $name<br/> Email: $email <br/> Mobile: $mobile <br/>Message: $msg";
	
   $mail =  mail($to, $subject, $msg, $headers);
  if($mail)
	{
        echo 'success';
        
        header('Location: index.html');
	}

else
	{
		echo 'failed';
	}
}

// $mail = new PHPMailer();
// $mail->IsSmtp();
// $mail->SMTPDebug = 0;
// $mail->Host = 'smtp.gmail.com';
// $mail->Port = '465';
// $mail->SMTPAuth = 'true';
// $mail->Username = 'oloyedeadebayoolawale@gmail.com';
// $mail->Password = 'oloyede12345678910';
// $mail->SMTPSecure = 'ssl';
// $mail->From = 'lifeandpeacecommission.gmail.com';
// $mail->AddAddress("$to", 'Name');
// $mail->WordWrap = 70;
// $mail->Subject = $subject;
// $mail->Body = $message;

?>