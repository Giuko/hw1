<?php
    session_start();
    if(isset($_SESSION['username'])){
        $conn = mysqli_connect('localhost', 'root', '','homeworkWP');
        // Io utente posso cancellare solo i miei commenti
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $username =  mysqli_real_escape_string($conn, $_SESSION['username']);

        // Ottengo id account
        $query = "SELECT * FROM `accounts` WHERE username = '$username'";
        $res = mysqli_query($conn, $query);
        $res = mysqli_fetch_assoc($res);
        $account_id = $res['id'];

        $query = "DELETE FROM `comments` WHERE id = $id AND account_id = $account_id";
        
        mysqli_query($conn, $query);
    }
?>