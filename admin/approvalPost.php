<?php
header( 'Content-Type: text/html; charset=utf-8' ); 
include_once('../include/conn.php');
$ob = new Connect();
$id = $_POST['id'];
$chk = $ob->ProcessQuery("insert into posts(user_id,title,body,category_id,posted,img,wid) select user_id,title,body,category_id,posted,img,wid from posts_temp where post_id ='$id'");
if($chk==1){
    $chk = $ob->ProcessQuery("delete from posts_temp where post_id ='$id'");
    echo "Approved";
}else{
    echo "try again";
}
?>