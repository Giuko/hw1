<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $conn = mysqli_connect('localhost', 'root', '','test') or die("Connect failed: " . mysqli_connect_error()); 
    
        if(isset($_GET['username']) && isset($_GET['password'])){
            $azione = $_GET['azione'];
            $username = mysqli_real_escape_string($conn, $_GET['username']);
            $password = mysqli_real_escape_string($conn, $_GET['password']);

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

                switch ($azione) {
                    case 'Sign Up':
                        $query = "INSERT INTO `test` VALUES ('$username','$password')";
                        mysqli_query($conn, $query);
                        $_SESSION['username'] = $username;
                        break;

                    case 'Log In':
                        $query = "SELECT * FROM `test` WHERE Username = '$username' AND Password = '$password'";
                        $res = mysqli_query($conn, $query);
                        $num = mysqli_num_rows($res);
                        if($num != 0){
                            $_SESSION['username'] = $username;
                        }
                        break;
                    default:
                        break;
                }
            }
        }
    }
?>