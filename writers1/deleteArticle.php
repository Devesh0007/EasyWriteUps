<?php
session_start();
include_once("../include/conn.php");

if(!isset($_SESSION['writer']) && is_numeric($_GET['id'])){
    header("location:index.php");
}
$ob = new Connect();
$id = $_GET['id'];

$chk = $ob->ProcessQuery("DELETE FROM `posts_temp` WHERE post_id='$id'");
if($chk==1){
    echo "<script>alert('Deleted');</script>";
}else{
    echo "<script>alert('try again!');</script>";
}
        
?>
<script>
    window.location.href = "writers.php";
</script>