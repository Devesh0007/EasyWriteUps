<?php
session_start();
header( 'Content-Type: text/html; charset=utf-8' ); 
include_once("conn.php");

if(!isset($_SESSION['writer'])){
    header("location:index.php");
}
$email = $_SESSION['writer'];
$ob = new connect();

$res = $ob->select_data2("SELECT `name`, `gender`, `email`, `mob`, `addr`, `pic`, `status`, `wid`, `about`  FROM `writers` WHERE email = '$email'");
if($res->num_rows>0){
    $profile = $res->fetch_array();
}
$_SESSION['wid'] = $profile[7];
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
		<-- <link href="../css/styleback.css" rel="stylesheet">-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/js/vendor/jquery.min.js"></script>
    <script src="js/editor.js"></script>
		
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Google Transliterate API
      google.load("elements", "1", {
            packages: "transliteration"
          });

      function onLoad() {
        var options = {
            sourceLanguage:
                google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage:
                [google.elements.transliteration.LanguageCode.HINDI],
            shortcutKey: 'ctrl+g',
            transliterationEnabled: true
        };

        // Create an instance on TransliterationControl with the required
        // options.
        var control =
            new google.elements.transliteration.TransliterationControl(options);

        // Enable transliteration in the textbox with id
        // 'transliterateTextarea'.
        control.makeTransliteratable(['Editor-editor']);
          control.makeTransliteratable(['title']);
      }
      google.setOnLoadCallback(onLoad);
    </script>
    <script>
			$(document).ready(function() {
				$("#txtEditor").Editor();
                $(".Editor-editor").attr('id','Editor-editor');
			});
		</script>
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
            .box h4{
                float: left;
                margin-right: 80px;
                color: cadetblue;
            }
            #r,#p,#o{
                color:darkslateblue;
            }
            a.btn:hover{
                color: cadetblue;
            }
            
            .icon-text-height, .icon-font{
                color:cadetblue;
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
                <a class="navbar-brand" href="writers.php"><b>EasyWriteUps Writers</b></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="writers.php">HOME</a></li>
                    <li><a href="update.php">UPDATE CONTENT</a></li>
                    <li><a href="cate_img.php">MORE</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
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
                    <div style="height:398px;overflow-x:auto" class="panel-body">
                        <form action="" method="post">
                            <table style="width:100%;text-align:center">
                            <tr>
                                <td><input type="submit" value="Waited Article" name="waited" class="btn btn-primary" /></td>
                                <td><input type="submit" value="Posted Article" name="posted" class="btn btn-primary" /></td>
                            </tr>
                        </table>
                        </form>
                        <table class="table-bordered table">
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Read</th>
                                <th></th>
                            </tr>
                            <?php
                            if(isset($_POST['waited'])){
                                $table_name = "posts_temp";
                            }else if (isset($_POST['posted'])){
                                $table_name = "posts";
                            }else{
                                $table_name = "posts";
                            }
                                $art = $ob->select_data2("SELECT `title`, `posted`,`post_id` FROM `$table_name` where wid = '$profile[7]' ORDER BY post_id DESC");
                            if($art->num_rows>0){
                                $i=1;
                                while($row = $art->fetch_array()){
                                    echo "<tr>
                                    <td>$i.</td>
                                    <td>$row[0]</td>
                                    <td>$row[1]</td>
                                    <td><a class='btn-primary btn' target='_blank' href='../fullbody.php?id=".$row[2]."&tb=$table_name'>Read </a></td>";
                                    if($table_name=="posts_temp"){
                                        echo "<td><a class='btn-danger btn' href='deleteArticle.php?id=$row[2]'>Delete</a></td>";
                                    }else{
                                        echo "<td></td>";
                                    }
                                    echo "</tr>";
                                    $i++;
                                }
                            }else{
                                echo "<tr><td class='text-center' colspan='5'><b>No post found! try again</b></td></tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="panel-default panel">
                    <div class="panel-heading">
                        <h4>Upload Article</h4>
                        <hr/>
                        <h5 style="color:red">Instructions :-</h5>
                        <ol style="color:red">
                            <li>Image is optional and upload limit size in max 1mb, if your image size is max then image is not uploaded but article is submitted.</li>
                            <li>Google input tool in available, <span style="color:yellow;background-color:black">Use Ctrl+g to change lang. Hindi-Eng</span>.</li>
                        </ol>
                    </div>
                    <form action="createPost.php" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" id="title" name="title" class="form-control" />
                         </div>
                        <div class="form-group">
                            <label>Article</label>
                            <div class="container-fluid">
                                <div id="editor" class="nopadding">
                                    <textarea id="txtEditor"></textarea> 
                                </div>
                            </div>
                            <textarea name="postbody" style="display:none" id="postbody"></textarea>
                         </div>
                        <div class="form-group">
                            <label>Image (optional)</label>
                            <input type="file" name="myfile" class="form-control" />
                         </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select style="width:20%;min-width:200px;" name="cate" id="sel_cate" class="form-control">
                                        <?php  
    $a = $ob->select_data2("select * from categories order by category");
    if ($a->num_rows > 0) {
        while($row = $a->fetch_array()) {
            echo "<option value='$row[0]'>$row[1]</option>";
        }
    }else{
        echo"<option value='1'>uncategories</option>";
    }     ?>
                                    </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="sub" value="Upload Article" class="btn-primary btn" />
                         </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/js/vendor/jquery.min.js"></script>
        <!-- Latest compiled and minified CSS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="js/editor.js"></script>
    <script>
        $(document.body).on('focusout', '.Editor-editor' ,function(){
           $("#postbody").val("<div>"+$(".Editor-editor").html().trim()+"</div>");
        });
          
               $(window).bind('keydown', function(event) {
    if (event.ctrlKey || event.metaKey) {
        switch (String.fromCharCode(event.which).toLowerCase()) {
        case 'g':
            event.preventDefault();
            break;
        }
    }
});
        </script>
                
</body>
