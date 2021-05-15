<?php
header('Content-Type: text/html; charset=utf-8');
include_once('../include/conn.php');
$ob = new Connect();
$str = "";
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    $a = $ob->select_data2("SELECT `Article` FROM `dropbox_write` where id = '$id'");
    if ($a->num_rows > 0) {
        while($row = $a->fetch_array()) {
            $str = $row[0];
        }
    }
    
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = strip_tags($str);
fwrite($myfile, $txt);
fclose($myfile);
}else{
    
}
?>
<h1>Content</h1>
<a href="newfile.txt" download>Download</a>
<hr/>
<div>
    <?php echo htmlspecialchars_decode($str);      ?>
</div>