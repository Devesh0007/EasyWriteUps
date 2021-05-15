<?php
session_start();
include_once("../include/conn.php");
$ob = new connect();
?>
<!DOCTYPE html>
<html>
    <head>
    <link href="../assets/img/site_img/favicon.ico" rel="icon" type="image/x-icon" />
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MEMBER | VALIDATION</title>
    <!-- Bootstrap Core CSS -->
    <!-- BOOTSTRAP CORE CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
    <!-- Custom CSS -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        table tr td, table tr th{
            padding: 10px;
        }
    </style>
</head>
<body style="background-image: url(../images/1.jpg); 
                background-attachment: fixed; 
                background-repeat: no-repeat; 
                background-size: cover;">
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-53736601-1', 'auto');
  ga('send', 'pageview');
</script>
        <div style="margin-top:40px" class="container">
            <div class="boxMain">
                <h1 style="margin:0"><b><i class="glyphicon glyphicon-send"></i> <img src="udaan_font black.jpg"> Writers</b></h1>
            </div>
            <hr />
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <?php
                     $link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    $encrypted_txt = substr($link,38);
                    $ob = new Connect();
                    $email = $ob->encrypt_decrypt('decrypt', $encrypted_txt);
                        $chk = $ob->checkData("select email from writers where email='$email'");
                        if($chk==1){
                            $_SESSION['writer'] = "";
                            $ob->ProcessQuery("update writers set status = 'success' where email='$email'");
                            echo "<h3>Email validation success</h3>
                            <p><a href='index.php'>Click here to login</a></p>";
                        }
                        header("refresh:3;login.php");
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>	