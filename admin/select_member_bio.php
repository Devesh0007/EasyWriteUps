<option value="">Select</option>
<?php
    include_once('../include/conn.php');
    $ob = new Connect();
    $sid = $_POST['sid'];
    $bid = $_POST['bid'];
    $sql ="SELECT `tid`, `member` FROM `team` WHERE sid = '$sid' and bid='$bid' and type !='Teacher Coordinator'";
    $res = $ob->select_data2($sql);
    if($res->num_rows>0){
        while($row = $res->fetch_array()){
            echo "<option value='$row[0]'>$row[1]</option>";
        }
    }else{
        echo "no data found!";
    }
?>