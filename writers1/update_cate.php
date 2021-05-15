<?php
include_once("../include/conn.php");
$ob = new connect();
$title = $_POST['title'];
$cate = $_POST['cate'];
$sql="UPDATE `posts` SET `category_id`= '$cate' WHERE post_id = '$title'";
$chk = $ob->ProcessQuery($sql);
if($chk==1){
    echo "Updated";
}else{
    echo "try again";
}
?>