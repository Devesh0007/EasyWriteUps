<?php
if(!isset($_GET['id'])){
    echo "<script>
    window.location.href='index.php';
    </script>";
}
$id = $_GET['id'];
include_once('include/conn.php');
if(!is_numeric($id)){
    echo "<script>     window.location.href='index.php';     </script>";
}
$ob = new connect();
$timeline = $ob->select_data2("select title,body,img,wid from posts where post_id='$id'");
$chk = $ob->checkData("select pid from recent_post where pid = '$id'");
    
    if($chk==1){
        $chkdel = $ob->ProcessQuery("DELETE FROM `recent_post` WHERE pid = '$id'");
        if($chkdel==1){
            $pq = $ob->ProcessQuery("INSERT INTO `recent_post`(`pid`) VALUES ('$id')");
          //  echo "<script>alert('w$pq');</script>";
        }
    }else if($chk==0){
        $ob->ProcessQuery("INSERT INTO `recent_post`(`pid`) VALUES ('$id')");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>UDAAN-8&nbsp;|&nbsp;<?php
        $title = $ob->select_data2("select title from posts where post_id='$id'");
        if($title->num_rows>0){
            $rows = $title->fetch_array();
            echo $rows[0];      
        }
        ?></title>
    
    <link rel="icon" type="image/ico" href="../images/logoudaan.png" />
    
    
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="bcss/bootstrap.min.css" rel="stylesheet">
    <link href="bcss/mdb.min.css" rel="stylesheet">
    <link href="bcss/style.css" rel="stylesheet">
    <link href="bcss/animate.css" rel="stylesheet">
    <link href="css/styleback.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bcss/slider.css" />
	<script type="text/javascript" src="bjs/jquery.js"></script>
	    <style>
    body {
  font-family: Arial, Helvetica, sans-serif;
}
.navbar-nav a:hover  {
                background-color: #192368;
          }
           #ab{margin-top:4px;
	        height:30px;
	        width:120px;
	    }
p{
    color:white;
}
h2{
    color:white;
}
div{
    color:white;
}
</style>
<script type="text/javascript">
		function fun() {
		    if(document.getElementById("2").value=="")
		        alert("Write some feedback to help us improve.");
		    else
		        alert("Thank you for your precious feedback.");
		}
	</script>
</head>
<body>
   <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-53736601-1', 'auto');
  ga('send', 'pageview');
</script>
    <!-- Navigation -->
    <div id="back"></div>
<div id="front"></div>
       <header>
              
  <nav class="navbar navbar-expand-lg  sliding navbar-dark black fixed-top scrolling-navbar">
      <div class="container">
            <a class="navbar-brand" href="../index.php">
              <strong style="font-family:calibri">
                  EasyWriteUps
              </strong>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
          
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent-7"  style="margin-left:50px; padding:0px;">
                <ul class="navbar-nav ">
      
  
                <li class="nav-item mx">
                <a style="padding-left:23px;"class="nav-link js-scroll-trigger " href="../index.php">

          
                  Home&nbsp;<i class="fa fa-home" aria-hidden="true"></i>
          
          </a> 
      </li>
      
      <li class="nav-item mx-2.99">
          <a style="padding-left:23px;"class="nav-link js-scroll-trigger"  href="../about.html">About&nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i>
          </a> 
      </li>

      <li class="nav-item mx-2.99 active">
          <a style="padding-left:23px;"class="nav-link js-scroll-trigger"  href="../index_new.php"> Blog&nbsp;<i class="fa fa-pencil-square" aria-hidden="true"></i>
      </a>
      </li>
            
       <li class="nav-item mx-2.99">
          <a style="padding-left:23px;"class="nav-link js-scroll-trigger"  href="../writers1/index.php"> Member Login&nbsp;<i class="fa fa-user" aria-hidden="true"></i>
      </a>
      </li>

      <li class="nav-item mx-2.99">
          <a style="padding-left:23px;"class="nav-link js-scroll-trigger"  href="../team.html"> Team&nbsp;<i class="fa fa-users" aria-hidden="true"></i>
          </a>
      </li>

      <li class="nav-item mx-2.99">
          <a style="padding-left:23px;"class="nav-link js-scroll-trigger"  href="../contact.html"> Contact&nbsp;<i class="fa fa-phone-square"></i>
      </a>
      </li>
 
  
  <ul style="float:left;margin-left:60px;"class="navbar-nav nav-flex-icons">
      <li class="nav-item">
          <a class="nav-link" href="https://www.facebook.com/"><i class="fa fa-facebook-f"></i></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="https://www.instagram.com/udaan.ggv"><i class="fab fa-instagram"></i></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="https://www.youtube.com/user/udaanggv"><i class="fa fa-youtube"></i></a>
      </li>
  </ul>
