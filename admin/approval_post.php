   <table class="table-bordered table-responsive table">
    <tr>
        <th>S No.</th>
        <th>Title</th>
        <th>Body</th>
        <th>Category</th>
        <th>Date</th>
        <th>Writers</th>
    </tr>
<?php
include_once('../include/conn.php');
$ob = new Connect();
    $sort = $_POST['sort'];
    $tablename ="posts_temp";
    $a = $ob->select_data2("select posts_temp.post_id, posts_temp.title,posts_temp.body AS body,categories.category, posts_temp.posted, w.name, w.wid from writers w, posts_temp , categories where categories.category_id=posts_temp.category_id and posts_temp.wid = w.wid order by $sort");
    if ($a->num_rows > 0) {
        $i=1;
        /*<a href='localhost/article.php?id=$row[0]'>read more...</a>*/
        while($row = $a->fetch_array()) {
            echo "<tr>
            <td>$i.</td>
            <td>".$row[1]."</td>
            <td>
            <div style='height:auto;width:100%'>
                <a target='_blank' href='../showarticle.php?id=$row[0]&tb=$tablename'>Read content...</a>
            </div></td>
            <td>".$row[3]."</td>
            <td>".$row[4]."</td>
            <td><a target='_blank' href='writersProfile.php?id=".$row[6]."'>".$row[5]."</a></td>
            <td style='text-align:center'><input type='button' onclick=appPost($row[0]) value='Approve' class='btn-info btn' />
            <td style='text-align:center'><input type='button' onclick=delPost($row[0]) value='Delete' class='btn-danger btn' />
            </td></tr>";
            $i++;
        }
    }else{
        echo"<tr><td colspan='4' style='text-align:center'>No Posts found</td></tr>";
    }

      
?>
</table>