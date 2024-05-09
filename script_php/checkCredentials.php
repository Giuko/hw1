<?php
    $conn = mysqli_connect('localhost', 'root', '','test') or die("Connect failed: " . mysqli_connect_error()); 

    $username = $_GET['username'];
    $password = $_GET['password'];

    $query = "SELECT * FROM `test` WHERE Username = '$username' AND Password = '$password'";

    $res = mysqli_query($conn, $query);
    $num = mysqli_num_rows($res);
    echo "$num";
?>