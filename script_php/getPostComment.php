<?php

    $json = 0;
        
    if(isset($_GET['id'])){
        $post_id = $_GET['id'];

        $conn = mysqli_connect('localhost', 'root', '','homeworkWP') or die("Connect failed: " . mysqli_connect_error());

        // Ottengo l'id del post
        $query = "SELECT * FROM `posts` WHERE id = '$post_id'";
        $res = mysqli_query($conn, $query);
        $post_id_numeric = mysqli_fetch_assoc($res)['numeric_id'];

        // Ottengo le informazioni di tutti i commenti del post
        $query = "SELECT * FROM `comments` WHERE post_id = '$post_id_numeric' GROUP BY post_date, post_id ORDER BY post_date DESC";
        $res = mysqli_query($conn, $query);

        $rows = array();
        if($res->num_rows !== 0){
            while($row = mysqli_fetch_assoc($res)){
                $content = $row['content'];
                $post_date = $row['post_date'];
                $comment_id = $row['id'];
                // Devo ottenere lo username
                $account_id = $row['account_id'];
                $query = "SELECT * FROM `accounts` WHERE id = $account_id";
                $resAccount = mysqli_query($conn, $query);
                $resAccount = mysqli_fetch_assoc($resAccount);
                $username = $resAccount['username'];

                
                $row = ["content" => $content, "username" => $username, "post_date" => $post_date, "id" => $comment_id];

                $rows[] = $row;
            }
            $json = json_encode($rows);
            mysqli_close($conn);
        }

    }
    echo $json;