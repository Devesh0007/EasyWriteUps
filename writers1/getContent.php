<?php
include_once("../include/conn.php");
$ob = new connect();

$title = $_POST['title'];
$edit = $ob->select_data("select body from posts where post_id='$title'",1);
echo htmlspecialchars_decode($edit[0][0]);
?>