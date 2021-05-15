<?php
header('Access-Control-Allow-Origin: *');
include_once('../include/conn.php');
include_once('../include/image_class.php');
$ob = new Connect();
$img = new Img();

$name = $_POST['mnames1'];
$pic = $_FILES['pic1'];
$pic_name = $_FILES['pic1']['name'];
$rand = rand(99,999);    

$chk = $img->simpleUpload($pic, "../team/photos/$rand",1048576);
if($chk==1){ 
    $old_pic = $ob->select_data("SELECT `pic_url` FROM `team` WHERE tid = '$name'",1);
    unlink("../team/".$old_pic[0][0]);
    $new_pic = "photos/".$rand.$pic_name;
    $sql = "UPDATE `team` SET `pic_url`='$new_pic' WHERE tid = '$name'";
    $chk = $ob->ProcessQuery($sql);
    if($chk==1){
        echo " Pic Uploaded";
    }else{
        echo "try again!";
    }
}else{
    echo "try again!";
}
?>