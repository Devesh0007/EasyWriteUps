<?php
include_once('../include/conn.php');
$ob = new Connect();
$data = array();
$d = $ob->select_data2("select post_id from posts");
$data[0] = $d->num_rows;
$d = $ob->select_data2("select comment_id from comments");
$data[1] = $d->num_rows;
echo json_encode($data);

?>