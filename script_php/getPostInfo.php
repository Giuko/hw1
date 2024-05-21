<?php
    $json = 0;
        
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $conn = mysqli_connect('localhost', 'root', '','test') or die("Connect failed: " . mysqli_connect_error());
        $query = "SELECT * FROM `posts` WHERE id = '$id'";
        $res = mysqli_query($conn, $query);
        if($res->num_rows !== 0){
            $row = mysqli_fetch_assoc($res);
            $json = json_encode($row);
        }
        mysqli_close($conn);
    }
    echo $json;