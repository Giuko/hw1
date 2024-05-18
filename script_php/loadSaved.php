<?php
    session_start();
    if($_SESSION['username']){
        $username = $_SESSION['username'];
        $conn = mysqli_connect('localhost', 'root', '','test') or die("Connect failed: " . mysqli_connect_error()); 
        // Estraggo gli id di tutti i post salvati dall'utente
        $query = "SELECT * FROM Saved WHERE Username = '$username'";
        $res = mysqli_query($conn, $query);
        $ids = array();
        while($id = mysqli_fetch_assoc($res)){
            $ids[] = $id['id'];
        }
        // Ho gli ID

        $rows = array();
        foreach($ids as $id){
            $query = "SELECT * FROM `posts` WHERE id = '$id'";
            $result = mysqli_query($conn, $query);
            $rows[] = mysqli_fetch_assoc($result);            
        }
        /*
        // Estraggo gli id di tutti i post salvati dall'utente
        $query = "SELECT * FROM Saved WHERE Username = '$username'";
        $result = mysqli_query($conn, $query);
        $ids = array();
        while($id = mysql)
        // Estraggo tutte le informazioni dei post con quell'id
        $query = "SELECT * FROM Saved WHERE Username = '$username'";
        $result = mysqli_query($conn, $query);



        // Creazione di un array per memorizzare i risultati della query
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        */
        // Chiusura della connessione al database
        mysqli_close($conn);

        // Converte l'array in formato JSON
        $json_output = json_encode($rows);

        // Restituisce il JSON
        echo $json_output;
    }
    exit;
?>