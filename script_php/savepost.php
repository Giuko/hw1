<?php
    session_start();
    if(isset($_SESSION['username'])){
        $conn = mysqli_connect('localhost', 'root', '','test') or die("Connect failed: " . mysqli_connect_error()); 
        $data = json_decode(file_get_contents("php://input"), true);
        $username = $_SESSION['username'];

        $id = $data['id'];

        if(isset($data['title'])){
            $title = $data['title'];
        }else{
            $title='';
        }
        $title = mysqli_real_escape_string($conn, $title);

        if(isset($data['icon'])){
            $icon = $data['icon'];
        }else{
            $icon='';
        }
        $icon = mysqli_real_escape_string($conn, $icon);

        if(isset($data['name'])){
            $name = $data['name'];
        }else{
            $name='';
        }
        $name = mysqli_real_escape_string($conn, $name);

        if(isset($data['descr'])){
            $descr = $data['descr'];
        }else{
            $descr='';
        }
        $descr = mysqli_real_escape_string($conn, $descr);

        if(isset($data['img'])){
            $img = $data['img'];
        }else{
            $img='';
        }
        $img = mysqli_real_escape_string($conn, $img);

        $query = "INSERT INTO `Saved` VALUES ('$id', '$username', '$title', '$icon', '$name', '$descr', '$img')";
        
        $result = mysqli_query($conn, $query) or die("Query failed: " . mysqli_error($conn));
        if(!$result) {
            die("Errore nella query: " . mysqli_error($conn));
        }
        mysqli_close($conn);
    }
    exit;
?>