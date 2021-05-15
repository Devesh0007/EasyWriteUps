<?php
    include_once('../include/conn.php');
    $ob = new Connect();
    $sql ="SELECT `bname` FROM `team_board`";
    $res = $ob->select_data2($sql);
    if($res->num_rows>0){
        $i=1;
        while($row = $res->fetch_array()){
            echo "<tr>
                <td>$i.</td>
                <td>$row[0]</td>
            </tr>";
            $i++;
        }
    }
?>