<?php
    $conn = mysqli_connect('localhost', 'root', '','homeworkWP') or die("Connect failed: " . mysqli_connect_error()); 
    $query = "SELECT Username FROM accounts WHERE 1";                
    $res = mysqli_query($conn, $query);
    $data = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
    mysqli_close($conn);
    $json = json_encode($data);
    echo $json;
?>