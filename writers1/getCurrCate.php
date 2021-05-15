<?php
include_once("../include/conn.php");
$ob = new connect();

$title = $_POST['title'];
$edit = $ob->select_data("SELECT `category` FROM `categories`, `posts` WHERE categories.category_id = posts.category_id and posts.post_id = '$title'",1);
echo $edit[0][0];
?>