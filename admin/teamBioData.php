<?php session_start();
header( 'Content-Type: text/html; charset=utf-8' ); 
include_once('../include/conn.php');
$ob = new Connect();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Team Biodata</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
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
                <a class="navbar-brand" href="index.php"><b><i class="glyphicon glyphicon-send"></i> Team UDAAN</b></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="../index.php">HOME</a></li>
                    <li><a href="../about.html">ABOUT UDAAN</a></li>
                    <li><a href="../blog/">BLOG</a></li>
                    <li><a href="../dropbox/">DROPBOX</a></li>
                    <li><a href="../gallery/">GALLERY</a></li>
                    <li><a href="../team/">TEAM UDAAN</a></li>
                    <li><a href="../writers/">MEMBER LOGIN</a></li>
                    <li><a href="../contact.html">CONTACT</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
        <div style="margin-top:80px" class="container">
            <form id="mem_regi" action="updataeBIo.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <form action="teambiodata_submit.php" method="post">
                            <div class="form-group">
                            <label>Select Season</label>
                            <select id="season" name="season" required class="form-control">
                                <option value="">Select</option>
                                <?php
                                    $sql ="SELECT `sid`, `sname` FROM `team_session` order by sid desc";
                                    $res = $ob->select_data2($sql);
                                    if($res->num_rows>0){
                                        while($row = $res->fetch_array()){
                                            echo "<option value='$row[0]'>Season $row[1]</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Board</label>
                            <select id="board" name="board" required class="form-control">
                                <option value="">Select</option>
                                <?php
                                    $sql ="SELECT `bid`,`bname` FROM `team_board`";
                                    $res = $ob->select_data2($sql);
                                    if($res->num_rows>0){
                                        while($row = $res->fetch_array()){
                                            echo "<option value='$row[0]'>$row[1]</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Your Name</label>
                            <select id="membername" name="membername" required class="form-control">
                            </select> 
                        </div>
                        <div class="form-group">
                            <label>Facebook Link</label>
                            <input type="text" id="fblink" placeholder="http://facebook.com/username" name="fblink" required class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>About me</label>
                            <textarea id="bio" placeholder="max 500 characters" maxlength="500" name="bio" required class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="member" class="btn-primary btn" value="Submit"  />
                            <input type="reset" value="Clear" class="btn btn-danger" />
                       </div>
                        </form>
                    </div>
                </div>
            </form>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      
        <script>
            $("#board").change(function(){
                var sid = $("#season :selected").val();
                var bid = $("#board :selected").val();
                $.post("select_member_bio.php",{sid:sid, bid:bid},function(data){
                    $("#membername").html(data);
                });
            });
      </script>
  </body>
</html>