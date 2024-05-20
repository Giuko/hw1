<?php
        $conn = mysqli_connect('localhost', 'root', '','test') or die("Connect failed: " . mysqli_connect_error());

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

?>