<?php
$email = $_POST['mail'];
$subject = "ChatPlus Complete Registration";
$txt = "Thanks to registering with us. Your Email Validation is panding please validate your email address. login with chatplus then validate your email";
$headers = "From: customerhelp@prateeksproject.tk";
$cc = mail($email,$subject,$txt,$headers);
if($cc>0){
    echo "sent";
}else{
    echo "try again";
}
?>