<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $conn = mysqli_connect('localhost', 'root', '','test') or die("Connect failed: " . mysqli_connect_error()); 
        if(isset($_POST['username']) && isset($_POST['password'])){
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

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
                $query = "SELECT password FROM accounts WHERE username = '$username'";
                $res = mysqli_query($conn, $query);

                if(!$res){
                    echo "Query failed: " . mysqli_error($conn); 
                }else{
                    $row = mysqli_fetch_assoc($res);
                    if($row){
                        $password_from_database = $row['password'];
                        if(password_verify($password, $password_from_database)){
                            $_SESSION['username'] = $username;
                            echo '1';
                            mysqli_close($conn);
                            exit;
                        }
                    }
                    
                }
            }
        }
    }
    echo 0;
?>