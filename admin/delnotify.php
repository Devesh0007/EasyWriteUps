<?php
include_once('../include/conn.php');
$ob = new Connect();
$id = $_POST['nid'];
$chk = $ob->ProcessQuery("delete from notify where nid='$id'");
if($chk==1){
    echo "deleted";
}else{
    echo "try again";
}
?>