<?php
include_once("../include/conn.php");
$ob = new Connect();
$title = $_POST['title'];
$body = $_POST['body'];

$sql = "UPDATE `posts` SET `body`='$body' WHERE post_id='$title'";
$chk = $ob->ProcessQuery($sql);
if($chk==1){
    echo "Article Updated";
}else{
    echo "try again!";
}
?>