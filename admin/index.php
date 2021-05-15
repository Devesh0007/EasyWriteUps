<?php
header( 'Content-Type: text/html; charset=utf-8' ); 
include_once('../include/conn.php');
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>EasyWriteUps | Admin Panel</title>
        <!-- Responsive Metatag -->
        <link rel="shortcut icon" type="image/png" href="../assets/img/site_img/favicon.ico"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/css/flat-ui.min.css"/>
        <link rel="stylesheet" href="css/style.css" />
        <style>
            h1,h2,h3,h4,p{
                text-shadow:0.4px 0.4px 0.4px;
            }
        </style>
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
        <nav class="navbar navbar-inverse" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
              <span class="sr-only">Toggle navigation</span>
            </button>
            <a class="navbar-brand" href="index.php"><img style="width:100px" src="../assets/img/site_img/txt_logo.png" alt=""/></a>
          </div>
          <div class="collapse navbar-collapse" id="navbar-collapse-01">
              <ul class="nav navbar-nav">
                <li><a href="../index.php">HOME</a></li>
                <li class="active"><a href="#">Admin</a></li>
                <li><a href="../index_new.php">BLOG</a></li>
                
            </ul>
        </div>
        </nav><!-- /navbar -->
        <div class="container">
            
            <div class="boxMain">
                <h1 style="margin:0">EasyWriteUps Admin</h1>
            </div>
            <hr />
            <div class="row">
                <div class="col-lg-4">
                    <?php if (!is_writable(session_save_path())) {
    echo 'Session path "'.session_save_path().'" is not writable for PHP!'; 
} ?>
                </div>
                <form action="" method="post">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" maxlength="100" name="uname" placeholder="Username" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="upass" maxlength="30" placeholder="Password" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login Now" class="btn btn-primary" name="alogin" />
                        </div>
                <?php
                    if(isset($_POST['alogin'])){
                        $uname=$_POST['uname'];
                        $upass = $_POST['upass'];
                        $ob = new Connect();
                        $uname = strip_tags($uname);
                        $uname = mysqli_real_escape_string($ob->conn,$uname);
                        $upass = strip_tags($upass);
                        $upass = mysqli_real_escape_string($ob->conn,$upass);
                        //ucfirst
                        //$upass = $upass;
                        $chk = $ob->checkData("select * from admin where uname = '$uname' and upass = '$upass'");
                        if($chk==1){
                            $_SESSION['admin'] = $uname;
                            echo "success";
                            echo "<script>window.location.href='admin.php';</script>";
                        }else{
                            echo "<p>try again.</p>";
                        }
                    }
                ?>
                    </div>
                </form>
            </div>
            <hr />
            <div class="">
                <div class="row">
                    <div class="col-lg-4">&copy; <a href="../index.php">EasyWriteUps</a> <span id="sess"></span></div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">Designed by :- Team EasyWriteUps</div>
                </div>
            </div>
        </div>
    </body>
</html>