   <table class="table-bordered table-responsive table">
    <tr>
        <th>S. No.</th>
        <th>Notifications</th>
        <th></th>
    </tr>
<?php
include_once('../include/conn.php');
$ob = new Connect();
    $a = $ob->select_data2("SELECT * FROM notify ORDER BY nid DESC");
    if ($a->num_rows > 0) {
        $i=1;
        while($row = $a->fetch_array()) {
            echo "<tr>
            <td>$i.</td>
            <td>".$row[1]."</td>
            <td style='text-align:center'><button onclick ='notiDel(".$row[0].")' class='btn-danger btn' >Delete</button>
            </tr>";
            $i++;
        }
    }else{
        echo"<tr><td colspan='2' style='text-align:center'>No notifications found</td></tr>";
    }
       /*<td style='text-align:center'><input type='button' onclick=delPost($row[0]) value='Delete' class='btn-danger btn' />
            </td>*/
?>
</table>