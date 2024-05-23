<?php
    session_start();
    if($_POST['username'] === $_SESSION['username']){
        echo 1;
        exit;
    }
    echo 0;