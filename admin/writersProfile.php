<?php
session_start();
header( 'Content-Type: text/html; charset=utf-8' ); 
include_once("../include/conn.php");

if(!isset($_SESSION['admin'])){
    header("location:index.php");
}
$wid = $_GET['id'];
$ob = new connect();

$res = $ob->select_data2("SELECT `name`, `gender`, `email`, `mob`, `addr`, `pic`, `status`, `wid`, `about`  FROM `writers` WHERE wid = '$wid'");
if($res->num_rows>0){
    $profile = $res->fetch_array();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../assets/img/site_img/favicon.ico" rel="icon" type="image/x-icon" />
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>UDAAN |  WRITERS</title>
    <!-- Bootstrap Core CSS -->
    <!-- BOOTSTRAP CORE CSS -->
    <link rel="icon" type="image/png" sizes="192x192"  href="../assets/img/site_img/favicon.ico">
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
        .panel-heading{
            background-color: #fff !important;
        }
        h6{
                margin: 0;
            }
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
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php"><b><i class="glyphicon glyphicon-send"></i> UDAAN Writers</b></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">WRITERS PROFILE</a></li>
                    <li><a href="admin.php">BACK</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container-fluid" style="margin-top:80px">
        <div class="row">
            <div class="col-lg-5">
                <div style="" class="panel-default panel">
                    <div class="panel-body">
                        <h3>Welcome <?php  echo $profile[0]?></h3>
                        <hr/>
                        <table>
                            <tr>
                                <td rowspan="5">
                                    <img src="<?php if(!empty($profile[5])){echo $profile[5];}else{echo "../assets/img/site_img/logo.jpg";}?>"  style="width:150px" class="img-rounded" />
                                </td>
                            </tr>
                            <tr>
                                <th>Gender : </th>
                                <td><?php echo $profile[1]; ?></td>
                            </tr>
                            <tr>
                                <th>Email id : </th>
                                <td><?php echo $profile[2]; ?></td>
                            </tr>
                            <tr>
                                <th>Mobile No. : </th>
                                <td><?php echo $profile[3]; ?></td>
                            </tr>
                            <tr>
                                <th>Address : </th>
                                <td><?php echo $profile[4]; ?></td>
                            </tr>
                        </table>
                        <br/>
                        <br/>
                        <p><b>About you : </b><?php echo $profile[8]; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                     <div class="panel-default panel">
                    <div class="panel-heading">
                        <h4>Uploaded Article</h4>
                    </div>
                    <div style="height:400px;overflow-x:auto" class="panel-body">
                        <table class="table-bordered table">
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Read</th>
                            </tr>
                            <?php
                                $art = $ob->select_data2("SELECT `title`, `posted`,`post_id` FROM `posts` where wid = $wid ORDER BY post_id DESC");
                            if($art->num_rows>0){
                                $i=1;
                                while($row = $art->fetch_array()){
                                    echo "<tr>
                                    <td>$i.</td>
                                    <td>$row[0]</td>
                                    <td>$row[1]</td>
                                    <td><a class='btn-primary btn' href='#'>Read</a></td>
                                    </tr>";
                                    $i++;
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/js/vendor/jquery.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="bootstrap-wysiwyg.js"></script>
    </body>
</html>