<?php
    include_once('../include/conn.php');
    $ob = new Connect();
    $season = $_POST['season'];
    $year = $_POST['year'];
    $sql = "SELECT `sname`, `year` FROM `team_session` WHERE sname='$season' and year = '$year'";
    $chk = $ob->checkData($sql);
    if($chk==0){
        $sql = "INSERT INTO `team_session`(`sname`, `year`) VALUES ('$season','$year')";

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