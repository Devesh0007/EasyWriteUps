<?php
                    if($timeline->num_rows>0){
                        while($row = $timeline->fetch_array()){
                            if($row[4]){
                                echo '<h2>'.$row[1].'</h2>
                <p class="lead">by EasyWriteUps</p>
                <p><i class="far fa-clock"></i> Posted on August 28, 2013 at 10:00 PM</p>
                <hr>
                <img class="img-responsive" src="'.$row[4].'" alt="">
                <hr>
                <p>'.htmlspecialchars_decode($row[2]).'</p>
                <a class="btn btn-primary" href="article.php?id='.$row[0].'">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <p><span style="color:cadetblue">Category : <a href="category.php?category='.$row[5].'">'.$row[3].'</a></span></p>
                <hr>';
                   
                            }else{
                            echo '<h2>'.$row[1].'</h2>
                <p class="lead">by EasyWriteUps</p>
                <p><i class="far fa-clock"></i> Posted on August 28, 2013 at 10:00 PM</p>
                <hr>
                <p>'.htmlspecialchars_decode($row[2]).'</p>
                <a class="btn btn-primary" href="article.php?id='.$row[0].'"><d style="font-size:14px;">Read More ></d><span class="glyphicon glyphicon-chevron-right"></span></a>
                <p><span style="color:cadetblue">Category : <a href="category.php?category='.$row[5].'">'.$row[3].'</a></span></p>
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