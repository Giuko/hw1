<?php
    session_start();
    if(isset($_SESSION['username'])){
        $conn = mysqli_connect('localhost', 'root', '','homeworkWP') or die("Connect failed: " . mysqli_connect_error());
        
        $username = $_SESSION['username'];

        $id = $_POST['id'];

        if(isset($_POST['title'])){
            $title = $_POST['title'];
        }else{
            $title='';
        }
        $title = mysqli_real_escape_string($conn, $title);

        if(isset($_POST['icon'])){
            $icon = $_POST['icon'];
        }else{
            $icon='';
        }
        $icon = mysqli_real_escape_string($conn, $icon);

        if(isset($_POST['name'])){
            $name = $_POST['name'];
        }else{
            $name='';
        }
        $name = mysqli_real_escape_string($conn, $name);

        if(isset($_POST['descr'])){
            $descr = $_POST['descr'];
        }else{
            $descr='';
        }
        $descr = mysqli_real_escape_string($conn, $descr);

        if(isset($_POST['img'])){
            $img = $_POST['img'];
        }else{
            $img='';
        }
        $img = mysqli_real_escape_string($conn, $img);

        // Controllo se il post è già presente
        $query = "SELECT * FROM `posts` WHERE id = '$id'";
        $res = mysqli_query($conn, $query);
        
        if($res->num_rows == 0){
            // Se non è presente memorizzo il post
            $query = "INSERT INTO `posts` VALUES ('$id', '$title', '$icon', '$name', '$descr', '$img')";
            $result = mysqli_query($conn, $query);
        }
        
        // Aggiungo la relazione N-N

        // Estraggo l'id numerico dal post
        $query = "SELECT * FROM `posts` WHERE id='$id'";
        $res = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($res);
        $post_id = $row['numeric_id'];

        // Estraggo l'id dall'account
        $query = "SELECT * FROM `accounts` WHERE username='$username'";
        $res = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($res);
        $account_id = $row['id'];


        $query = "INSERT INTO `saved` (`post_id`, `account_id`) VALUES('$post_id', '$account_id')";
        $result = mysqli_query($conn, $query);
        
        mysqli_close($conn);
    }
    exit;
?>