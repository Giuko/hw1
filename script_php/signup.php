<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $conn = mysqli_connect('localhost', 'root', '','test') or die("Connect failed: " . mysqli_connect_error()); 
    
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email'])){
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $surname = mysqli_real_escape_string($conn, $_POST['surname']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            // Il nome utente già esiste
            $query = "SELECT password FROM `accounts` WHERE username = '$username'";
            $res = mysqli_query($conn, $query);
            if($res->num_rows !== 0){
                exit;
            }


            //preg_match per fare una ricerca di una espressione regolare
            // '/' indica inizio e fine dell'espressione regolare
            $cond_number = preg_match('/\d/', $password);       // '\d' indica carattere numerico
            // \w indica un qualsiasi carattere alfanumerico, \s indica uno spazio bianco
            // Con ^ davanti all'espressioni indichiamo qualsiasi carattere che non fa parte ovvero i simboli
            $cond_symbol = preg_match('/[^\w\s]/', $password);  
            $cond_capital = preg_match('/[A-Z]/', $password);   // '[A-Z]' corrisponde ad una qualsiasi maiuscola
            $cond_length = (strlen($password) >= 8);

            $cond = $cond_number & $cond_symbol & $cond_capital & $cond_length;
            if($cond == 1){

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO `accounts` VALUES ('$username', '$email', '$name', '$surname', '$hashed_password')";
                mysqli_query($conn, $query);
                $_SESSION['username'] = $username;
            }
        }
    
        mysqli_close($conn);
    }
?>