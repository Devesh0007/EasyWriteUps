<?php
include_once('../include/conn.php');
$ob = new Connect();

if(isset($_POST['member'])){
    $sid = $_POST['season'];
    $bid = $_POST['board'];
    $tid = $_POST['membername'];
    $fblink = $_POST['fblink'];
    $bio = $_POST['bio'];
    $bio = str_replace("'","&#39;",$bio);
    $sql="UPDATE `team` SET `fb_link`='$fblink', `bio`='$bio' WHERE tid='$tid'";
    $chk=$ob->ProcessQuery($sql);
    if($chk==1){
        echo "<script>alert('Success'); window.location.href='teamBioData.php';</script>";
    }else{
        echo "<script>alert('try again!'); window.location.href='teamBioData.php';</script>";
    
    // echo "<script>alert('page is closed!'); window.location.href='teamBioData.php';</script>";
}
}else{
    echo "<script>window.location.href='teamBioData.php';</script>";
}
?>