<?php
include_once('../include/conn.php');
include_once('../include/image_class.php');
$ob = new Connect();
$img = new Img();

if(isset($_POST['title2']) && isset($_FILES['art_img'])){
$title = $_POST['title2'];
$pic = $_FILES['art_img'];
$pic_name = $_FILES['art_img']['name'];
$rand = rand(99,999);    
$chk = $img->simpleUpload($pic, "../upload_images_article/$rand",1048576);
if($chk==1){ 
    $old_pic = $ob->select_data("SELECT `img` FROM `posts` WHERE post_id = '$title'",1);
    @unlink("../upload_images_article/".$old_pic[0][0]);
    $new_pic = "../upload_images_article/".$rand.$pic_name;
    $sql = "UPDATE `posts` SET `img`='$new_pic' WHERE post_id = '$title'";
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