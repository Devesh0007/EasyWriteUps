<?php session_start();
header( 'Content-Type: text/html; charset=utf-8' ); 
if(isset($_SESSION['admin'])){
include_once('../include/conn.php');
    $admin = $_SESSION['admin'];
    $ob = new Connect();
}else{
    echo "<script>window.location.href='index.php';</script>";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>EasyWriteUps | Admin Panel</title>
        <!-- Responsive Metatag -->
        <link rel="shortcut icon" type="image/png" href="../assets/img/site_img/favicon.ico"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/css/flat-ui.min.css"/>
        <link rel="stylesheet" href="css/style.css" />
        <style>
            h6{
                margin: 0;
            }
            h1,h2,h3,h4,p{
                text-shadow:0.4px 0.4px 0.4px;
            }
            .box h4{
                float: left;
                margin-right: 80px;
                color: cadetblue;
            }
            #p,#o{
                color:darkslateblue;
            }
            .box span{
                font-size: 20px; 
                color: white;
            }
            .box p{
                margin: 0;
                color: white;
            }
            .well-sm{
                margin-right: 10px;
            }
            .picchange{
                color: darkcyan;
                cursor: pointer;
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
              <li class="active"><a href="home.php">Welcome <?php echo $admin; ?></a></li>
              <li><a href="../index.php">HOME</a></li>
                <li><a href="../index_new.php">BLOG</a></li>
                
            </ul>
            <form class="navbar-form navbar-right" action="" method="post" role="search">
              <div class="form-group">
              <a href="logoutAdmin.php" style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;<b>Logout</b></a>
              </div>
            </form>
          </div><!-- /.navbar-collapse -->
        </nav><!-- /navbar -->
        <div class="container">
            <h2 style="margin:0;margin-bottom:10px">EasyWriteUps Admin</h2>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#dash">Dash board</a></li>
                        <li><a data-toggle="tab" href="#Regi">Post Aproval</a></li>
                        <li><a data-toggle="tab" href="#writers">Writers</a></li>
                        <li><a data-toggle="tab" onclick="getMsg()" href="#Notifications">Notifications</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="dash" class="tab-pane fade in active">
                          <h4>Dash board</h4>
                        <hr/>
                        <div class="box" style="margin-top:20px;">
                           <table>
                               <tr>
                                   <td><div class="well-sm" style="background-color:darkturquoise">
                                       <p>Total Posts</p><span id="r"></span>
                                   </div></td>
                                   <td><div class="well-sm" style="background-color:cornflowerblue">
                                       <p>Total Comments</p><span id="q"></span>
                                   </div></td>
                               </tr>
                           </table>
                            
                        </div>
                      </div>
                        <div id="Regi" class="tab-pane fade">
                       <div>
                            <table style="margin-top:10px;text-align:center" class="table-bordered table-responsive table">
                                <tr>
                                    <td><input style="width:150px" class="btn-success btn" type="button" value="Sort by Newest" id="new_post" /></td>
                                    <td><input style="width:150px" class="btn-success btn" type="button" value="Sort by Oldest" id="old_post" /></td>
                                    <td><input style="width:150px" class="btn-success btn" type="button" value="Sort by Alphabet" id="alpha_post" /></td>
                                </tr>
                            </table>
                        </div>
                        <div class="panel-body panel" id="approvalData"></div>
                      </div>
                        <div id="create" class="tab-pane fade">
                        <ul style="margin-top:20px" class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" onclick="getTxt()" href="#home">Text Files</a></li>
                        <li><a data-toggle="tab" onclick="getWriter()" href="#menu1">Online Writers</a></li>
                        <li><a data-toggle="tab" onclick="getPaint()" href="#menu2">Paintings</a></li>
                      </ul>

                      <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                          <div id="getTxt"></div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                          <div id="getWrite"></div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                          <div id="getPaint"></div>
                        </div>
                      </div>
                    </div> 
                        <div id="writers" class="tab-pane fade">
                          <h4>Writers</h4>
                        <hr/>
                        <div class="box" style="margin-top:20px;">
                           <table class="table-bordered table">
                               <tr>
                                   <th>No.</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Mobile</th>
                                   <th>Address</th>
                                   <th>About</th>
                               </tr>
                               <?php
//header('Content-Type: text/html; charset=utf-8');
include_once('../include/conn.php');
$ob = new Connect();
    $a = $ob->select_data2("SELECT `name`, `email`, `mob`, `addr`, `about` FROM `writers` ORDER BY wid DESC");
    if ($a->num_rows > 0) {
        $i=1;
        while($row = $a->fetch_array()) {
            echo "<tr>
            <td>$i.</td>
            <td>".$row[0]."</td>
            <td>".$row[1]."</td>
            <td>".$row[2]."</td>
            <td>".$row[3]."</td>
            <td>".$row[4]."</td>
            </tr>";
            $i++;
        }
    }else{
        echo"<tr><td colspan='4' style='text-align:center'>No Posts found</td></tr>";
    }
       /*<td style='text-align:center'><input type='button' onclick=delPost($row[0]) value='Delete' class='btn-danger btn' />
            </td>*/
?>
                           </table>
                            
                        </div>
                      </div>
                        <div id="Notifications" class="tab-pane fade">
                          <h4>Notifications</h4>
                        <hr/>
                            <div class="box">
                                <div class="form-group">
                                    <label><strong>Notification</strong></label>
                                    <textarea id="ntxt" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="button" id="notify" class="btn-info btn" value="create Notification" />
                                </div>
                            </div>
                            <hr/>
                        <div id="notification" class="box" style="margin-top:20px;">
                            
                        </div>
                      </div>
                        <div id="Members" class="tab-pane fade">
                            <div id="Season">
                                <h4>Seasons</h4>
                                <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                        <label>Create Season</label>
                                        <select id="cseason" class="form-control">
                                            <option value="">Select</option>
                                            <?php
                                                for($i=5;$i<=10;$i++){
                                                    echo "<option value ='$i'>Season $i</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Year</label>
                                        <select id="cyear" class="form-control">
                                            <option value="">Select</option>
                                            <?php
                                                for($i=14,$j=5;$i<=20;$i++,$j++){
                                                    echo "<option value='20$i-20".($i+1)."'>Season $j  20$i-20".($i+1)."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="button" id="c_sea" class="btn-primary btn" value="Create"  />
                                        <button class="btn-info btn" onclick="getSea()">Refresh Data</button>
                                    </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4" style="height:200px;overflow-x:auto">
                                            <table class="table table-bordered" id="disp_sea"></table>
                                        </div>
                                    <div class="col-lg-4 col-md-4">
                                        
                                    </div>
</div>
                                <hr/>
                            </div>
                            <div id="Board">
                                <h4>Boards</h4>
                                <div class="row">
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                        <label>Create Board</label>
                                        <input type="text" id="board" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <input type="button" id="c_board" class="btn-primary btn" value="Create"  />
                                        <button class="btn-info btn" onclick="getBoard()">Refresh Data</button>
                                    </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4" style="height:200px;overflow-x:auto">
                                            <table class="table table-bordered" id="disp_bo"></table>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            
                                    </div>
                                </div>
                                <hr/>
                            </div>
                            <div id="Member">
                                <h4>Members</h4>
                                <div class="row">
                                    <form id="mem_regi" action="create_member.php" method="post" enctype="multipart/form-data">
                                        <div class="col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <label>Select Season</label>
                                            <select id="sseason" name="sseason" required class="form-control"></select>
                                        </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Select Board</label>
                                        <select id="sboard" name="sboard" required class="form-control"></select>
                                    </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Member type</label>
                                        <select id="mtype" name="mtype" required class="form-control">
                                            <option value="">Select</option>
                                            <option>Coordinator</option>
                                            <option>Member</option>
                                            <optgroup></optgroup>
                                            <option>Student Coordinator</option>
                                            <option>Teacher Coordinator</option>
                                        </select>
                                    </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Member Name</label>
                                        <input type="text" id="mname" name="mname" required class="form-control" />
                                    </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Facebook Link</label>
                                        <input type="text" id="fblink" name="fblink" required class="form-control" />        
                                    </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Member Photo</label>
                                        <input type="file" id="pic" name="pic" class="form-control" />        
                                    </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea name="bio" id="bio" required class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <br/>
                                            <br/>
                                    <div class="form-group">
                                        <input type="submit" name="member" class="btn-primary btn" value="Add Member"  />
                                        <input type="reset" value="Clear" class="btn btn-danger" />
                                   </div>
                                    </div>
                                        <div class="col-lg-4 col-md-4">
                                <div class="progress">
                                  <div class="progress-bar bar" role="progressbar" aria-valuenow="0"
                                  aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                    <div class="percent">0%</div>
                                  </div>
                                </div>
                                <div id="status"></div>  
                                    </div>
                                    </form>
                                        </div>
                                    </div>
                            <div id="Pic">
                                <h4>Upload Photo</h4>
                                <div class="row">
                                    <form id="picupload1" action="uploadPic.php" method="post" enctype="multipart/form-data">
                                        <div class="col-lg-4 col-md-4">
                                        <div class="form-group">
                                            <label>Select Season</label>
                                            <select id="sseason1" name="sseason1" required class="form-control"></select>
                                        </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Select Board</label>
                                        <select id="sboard1" name="sboard1" required class="form-control"></select>
                                    </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Member Name</label>
                                        <select id="mnames1" required class="form-control" name="mnames1"></select>
                                    </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label>Member Photo</label>
                                    <input type="file" id="pic1" required name="pic1" class="form-control" />   
                                    </div>
                                            <div class="form-group">
                                <input type="submit" name="member" class="btn-primary btn" value="Add Member"  />
                                <input type="reset" value="Clear" class="btn btn-danger" />
                                        
                                    </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                   <br/><br/>
                                <div class="progress">
                                  <div class="progress-bar bar1" role="progressbar" aria-valuenow="0"
                                  aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                    <div class="percent1">0%</div>
                                  </div>
                                </div>
                                <div id="status1"></div>  

                                    </div>
                                        
                                    </form>
                                        </div>
                                    </div>
                                <hr/>
                            </div>
                      </div>
                    </div>
                    </div>
                </div>
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/js/vendor/jquery.min.js"></script>
       
    <script src="http://malsup.github.com/jquery.form.js"></script> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script>
            setInterval(function(){
                $.post("dashboard.php",function(data){
                   val =JSON.parse(data);
                    $("#r").text(val[0]);
                    $("#q").text(val[1]);
                }); 
                
            },3000);
            
            
            function getPostList(sort){
                $.post("approval_post.php",{sort:sort},function(data){
                    $("#approvalData").html(data);
                })
            }
            getPostList("post_id desc");
           
            $("#new_post").click(function(){
                  getPostList("post_id desc");
              });
              $("#old_post").click(function(){
                  getPostList("post_id");
              });
              $("#alpha_post").click(function(){
                  getPostList("title");
              });
            
            function delPost(id){
                $.post("deletePost.php",{id:id},function(data){
                    getPostList("post_id desc");
                    alert(data);
                });
            }
            
            function appPost(id){
                $.post("approvalPost.php",{id:id},function(data){
                    getPostList("post_id desc");
                    alert(data);
                });
            }
            
            function getTxt(){
                $.post("get_text.php",function(data){
                    $("#getTxt").html(data);
                });
            }
            
            function getPaint(){
                $.post("get_paint.php",function(data){
                    $("#getPaint").html(data);
                });
            }
            
            function getWriter(){
                $.post("get_writer.php",function(data){
                    $("#getWrite").html(data);
                });
            }
            
            $("#notify").click(function(){
                var ntxt = $("#ntxt").val();
                $.post("notify.php", {ntxt:ntxt}, function(data){
                    alert(data);
                    getMsg();
                    $("#ntxt").val("");
                });
                
            });
            
            function getMsg(){
                $.post("notifications.php",function(data){
                    $("#notification").html(data);
                });
            }
            
            function notiDel(nid){
                $.post("delnotify.php", {nid:nid}, function(data){
                    alert(data);
                    getMsg();
                });
                
            }
            
            $("#c_sea").click(function(){
                var season = $("#cseason :selected").val();
                var year = $("#cyear :selected").val();
                if(season.length>0 && year.length>0){
                    $.post("create_season.php",{season:season, year:year},function(data){
                        alert(data);
                        getSea();
                        getSeaBo();
                    });
                }
            });
            
            function getSea(){
                $.post("select_season.php", function(data){
                    $("#disp_sea").html(data);
                });
                
            }
            
            $("#c_board").click(function(){
                var board = $("#board").val();
                if(board.length>0){
                    $.post("create_board.php",{board:board},function(data){
                        alert(data);
                        getBoard();
                        getSeaBo();
                    });
                }
            });
            
            function getBoard(){
                $.post("select_board.php", function(data){
                    $("#disp_bo").html(data);
                });
                
            }
            
            function getSeaBo(){
                $.post("select_board_member.php", function(data){
                    $("#sboard").html(data);
                    $("#sboard1").html(data);
                });
                $.post("select_season_member.php", function(data){
                    $("#sseason").html(data);
                    $("#sseason1").html(data);
                });
            }
            
            function getMemBoSea(){
                getSea();
                getBoard();
                getSeaBo();
            }
            
          $("#sboard").change(function(){
                var sid = $("#sseason :selected").val();
                var bid = $("#sboard :selected").val();
                $.post("select_member_bio.php",{sid:sid, bid:bid},function(data){
                    $("#mnames").html(data);
                });
            });
            
            $("#sboard1").change(function(){
                var sid = $("#sseason1 :selected").val();
                var bid = $("#sboard1 :selected").val();
                $.post("select_member_bio.php",{sid:sid, bid:bid},function(data){
                    $("#mnames1").html(data);
                });
            });
        </script>
        
        <script>
     /*   
    $("#mem_regi").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: "create_member.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                alert(data);
            //     $("#mname").val("");
              //          $("#fblink").val("");
                //        $("#pic").val("");
            },
            error: function(){
                alert("try again");
            } 	        
        });
        return false;
    });*/
          

    $(function() {

    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');

    $('#mem_regi').ajaxForm({
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
            //alert(xhr.responseText);
            $("#mname").val("");
            $("#fblink").val("");
            $("#pic").val("");
            $("#bio").val("");
        }
    });
}); 
            
            $(function() {

    var bar = $('.bar1');
    var percent = $('.percent1');
    var status = $('#status1');

    $('#picupload1').ajaxForm({
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
            //status.html(xhr.responseText);
            alert(xhr.responseText);
          //  $("#pic1").val("");
        }
    });
}); 
            
            
        </script>
    </body>
</html>
