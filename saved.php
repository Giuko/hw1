<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reddit</title>
    <link rel="icon" type="image/x-icon" href="style/img/redditFavicon.png">
    <link rel="stylesheet" href="style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <?php
        if(isset($_SESSION['username'])){
            echo "<script src='script_js/saved.js' defer></script>";
        }
    ?>
    <script src='script_js/login.js' defer></script>
    <script src='script_js/utils.js' defer></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

</head>
<body>
    <!-- <form action="" method="post" name="login"> -->
        <section id='modal-view' class='hidden'>
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

            <!-- <input class="flex flex-start" type="text" id="searchbar" src="img/lente.png" placeholder="Search Reddit">
            </input> -->
        </div>
        
        <div class="flex space-around" id="setting">
            <!-- <div class="flex flex-center" id = "qr">
                <div class="image"></div>
                <div class="item">Get app</div>
            </div> -->
                    
            <?php
                if(isset($_SESSION['username'])){
                    echo '<div class="flex flex-center" id="logout" data-action="logout">';
                    echo    '<div class="item">Log out</div>';
                    echo '</div>';

                    echo '<div class="hidden flex-center" id="login" data-action="login"> ';
                    echo    '<div class="item">Log In</div>';
                    echo '</div>';
                }else{
                    echo '<div class="hidden flex-center" id="logout" data-action="logout">';
                    echo    '<div class="item">Log out</div>';
                    echo '</div>';

                    echo '<div class="flex flex-center" id="login" data-action="login">';
                    echo    '<div class="item">Log In</div>';
                    echo '</div>';
                }
            ?>

            <!-- <div class="menu flex flex-center">
                <div class="item flex flex-center">
                    ...
                </div>
            </div> -->
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
                <a href="#">
                    <div class="item-nav flex active" data-navtype="resources" data-click="0">
                        <div class="flex">SAVED</div>
                    </div>
                </a>
            </div> 
        </nav>
        <div class="container flex flex-center">
            <div class="subcontainer">    
                <div class="flex" id="main">
                    <section id="main-content">
                        <div class="top flex flex-start">
                            <div class="button flex flex-center">Hot</div>
                            <div class="button flex flex-center">Italy</div>
                            <div class="button flex flex-center">M</div>
                        </div>
                        <div class="flex" id="feed">

                            <?php
                                if(!isset($_SESSION['username'])){
                                    echo "<h1 class='errore'>Fare accesso oppure registrarsi</h1>";
                                }
                            ?>
                            
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>
</html>