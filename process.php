<?
$name  = $_POST["name"];
$email = $_POST["email"];
$mobile   = $_POST["mobile"];
$msg   = $_POST["msg"];
$to    = "dynamicsofttechnology@gmail.com"; /* <= Change this Email ID to yours */
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
?>