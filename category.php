<?php
header( 'Content-Type: text/html; charset=utf-8' ); 
include_once("include/conn.php");
$ob = new connect();
if(isset($_GET['p']) && is_numeric($_GET['p']) && isset($_GET['category'])){
    $page = $_GET['p'];
    $category = $_GET['category'];
    if(empty($category)){
        header("location:not_found.html");
    }
    $record_count = $ob->select_data2("select * from posts where category_id=$category");
    $per_page = 10;
$pages = ceil($record_count->num_rows/$per_page);
}else if(isset($_GET['category'])){
    $category = $_GET['category'];
    if(empty($category)){
        header("location:not_found.html");
    }
    $page = 1;
    $record_count = $ob->select_data2("select * from posts where category_id=$category");
    $per_page = 10;
    $pages = ceil($record_count->num_rows/$per_page);
}else{
    header("location:index.php");
}
if($page<=0){
    $start=0;
}else{
    $start = $page * $per_page -$per_page;
}
$prev = $page-1;
$next = $page+1;
if(isset($_GET['category'])){
    $timeline = $ob->select_data2("select post_id,title, body,category, img, categories.category_id ,posted from posts INNER JOIN categories on categories.category_id=posts.category_id where categories.category_id='$category' order by post_id desc limit $start,$per_page");
}else{
header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>EasyWriteUps</title>
    
    <link rel="icon" type="image/ico" href="../images/" />
    
    
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="bcss/bootstrap.min.css" rel="stylesheet">
    <link href="bcss/mdb.min.css" rel="stylesheet">
    <link href="bcss/style.css" rel="stylesheet">
    <link href="bcss/animate.css" rel="stylesheet">
    <link href="css/styleback.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bcss/slider.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
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
            <div class="col-md-8">
                <!-- First Blog Post -->                
                <?php
                    if($timeline->num_rows>0){
                        while($row = $timeline->fetch_array()){
                            $pdate = explode(" ",$row[6]);
                            $pdate = explode("-",$pdate[0]);
                            if($row[4]){
                                echo '<h2>'.$row[1].'</h2>
                <hr>
                <img class="img-responsive" src="'.$row[4].'" alt="">
                <hr>
                <div style="width:auto;height:90px;overflow:hidden"><p>'.htmlspecialchars_decode($row[2]).'</p></div>
                <p></p>
                <a style="border-radius:6px;"class="btn btn-primary" href="article.php?id='.$row[0].'"><d style="font-size:14px;">Read More ></d><span class="glyphicon glyphicon-chevron-right"></span></a>
                <p></p>
                <p><span style="color:cadetblue">Category : <a href="category.php?category='.$row[5].'">'.$row[3].'</a></span>&nbsp;&nbsp;&nbsp;<i class="far fa-clock"></i>&nbsp;'.$pdate[2].'/'.$pdate[1].'/'.$pdate[0].'</p><hr>';
                }else{
                echo '<h2>'.$row[1].'</h2><hr>
                <div style="width:auto;height:90px;overflow:hidden"><p>'.htmlspecialchars_decode($row[2]).'</p></div>
                <p></p>
                <a style="border-radius:6px;"class="btn btn-primary" href="article.php?id='.$row[0].'"><d style="font-size:14px;">Read More ></d><span class="glyphicon glyphicon-chevron-right"></span></a>
                <p></p>
                <p><span style="color:cadetblue">Category : <a href="category.php?category='.$row[5].'">'.$row[3].'</a></span>&nbsp;&nbsp;&nbsp;<i class="far fa-clock"></i>&nbsp;'.$pdate[2].'/'.$pdate[1].'/'.$pdate[0].'</p>
                <hr>';
                        }
                        }
                    }else{
                        echo '<div class="panel panel-default">
                        <div style="text-align:center" class="panel-body">
                            <h5>No post available here</h5>
                        </div></div>
                            ';
                    }
                ?>
                <!-- Pager -->
                <ul style="visibility:hidden;"class="pager">             
                    <li class="previous">
                        <?php
                  if($timeline->num_rows>0){    
                    if($prev>0){
                        echo "<a href='category.php?p=$prev&category=$category'><span class='glyphicon glyphicon-arrow-left'></span>&nbsp;Previous</a>";
                    }
                  }
                ?>
                    </li>
                    <li class="next">
                       <?php
                          if($page<$pages)  {
                              echo "<a href='category.php?p=$next&category=$category'>Next&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-arrow-right'></span></a>";
                          }        
                                ?>
                       
                    </li>
                </ul>

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

</body>

</html>
