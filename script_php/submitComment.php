<?php
    session_start();
    if(isset($_SESSION['username'])){
        $conn = mysqli_connect('localhost', 'root', '','test') or die("Connect failed: " . mysqli_connect_error());
        $username = mysqli_real_escape_string($conn, $_SESSION['username']);
        $post_id = mysqli_real_escape_string($conn, $_POST['postId']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);
        $query = "INSERT INTO `comments` ( `content`, `post_id`, `username`) VALUES ('$content', '$post_id', '$username');";
        $res = mysqli_query($conn, $query);
        mysqli_close($conn);
    }