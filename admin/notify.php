<?php
header('Content-Type: text/html; charset=utf-8');
include_once('../include/conn.php');
$ob = new Connect();
$str = $_POST['ntxt'];
if(!is_null($str)){
    $chk = $ob->ProcessQuery("insert into notify(ntxt) values('$str')");
    if($chk==1){
        echo "Notification created";
    }else{
        echo "try again!";
    }
}else{
    echo "cant be blank!";
}
?>