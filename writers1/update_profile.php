<?php
session_start();
include_once('../include/conn.php');
include_once('../include/image_class.php');
$ob = new Connect();
$img = new Img();

$email = $_SESSION['writer'];
$res = $ob->select_data2("SELECT `wid` FROM `writers` WHERE email = '$email'");
if($res->num_rows>0){
    $profile = $res->fetch_array();
}

if(isset($_FILES['dp']) && isset($_POST['mob']) && isset($_POST['email'])){
    $mob = $_POST['mob'];
    $email = $_POST['email'];
    $pic = $_FILES['dp'];
    $pic_name = $_FILES['dp']['name'];
    $rand = rand(99,999);    
    $chk = $img->simpleUpload($pic, "pics/$rand",1048576);
    if($chk==1){ 
        $old_pic = $ob->select_data("SELECT `pic` FROM `writers` WHERE wid = '$profile[0]'",1);
        @unlink("pics/".$old_pic[0][0]);
        $new_pic = "pics/".$rand.$pic_name;
        $sql = "UPDATE `writers` SET `pic`='$new_pic' WHERE wid = '$profile[0]'";
        $chk = $ob->ProcessQuery($sql);
        if($chk==1){
            echo " Pic Uploaded";
        }else{
            echo "try again!";
        }
    }else{
        echo "try again!";
    }
}else{
    echo "Please check and fill input fields";
}
?>