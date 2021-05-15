   <table class="table-bordered table-responsive table">
    <tr>
        <th>S No.</th>
        <th>Name</th>
        <th>College/University</th>
        <th>Department</th>
        <th>Mobile No.</th>
        <th>Email id</th>
        <th>File Download</th>
    </tr>
<?php
include_once('../include/conn.php');
$ob = new Connect();
    $a = $ob->select_data2("SELECT `id`, `fullname`, `college_uni`, `Mo`, `Email`, `department`, `file_name`, `img_url` FROM `dropbox_img` WHERE 1 ORDER BY id DESC");
    if ($a->num_rows > 0) {
        $i=1;
        while($row = $a->fetch_array()) {
            echo "<tr>
            <td>$i.</td>
            <td>".$row[1]."</td>
            <td>".$row[2]."</td>
            <td>".$row[5]."</td>
            <td>".$row[3]."</td>
            <td>".$row[4]."</td>
            
            <td style='text-align:center'><a target='_blank' href='http://www.ourudaan.com/dropbox/".$row[7]."' download class='btn-info btn' >Download<a/>
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