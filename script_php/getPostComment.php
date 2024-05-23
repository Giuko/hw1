<?php
    $json = 0;
        
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $conn = mysqli_connect('localhost', 'root', '','test') or die("Connect failed: " . mysqli_connect_error());
        $query = "SELECT * FROM `comments` WHERE post_id = '$id' GROUP BY post_date, id ORDER BY post_date DESC";
        $res = mysqli_query($conn, $query);

        $rows = array();
        if($res->num_rows !== 0){
            while($row = mysqli_fetch_assoc($res)){
                $rows[] = $row;
            }
            $json = json_encode($rows);
            mysqli_close($conn);
        }
    }
    echo $json;