<?php
    $conn = mysqli_connect('localhost', 'root', '','homeworkWP') or die("Connect failed: " . mysqli_connect_error()); 

    $username = mysqli_real_escape_string($conn, $_GET['username']);
    $password = mysqli_real_escape_string($conn, $_GET['password']);

    // $query = "SELECT password FROM `accounts` WHERE username = '". $username ."'";
    $query = "SELECT password FROM `accounts` WHERE username = '$username'";

    $res = mysqli_query($conn, $query);
    
    if($res){
        $row = mysqli_fetch_assoc($res);
        if($row){
            $password_from_database = $row['password'];
            exit;
            if(password_verify($password, $password_from_database)){
                echo '1';
            }else{
                echo '0';
            }
        }
    }
    
    mysqli_close($conn);
?>