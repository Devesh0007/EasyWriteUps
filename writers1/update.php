<?php
session_start();
header( 'Content-Type: text/html; charset=utf-8' ); 
include_once("../include/conn.php");

if(!isset($_SESSION['writer'])){
    header("location:index.php");
}
$email = $_SESSION['writer'];
$ob = new connect();

$res = $ob->select_data2("SELECT `wid` FROM `writers` WHERE email = '$email'");
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<link href="css/editor.css" type="text/css" rel="stylesheet"/>
		<link href="../css/styleback.css" rel="stylesheet">
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
    h3{
            margin: 0;
        }
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
                }
          #ab{margin-top:4px;
	        height:30px;
	        width:120px;
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
                    <li><a href="writers.php">HOME</a></li>
                    <li class="active"><a href="update.php">UPDATE CONTENT</a></li>
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
            <div class="col-lg-12">
                <div class="panel-default panel">
                    <form action="" method="post" id="update" enctype="multipart/form-data">
                        <div class="panel-body">
                            <h3>Update Article</h3>
                        <hr/>
                        <h5 style="color:red">Instructions :-</h5>
                        <ol style="color:red">
                            <li>Image is optional and upload limit size in max 1mb, if your image size is max then image is not uploaded but article is submitted.</li>
                            <li>Google input tool in available, <span style="color:yellow;background-color:black">Use Ctrl+g to change lang. Hindi-Eng</span>.</li>
                        </ol>
                        <div class="form-group">
                            <label>Title</label>
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
                                <input type="button" value="Get Article" id="search" name="search" />
                            </div>
                        <div class="form-group">
                            <label>Article</label>
                            <div class="container-fluid">
                                <div id="editor" class="nopadding">
                                    <textarea id="txtEditor"></textarea> 
                                </div>
                            </div>
                            <textarea style="display:none" name="postbody" id="postbody"></textarea>
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
    <script>
        $("#search").click(function(){
            var title = $("#title option:selected").val();
            if(title.length>0){
                $.post("getContent.php",{title:title},function(data){
                    $(".Editor-editor").html(data);
                });
            }else{
                alert("Please select title");
            }
        });
        
        $("#update").submit(function(){
            var title = $("#title option:selected").val();
            $("#postbody").val("<div>"+$(".Editor-editor").html().trim()+"</div>");
            var body = $("#postbody").val();
            $.post("update_article.php",{title:title, body:body}, function(data){
                alert(data);
                $('#title').prop('selectedIndex', 0);
                $(".Editor-editor").html("");
                $("#postbody").val("");
            });
            return false;
        });
    </script>
</body>
