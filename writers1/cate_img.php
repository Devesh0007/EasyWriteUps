<?php
session_start();
header( 'Content-Type: text/html; charset=utf-8' ); 
include_once("../include/conn.php");

if(!isset($_SESSION['writer'])){
    header("location:index.php");
}
$email = $_SESSION['writer'];
$ob = new connect();

$res = $ob->select_data2("SELECT `wid`,mob,email FROM `writers` WHERE email = '$email'");
if($res->num_rows>0){
    $profile = $res->fetch_array();
}
$_SESSION['wid'] = $profile[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../assets/img/site_img/favicon.ico" rel="icon" type="image/x-icon" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>EasyWriteUps |  WRITERS</title>
    <!-- Bootstrap Core CSS -->
    <!-- BOOTSTRAP CORE CSS -->
    <link rel="icon" type="image/png" sizes="192x192"  href="../assets/img/site_img/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>
    <link href="css/editor.css" type="text/css" rel="stylesheet"/> 
    <link href="../css/styleback.css" type="text/css" rel="stylesheet"/> 
    <!-- Custom CSS -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        
        h3{
            margin: 0;
        }
        h1,h2,h3{
            text-shadow:0.4px 0.4px 0.4px;
        }
        #status, #status1{
            color: red;
        }
    </style>
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
                <a class="navbar-brand" href="writers.php"><b>&nbsp;EasyWriteUps Writers</b></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="writers.php">HOME</a></li>
                    <li><a href="update.php">UPDATE CONTENT</a></li>
                    <li class="active"><a href="cate_img.php">MORE</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container-fluid" style="margin-top:80px">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Update Profile </h3>
                        <hr/>
                        <form id="profile" action="update_profile.php" method="post">
                            <div class="form-group">
                                <label>Select Image</label>
                                <input type="file" name="dp" id="dp" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Mobile No</label>
                                <input type="text" name="mob" value="<?php echo $profile[1]; ?>" id="mob" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="<?php echo $profile[2]; ?>" id="email" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" value="Update" type="submit" id="update_img" />
                            </div>
                        </form>
                         <div class="form-group">
                                <div class="progress">
                                  <div class="progress-bar bar" role="progressbar" aria-valuenow="0"
                                  aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                    <div class="percent">0%</div>
                                  </div>
                                </div>
                                <div id="status"></div>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Change Category</h3>
                        <hr/>
                        <div class="form-group">
                            <label>Select Title</label>
                            <select id="title" name="title" class="form-control">
                                <option value="">Select</option>
                                <?php
                                $sql = "select post_id, title from posts where wid = ".$_SESSION['wid']."";
                                $res1 = $ob->select_data2($sql);
                                if($res1->num_rows>0){
                                    while($row = $res1->fetch_array()){
                                        
                                echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                                
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Current Category</label>
                            <input class="form-control" id="current" type="text"/>
                        </div>
                        <div class="form-group">
                            <label>Select New Category</label>
                            <select id="cate" class="form-control">
                                <option value="">Select</option>
                                <?php  
                                    $a = $ob->select_data2("select * from categories order by category");
                                    if ($a->num_rows > 0) {
                                        while($row = $a->fetch_array()) {
                                            echo "<option value='$row[0]'>$row[1]</option>";
                                        }
                                    }else{
                                        echo"<option value='1'>uncategories</option>";
                                    }     
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" value="Change Category" type="button" id="update_cate" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Upload Article Image</h3>
                        <hr/>
                        <h4>Instructions</h4>
                        <ol>
                            <li></li>
                            <li></li>
                        </ol>
                        <form id="art_img_update" action="upload_art_img.php" method="post">
                            <div class="form-group">
                                <label>Select Title</label>
                                <select id="title2" name="title2" class="form-control">
                                    <option value="">Select</option>
                                    <?php
                                    $sql = "select post_id, title from posts where wid = ".$_SESSION['wid']."";
                                    $res1 = $ob->select_data2($sql);
                                    if($res1->num_rows>0){
                                        while($row = $res1->fetch_array()){
                                    echo '<option value="'.$row[0].'">'.$row[1].'</option>';

                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Image</label>
                                <input type="file" name="art_img" id="art_img" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" value="Upload Image" type="submit" id="update_img" />
                            </div>
                        </form>
                        <div class="form-group">
                                <div class="progress">
                                  <div class="progress-bar bar1" role="progressbar" aria-valuenow="0"
                                  aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                    <div class="percent1">0%</div>
                                  </div>
                                </div>
                                <div id="status1"></div>  
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/js/vendor/jquery.min.js"></script>
        <!-- Latest compiled and minified CSS -->
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script> 
    <script>
        $("#title").change(function(){
            var title = $("#title").val();
            if(title.length>0){
                $.post("getCurrCate.php",{title:title},function(data){
                    $("#current").val(data);
                });
            }else{
                alert("Please select title");
            }
        });
        $("#update_cate").click(function(){
            var title = $("#title option:selected").val();
            var cate = $("#cate option:selected").val();
            if(title.length>0 && cate.length>0){
                $.post("update_cate.php",{title:title, cate:cate},function(data){
                    alert(data);
                    $('#title').prop('selectedIndex', 0);
                    $("#current").val("");
                    $('#cate').prop('selectedIndex', 0);
                });
            }else{
                alert("Please select title");
            }
        });
        
        $(function() {
            var bar = $('.bar1');
            var percent = $('.percent1');
            var status = $('#status1');
            status.css({"color":"red"});
            $('#art_img_update').ajaxForm({
                beforeSend: function() {
                    status.text("Please wait...");
                    var percentVal = '0%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                    status.html(xhr.responseText);
                    status.css({"color":"green"});
                    //alert(xhr.responseText);
                    $("#art_img").val("");
                }
            });
        }); 
        
        $(function() {
            var bar = $('.bar');
            var percent = $('.percent');
            var status = $('#status');
            status.css({"color":"red"});
            $('#profile').ajaxForm({
                beforeSend: function() {
                    status.text("Please wait...");
                    var percentVal = '0%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                    status.css({"color":"green"});
                    status.html(xhr.responseText);
                    //alert(xhr.responseText);
                    $("#dp").val("");
                }
            });
        }); 
    </script>
</body>
