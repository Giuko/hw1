<?php
    session_start();
    if(isset($_SESSION['username'])){
        $conn = mysqli_connect('localhost', 'root', '','homeworkWP') or die("Connect failed: " . mysqli_connect_error());
        $username = mysqli_real_escape_string($conn, $_SESSION['username']);
        $post_id = mysqli_real_escape_string($conn, $_POST['postId']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);

        // Ottengo l'id dell'utente 
        $query = "SELECT * FROM `accounts` WHERE username = '$username'";
        $res = mysqli_query($conn, $query);
        $account_id = mysqli_fetch_assoc($res)['id'];

        // Ottengo l'id del post
        $query = "SELECT * FROM `posts` WHERE id = '$post_id'";
        $res = mysqli_query($conn, $query);
        $post_id = mysqli_fetch_assoc($res)['numeric_id'];

        
        $query = "INSERT INTO `comments` (`content`, `post_id`, `account_id`) VALUES ('$content', $post_id, $account_id)";
        $res = mysqli_query($conn, $query);
        mysqli_close($conn);
    }