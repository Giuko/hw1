<?php
    session_start();
    if(isset($_SESSION['username'])){
        $conn = mysqli_connect('localhost', 'root', '','test') or die("Connect failed: " . mysqli_connect_error()); 
        $data = json_decode(file_get_contents("php://input"), true);
        $username = $_SESSION['username'];

        $id = $data['id'];

        $query = "DELETE FROM `Saved` WHERE Id = '$id' AND Username = '$username'";
        
        $result = mysqli_query($conn, $query) or die("Query failed: " . mysqli_error($conn));
        if(!$result) {
            die("Errore nella query: " . mysqli_error($conn));
        }
        mysqli_close($conn);
        $idJson = json_encode($id);
    }
    exit;
?>