</div>
</div>
</nav>
</header>
    <!-- Page Content -->
    <div style="margin-top:80px" class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <!-- First Blog Post -->                
                <?php
                    if($timeline->num_rows>0){
                        while($row = $timeline->fetch_array()){
                            $wid = $row[3];
                            if($row[2]){
                                echo '<h2>'.$row[0].'</h2>
                <hr>
                <img class="img-responsive" src="'.$row[2].'" alt="">
                <hr>
                <p>'.htmlspecialchars_decode($row[1]).'</p>
                <p></p>
                <a href="'.$_SERVER['HTTP_REFERER'].'"><button style="border-radius:6px;" class="btn btn-primary"><b><  &nbsp;&nbsp;</b> Back</button></a><hr>';
                }else{
                echo '<h2>'.$row[0].'</h2><hr>
                <p>'.htmlspecialchars_decode($row[1]).'</p>
                <p></p>';
                if(isset($_SERVER['HTTP_REFERER'])){
                    echo '<a href="'.$_SERVER['HTTP_REFERER'].'"><button style="border-radius:6px;" class="btn btn-primary"><b><  &nbsp;&nbsp;</b> Back</button></a>';
                }else{
                    echo '<a href="index.php"><button style="border-radius:6px;" class="btn btn-primary"><b><  &nbsp;&nbsp;</b> Back</button></a>';
                }
                    
                        }
                        }
                    }else{
                        echo "<script>     
                        window.location.href='not_found.html';     </script>";
                    }
                ?>
                <!-- Pager -->
                <hr/>
                 <div class="class="form-horizontal"">
                <form action="<?php echo $_SERVER['PHP_SELF']."?id=$id" ?>" method="post">
                    <table style="width:100%">
                        <tr>
                            <td><label>Email Address</label></td>
                            <td><input class="form-control" type="email" style="margin-bottom:10px;" name="email-id"/>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Name</label></td>
                            <td><input class="form-control" type="text" style="margin-bottom:10px;" name="cname"/></td>
                        </tr>
                        <tr>
                            <td style="position:relative;"><label style="position:absolute;top:0">Comment</label></td>
                            <td><textarea class="form-control" name="comment" style="margin-bottom:10px;"  id="" cols="50" rows="10"></textarea></td>
                        </tr>
                        <tr>
                           <td></td>
                            <td><input style="border-radius:6px;" type="submit" class="btn-success btn" style="width:120px" value="submit" name="comm" /></td>
                        </tr>
                    </table>
                </form>
                <?php
    if(isset($_POST['comm'])){
        $email = $_POST['email-id'];
        $name = $_POST['cname'];
        $comment = $_POST['comment'];
        
        $email = strip_tags($email);
        $email = mysqli_real_escape_string($ob->conn,$email);
        
        $name = strip_tags($name);
        $name = mysqli_real_escape_string($ob->conn,$name);
        
       // $comment = strip_tags($comment);
        $comment = mysqli_real_escape_string($ob->conn,$comment);
        
        if($email!=null && $name!=null && $comment!=null ){
            list($userName, $mailDomain) = explode("@", $email);
            if(checkdnsrr($mailDomain, 'A') && filter_var($email, FILTER_VALIDATE_EMAIL)){
                if($comment != strip_tags($_POST['comment'])){
                    echo "<script>alert('html tags not allowed here!');</script>";
                }else{
                    $query = $ob->ProcessQuery("insert into comments (post_id,email_add, name,comment) values('$id','$email','$name','$comment')");
                    if($query){
                        echo "<script>alert('Thanks for the comment');</script>";
                    }else{
                        echo "try! again";
                    }
                }
            }else{
                echo "<script>alert('invalid email id');</script>";
            }
        }
    }
    ?>
            </div>
              <hr/>
               <div class="container viewComments">
               <h3>Comments</h3>
                <?php $res = $ob->select_data2("select * from comments where post_id = '$id' order by comment_id desc");
                while($row =$res->fetch_object()):
                ?>
                <div style="width:70%" class="">
                    <h4><?php echo $row->name; ?></h4>
                    <blockquote><?php echo $row->comment; ?></blockquote><hr />
                </div><?php endwhile; ?>
            </div>
                <p></p>
            </div>
            <div class="col-md-4">

                <!-- Blog Search well2 -->
                <div class="panel-default panel">
                    <div class="panel-heading"><h4>Blog Search</h4></div>
                    <div class="panel-body">
                        <form action="search.php" method="get">
                    <div class="input-group">
                        <input type="text" name="search_title" class="form-control" style="height:50px;">
                            <button style="margin:0px;"class="btn btn-default" name="search" type="submit">
                                <i class="fas fa-search" style="font-size:20px;padding:0px;"></i>
                        </button>
                        </div>
                    </form>
                    </div>
                </div><hr>
                <p></p>
                
                <div class="panel-default panel">
                    <div class="panel-heading"><h4>About Writer</h4></div>
                    <p></p><p></p>
                    
                    <div class="panel-body">
                        <a href="writers_post.php?wid=<?php echo $wid; ?>">
                            <div class="text-center">
                                <?php
                                    $writer = $ob->select_data2("select * from writers where wid='$wid'");
                                if($writer->num_rows>0){
                                    $details = $writer->fetch_array();
                                }
                                ?>
                                <img class="img-circle" align="middle" style="border-radius:50%;margin-left:8px;margin-top:20px;width:120px;height:120px" src="<?php 
                                if(!empty($details[7])){
                                    echo "../writers/".$details[7];
                                }else{
                                    echo "../assets/img/site_img/logo.jpg";
                                }  ?>" alter="<?php echo $details[1]; ?>" />
                                <br/>
                                <br/>

                                <h4 style="margin-bottom:10px"><?php echo $details[1]; ?></h4>

                                    <p><strong>Email id: <?php echo $details[3]; ?></strong></p>
                                <p><?php echo $details[9]; ?></p>
                            </div>
                        </a>
                    </div>
                </div>
                <p></p>
                <hr>

                <!-- Blog Categories well2 -->
                <div class="panel-default panel">
                    <div class="panel-heading">
                    <h4>Blog Categories</h4>
                    </div>
                    <div class="panel-body">
                        <?php
                            $newArt = $ob->select_data2("select * from categories");
                    if($newArt->num_rows>0){
                        while($row = $newArt->fetch_array()){
                            echo '<a href="category.php?category='.$row[0].'"><button style="margin:2px;border-radius:6px;" class="btn btn-primary"><i class="fas fa-folder-open"></i>&nbsp;&nbsp;'.$row[1].'&nbsp;&nbsp;&nbsp;(&nbsp;<b>'.getCount($row[0],$ob).'&nbsp;</b>)</button></a>';
                        }
                    }
                            function getCount($cate,$ob){
                                $res = $ob->select_data2("select post_id from posts where category_id='$cate'");
                                return $res->num_rows;
                            }
                    ?>
                    </div>
                </div>
                <hr>
                <p></p>
                <div class="panel-default panel">
                    <div class="panel-heading">
                    <h4>Recent Viewed</h4>
                    </div>
                        <div class="panel-body">
                           <?php
                            $newArt = $ob->select_data2("select p.post_id,p.title from posts p,recent_post rp where p.post_id=rp.pid order by rp.re_id desc limit 5");
                    if($newArt->num_rows>0){
                        while($row = $newArt->fetch_array()){
                            echo "<div class='tags'><a href='article.php?id=$row[0]'>$row[1]&nbsp;&nbsp;&nbsp;</a></div><br/>"; 
                        }}?>
                </div>
                <hr>
            <!-- Feedback Section -->
                <div class="panel-default panel">
                    <div class="panel-heading">
                    <h4>Feedback</h4>
                    </div>
                <div class="col-md-12" style="box-shadow: 1px 2px 5px gray; margin-top: 20px;">
                
               <form style="margin-top:10px;padding-top:10px;padding-bottom:4px;">
                <fieldset>
    
      
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter subject" id="1" required >
                 </div>
   
                <div class="form-group">
                 <textarea class="form-control" placeholder="Enter feedback" rows="5" required id="2"></textarea>
                    </div>
    
    
    
                <button style="" type="submit" class="btn btn-default" onclick="fun()" style=";">Submit</button>
                </fieldset>
                </form>
                
            </div></div><hr>
            </div>

        </div>
        <!-- /.row -->

        </div>
        </div>
<div class="container-fluid">
        
           <div class="container">
               <center><p style="color: gray; font-family: Century Gothic; font-size: 11px; line-height: 15px;">copyright &copy; 2018-19 Developed by Team <a href="index.html">EasyWriteUps</a></p></center>
            </div>
        
        </div>
    <script type="text/javascript" src="bjs/jquery-3.2.1.min.js"></script>

    <script type="text/javascript" src="bjs/popper.min.js"></script>
    
    <script type="text/javascript" src="bjs/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="bjs/mdb.min.js"></script>
    
    <script type="text/javascript" src="bjs/wowslider.js"></script>
	<script type="text/javascript" src="bjs/script.js"></script>
    
    </div>
    <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
    /*if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        window.location.href = '../mobile/index.html';
    }*/
    </script>
    <script>
        var d = new Date();
    $("#year").text(d.getFullYear());
        $("#search_form").submit(function(){
            var x = $("#search_title").val();
            if(x.length>0){
                return true;
            }else{
                return false;
            }
        });
    </script>
    <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58e3a378a0495429"></script>
</body>

</html>
