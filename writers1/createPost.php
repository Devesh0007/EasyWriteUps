<?php
session_start();
header( 'Content-Type: text/html; charset=utf-8' ); 
include_once('../include/conn.php');
if(isset($_SESSION['writer']) && isset($_SESSION['wid'])){
    $ob = new Connect();
    $title = $_POST['title'];
    $postbody = $_POST['postbody'];
    $postbody = htmlentities($postbody);
    $postbody = str_replace("'", "", $postbody);
    $date = date('y-m-d G:i:s');
    $cate = $_POST['cate'];
    if(!empty($title) && !empty($postbody)){
        if(!empty($_FILES["myfile"]["name"])){
            $output_dir = "../upload_images_article/".$_FILES["myfile"]['name'];
            $imageFileType = pathinfo($_FILES["myfile"]['name'],PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir);
            }else{
            $output_dir='';
        }  
        
        $res = $ob->ProcessQuery("INSERT INTO `posts_temp`(`user_id`, `title`, `body`, `category_id`, `posted`, `img`, `wid`) values ('1','$title','$postbody','$cate','$date','$output_dir', '".$_SESSION['wid']."')");
    if($res==1){
        echo "<script>alert('Post Created. Please wait for approval');
        window.location.href = 'writers.php';
        </script>";    
    }else{
        echo "<script>alert('try again!');
        window.location.href = 'writers.php';
        </script>";   
    }
    }else{
        echo "<script>alert('Title and Post cant be blank!');
        window.location.href = 'writers.php';
        </script>";    
    }
}
?>