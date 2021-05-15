<option value="">Select</option>
<?php
    include_once('../include/conn.php');
    $ob = new Connect();
    $sql ="SELECT `bid`,`bname` FROM `team_board`";
    $res = $ob->select_data2($sql);
    if($res->num_rows>0){
        while($row = $res->fetch_array()){
            echo "<option value='$row[0]'>$row[1]</option>";
        }
    }
?>