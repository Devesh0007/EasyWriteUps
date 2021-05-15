<?php
include_once('../include/conn.php');
$ob = new Connect();
$id = $_POST['id'];
$res = $ob->select_data2("select img from posts_temp where post_id='$id'");
$file = $res->fetch_array();
unlink($file[0]);
$chk = $ob->ProcessQuery("delete from posts_temp where post_id='$id'");
if($chk==1){
    echo "deleted";
}else{
    echo "try again";
}
?>