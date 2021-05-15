<?php
header( 'Content-Type: text/html; charset=utf-8' ); 
include_once("../include/conn.php");
$ob = new connect();
if(isset($_POST['regi'])){
   $name = $_POST['name'];
   $gen = $_POST['gen'];
   $email = $_POST['email'];
   $mob = $_POST['mob'];
   $addr = $_POST['addr'];
    $addr = str_replace("'", "''", $addr);
   $about = $_POST['about'];
    $about = str_replace("'", "''", $about);
   $pass = $_POST['pass'];
   $rpass = $_POST['rpass'];
    $pic = $_FILES['pic']['name'];
    $url = $_FILES['pic']['tmp_name'];
   if(!empty($name) && !empty($gen) && !empty($email) && !empty($mob) && !empty($addr)){
       if(strlen($mob)==10){
           $upload = "Profile Pic not upload! upload it later.";
           if($pass == $rpass){
               if(move_uploaded_file($url,"pics/".$pic)){
                   $upload = "";
               }
               $pic_url = "pics/".$pic;
               $res = $ob->checkData("SELECT `email`, `pass` FROM `writers` WHERE email ='$email'");
                if($res==0){
                $chk = $ob->ProcessQuery("INSERT INTO `writers`(`name`, `gender`, `email`, `mob`, `addr`, `pass`, `pic`, `status`, `about`) VALUES ('$name','$gen','$email','$mob','$addr','$pass', '$pic_url','panding','$about')");
               if($chk==1){
                        echo "Submitted $upload";
               }else{
                   echo "try after some time";
               }
                }else{
                    echo "This email already registered! try again";
                }
           }else{
               echo "password does not matched! try again";
           }
       }else{
           echo "invalid mobile no! try again";
       }
   }else{
       echo "some field are blank! try again";
   }
}
?>