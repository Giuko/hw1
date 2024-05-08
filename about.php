<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $conn = mysqli_connect('localhost', 'root', '','test') or die("Connect failed: " . mysqli_connect_error()); 
    
        if(isset($_POST['username']) && isset($_POST['password'])){
            $azione = $_POST['azione'];
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
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
                    if($num == 0){
                        $notFound = 1;
                    }else{
                        $_SESSION['username'] = $username;
                    }
                    break;
                default:
                    break;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reddit</title>
    <link rel="icon" type="image/x-icon" href="img/redditFavicon.png">
    <link rel="stylesheet" href="hw1.css">
    <link rel="stylesheet" href="about.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src='utils.js' defer></script>
    <script src='login.js' defer></script>
    <script src='about.js' defer></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

</head>
<body>
   <?php
        $subreddit = $_GET['subreddit'];
        echo "<div class='hidden' id='subredditInfo' data-info='$subreddit'></div>";
    ?>
    <!-- <form action="" method="post" name="login"> -->
        <?php
            if(isset($notFound)){
                echo "<section id='modal-view' class='flex'>";
            }else{
                echo "<section id='modal-view' class='hidden'>";
            }
        ?>
            <div id="loginForm" class="flex flex-column align-center">
                <div class="login_top flex flex-end align-center"> <button id="closeLogin">X</button> </div>

            <form action="" method="post" name="login">
                <div class="login_main">
                    <h1>Log In</h1>
                    <p>By continuing, you agree to our User Agreement and acknowledge that you understand the Privacy Policy.</p>
                    <?php
                        if(isset($notFound)){
                            echo "<p class='errore' id='errore_credenziali'>La password non corrisponde</p>";
                        }
                    ?>
                    <p class='hidden' id='errore_credenziali'></p>
                    <div>
                        <div class="loginInput">
                            <p>Username</p>
                            <input type="text" name="username">
                        </div>
                        <div class="loginInput">
                            <p>Password</p>
                            <input type="password" name="password">
                        </div>
                    </div>
                    <div class="signup flex align-center">
                        New? <input type="submit" name="azione" value="Sign Up">
                    </div>
                </div>
                <div class="login_bottom flex flex-center align-center"> <input type="submit" name="azione" value="Log In"></div>
            </form>
            </div>
        </section>
    <!-- </form> -->
    <header class="flex flex-start">
        <div class = "flex" id="logo">
            <div id = "navbar-menu" data-click="0"></div>
            <div id = "navbar-logo"></div>
            <div id = "navbar-reddit"></div>
        </div>
            <div class="flex flex-center" id="search">
        </div>
        
        <div class="flex space-around" id="setting">
            
            
            <?php
                if(isset($_SESSION['username'])){
                    echo '<div class="flex flex-center" id="logout">';
                    echo '<div class="item">Log out</div>';
                    echo '</div>';
                }else{
                    echo '<div class="flex flex-center" id="login">';
                    echo '<div  class="item">Log In</div>';
                    echo '</div>';
                }
            ?>
            
        </div>
    </header>
    <div class="main-container">
        <nav class="flex flex-center">
            <div class="subnav flex flex-start">
                <a href="hw1.php">    
                    <div class="flex flex-start" id="popular">
                        <div class="image"></div>
                        <div class="item">Popular</div>
                    </div>
                </a>
                
                <hr class="border-neutral-weak">
                <a href="saved.php">
                    <div class="item-nav flex" data-navtype="resources" data-click="0">
                        <div class="flex">SAVED</div>
                    </div>
                </a>
            </div> 
        </nav>
        <div class="container flex flex-center">
            <div class="subcontainer">    
                <div class="flex flex-center flex-column" id="main">
                    <div class='flex flex-column'>
                        <div id='banner'></div>
                        <div class='flex'>
                            <div id='icon'></div>
                            <div id='textAbout'><?php echo $subreddit ?></div>
                        </div>
                    </div>
                    <div class='flex flex-column' id='about'>
                        <h2 class='prefix'>ABOUT COMMUNITY</h2>
                        <h2 class='title'></h2>
                        <p id='descr'></p>
                        <hr class="border-neutral-weak">
                        <p id='descr2'></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>