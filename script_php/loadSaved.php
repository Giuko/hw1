<?php
    session_start();
    if($_SESSION['username']){
        $username = $_SESSION['username'];
        $conn = mysqli_connect('localhost', 'root', '','test') or die("Connect failed: " . mysqli_connect_error()); 
        $query = "SELECT * FROM Saved WHERE Username = '$username'";
        $result = mysqli_query($conn, $query);

        // Creazione di un array per memorizzare i risultati della query
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        // Chiusura della connessione al database
        mysqli_close($conn);

        // Converte l'array in formato JSON
        $json_output = json_encode($rows);

        // Restituisce il JSON
        echo $json_output;
    }
    exit;
?>