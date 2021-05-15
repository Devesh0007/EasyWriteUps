<option value="">Select</option>
<?php
    include_once('../include/conn.php');
    $ob = new Connect();
    $sql ="SELECT `sid`, `sname`, `year` FROM `team_session` order by sid";
    $res = $ob->select_data2($sql);
    if($res->num_rows>0){
        while($row = $res->fetch_array()){
            echo "<option value='$row[0]'>Season $row[1]</option>";
        }
    }
?>