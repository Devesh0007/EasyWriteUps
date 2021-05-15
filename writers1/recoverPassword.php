<?php
session_start();
include_once("../include/conn.php");
$ob = new connect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>EasyWriteUps</title>
    
    <link rel="icon" type="image/ico" href="../images/logoudaan.png" />
    
    
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="../css/styleback.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/slider.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	    <style>
    body {
  font-family: Arial, Helvetica, sans-serif;
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
.navbar-nav a:hover  {
                background-color: #192368;
          }
          #ab{margin-top:4px;
	        height:30px;
	        width:120px;
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
      <div id="back"></div>
<div id="front"></div>
   <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-53736601-1', 'auto');
  ga('send', 'pageview');
</script>
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
      
  
                <li class="nav-item mx-2.9">
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
          <a class="nav-link" href="https://www.facebook.com/udaan.ggv"><i class="fa fa-facebook-f"></i></a>
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
            <div class="col-md-4">
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                 <div style="margin-top:35px;"class="panel-default panel">
                    <div class="panel-heading"><div class="border-bottom border-info"><h3 class="item animated slideInDown">Reset Password</h3></div> </div>
                        <div class="col-md-12" style="box-shadow: 1px 2px 5px gray; margin-top: 20px;">
                
                            <form action="" method="post" style="margin-top:10px;padding-top:10px;padding-bottom:4px;">
                                <fieldset>
    
      
                                    <div class="form-group">
                                        <input type="email" name="uemail" placeholder="enter email here ..." class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="log" class="btn-default btn waves-effect waves-light">Reset Password</button>
                                    </div>
                                </fieldset>
                            </form>
                            <?php
							error_reporting(1);
                            if(isset($_POST['log'])){
                                $uemail = $_POST['uemail'];
                                if(!empty($uemail)){
                                    $res = $ob->select_data("SELECT `pass` FROM `writers` WHERE email ='$uemail'",1);
                                    $subject = "UDAAN Writers";
                                    echo$txt = "Password : ".$res[0][0];
                                    $headers = "From: udaantheculture@gmail.com";
                                    $chk = mail($uemail,$subject,$txt,$headers);
                                    if($chk){
                                        echo "<script>alert('Sent, Please Check your email');</script>";
                                    }else{
                                        echo "<script>alert('try again');</script>";
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                     <hr>
                    <p></p>
                <div class="panel-default panel">
                    <div class="panel-heading"><h4>Help Desk</h4></div>
                    
                        <p>Send us your query anytime!</p>
                        <p><strong>Mobile : </strong><br>Devesh Sahu:8103289101<br>Digvijay Singh: 8516009191<br><br>
                        <strong>Email:</strong> <a href="#">sdevesh273@gmail.com</a>
                        </p>
                
                </div>
        </div>
        </div>
    </div>
    <!-- /.container -->
    <!-- Footer -->
       <!-- Footer -->
       <div style="position:absolute;bottom:0"class="container-fluid">
        
           <div class="container">
               <center><p style="color: gray; font-family: Century Gothic; font-size: 11px; line-height: 15px;">copyright &copy; 2018-19 Developed by Team <a href="index.html">EasyWriteUps</a></p></center>
            </div>
        
        </div>
    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

    <script type="text/javascript" src="js/popper.min.js"></script>
    
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="js/mdb.min.js"></script>
    
    <script type="text/javascript" src="js/wowslider.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
    
    </div>
    <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/js/vendor/jquery.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="http://malsup.github.com/jquery.form.js"></script> 
    
    <script>
    /*if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        window.location.href = '../mobile/index.html';
    }*/
    </script>
      
</body>
</html>