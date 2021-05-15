<?php
header( 'Content-Type: text/html; charset=utf-8' ); 
if(!isset($_GET['id'])){
    header("location:index.php");
}
$id = $_GET['id'];
include_once('include/conn.php');
if(!is_numeric($id)){
    header("location:index.php");
}
$ob = new connect();
$query = $ob->select_data2("select title,body from posts where post_id='$id'");

?>
<html>
    <head>
        <title>Blog</title>
        <style>
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
    </head>
    <body>
        <div id="back"></div>
<div id="front"></div>
        <div class="container">
            <div class="container">
                <?php $row = $query->fetch_object(); ?>
                <article>
                    <h2><?php echo $row->title; ?></h2>
                    <p><?php echo $row->body; ?></p>
                </article>
            </div>
            <div class="addcomments">
                <form action="<?php echo $_SERVER['PHP_SELF']."?id=$id" ?>" method="post">
                    <label>Email Address</label>
                    <input type="email" name="email-id"/>
                    <br/>
                    <label>Name</label>
                    <input type="text" name="cname"/>
                    <br/>
                    <label>Comment</label>
                    <textarea name="comment" id="" cols="50" rows="10"></textarea>
                    <br/>
                    <input type="submit" value="submit" name="comm" />
                </form>
                <?php
    if(isset($_POST['comm'])){
        $email = $_POST['email-id'];
        $name = $_POST['cname'];
        $comment = $_POST['comment'];
        if($email!=null && $name!=null && $comment!=null){
            $query = $ob->ProcessQuery("insert into comments(post_id,email_add,name,comment) values('$id','$email','$name','$comment')");
        if($query){
            echo "added";
        }else{
            echo "try! again";
        }
        }
    }
    ?>
            </div>
            <div class="viewComments">
                <?php $res = $ob->select_data2("select * from comments where post_id = '$id' order by comment_id desc");
                while($row =$res->fetch_object()):
                ?>
                <div>
                    <h4><?php echo $row->name; ?></h4>
                    <blockquote><?php echo $row->comment; ?></blockquote>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-53736601-1', 'auto');
  ga('send', 'pageview');
</script>
    </body>
</html>