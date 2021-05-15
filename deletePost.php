<?php
header( 'Content-Type: text/html; charset=utf-8' ); 
include_once('include/conn.php');
$ob = new Connect();
$id = $_GET['id'];
$tablename = $_GET['tb'];
$res = $ob->select_data2("select img from $tablename where post_id='$id'");
$file = $res->fetch_array();
unlink($file[0]);
$chk = $ob->ProcessQuery("delete from $tablename where post_id='$id'");
if($chk==1){
    if($tablename=="posts"){
        $chk1 = $ob->ProcessQuery("delete from comments where post_id='$id'");
        $chk2 = $ob->ProcessQuery("delete from posts_views where post_id='$id'");
        $chk3 = $ob->ProcessQuery("delete from posts_visitor where post_id='$id'");
    }
    echo "<script>alert('Deleted');
        window.location.href = 'admin.php';
        </script>";
}else{
    echo "<script>alert('try again');
        window.location.href = 'admin.php';
        </script>";
}
?>