<?php
    header('Access-Control-Allow-Origin: *');
    include_once('../include/conn.php');
    include_once('../include/image_class.php');
    $ob = new Connect();
    $img = new Img();
    
    $season = $_POST['sseason'];
    $board = $_POST['sboard'];
    $type = $_POST['mtype'];
    $name = $_POST['mname'];
    $fb = $_POST['fblink'];
    $bio = $_POST['bio'];
    $pic = $_FILES['pic'];
    $pic_name = $_FILES['pic']['name'];
    $rand = rand(99,999); 
    
    if(!empty($pic_name)){
        $chk = $img->simpleUpload($pic, "../team/photos/$rand",1048576);
        if($chk==1){
            $new_pic = "photos/".$rand.$pic_name;
            $sql = "INSERT INTO `team`(`member`, `fb_link`, `type`, `sid`, `bid`, `pic_url`,`bio`) VALUES ('$name', '$fb','$type','$season','$board','$new_pic','$bio')";

            $chk = $ob->ProcessQuery($sql);
            if($chk==1){
                echo "Success";
            }else{
                echo "try again";
            }
        }else{
            echo "$chk Image can not be uploaded! try again";
        }

    }else{
        $sql = "INSERT INTO `team`(`member`, `fb_link`, `type`, `sid`, `bid`, `pic_url`,`bio`) VALUES ('$name', '$fb','$type','$season','$board','photos/$pic_name','$bio')";

        $chk = $ob->ProcessQuery($sql);
        if($chk==1){
            echo "Success";
        }else{
            echo "try again";
        }
    }
?>