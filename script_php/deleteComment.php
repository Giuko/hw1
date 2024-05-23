<?php
    session_start();
    if(isset($_SESSION['username'])){
        $conn = mysqli_connect('localhost', 'root', '','test');
        // Io utente posso cancellare solo i miei commenti
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $username =  mysqli_real_escape_string($conn, $_SESSION['username']);

        $query = "DELETE FROM `comments` WHERE id = '$id' AND username = '$username'";
        
        mysqli_query($conn, $query);
    }
?>