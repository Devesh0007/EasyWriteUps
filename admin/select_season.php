<?php
    include_once('../include/conn.php');
    $ob = new Connect();
    $sql ="SELECT `sname`, `year` FROM `team_session`";
    $res = $ob->select_data2($sql);
    if($res->num_rows>0){
        $i=1;
        while($row = $res->fetch_array()){
            echo "<tr>
                <td>$i.</td>
                <td>Season $row[0]</td>
                <td>$row[1]</td>
            </tr>";
            $i++;
        }
    }
?>