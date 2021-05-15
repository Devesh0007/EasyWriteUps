<?php
    include_once('../include/conn.php');
    $ob = new Connect();
    $board = $_POST['board'];
    $sql = "SELECT `bname` FROM `team_board` WHERE bname='$board'";
    $chk = $ob->checkData($sql);
    if($chk==0){
        $sql = "INSERT INTO `team_board`(`bname`) VALUES ('$board')";

        $chk = $ob->ProcessQuery($sql);
        if($chk==1){
            echo "Success";
        }else{
            echo "try again";
        }
    }else{
        echo "Already Added";
    }
?>