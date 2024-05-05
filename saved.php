<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reddit</title>
    <link rel="icon" type="image/x-icon" href="img/redditFavicon.png">
    <link rel="stylesheet" href="hw1.css"><link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="saved.js" defer></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

</head>
<body>
    <header class="flex flex-start">
        <div class = "flex" id="logo">
            <div id = "navbar-menu" data-click="0"></div>
            <div id = "navbar-logo"></div>
            <div id = "navbar-reddit"></div>
        </div>
        <!-- <div class="flex flex-center" id="search">

            <input class="flex flex-start" type="text" id="searchbar" src="img/lente.png" placeholder="Search Reddit">
            </input>
        </div> -->
        <div class="flex" id="setting">
            <div class="flex flex-center" id = "qr">
                <div class="image"></div>
                <div class="item">Get app</div>
            </div>
            
            <div class="menu flex flex-center">
                <div class="item flex flex-center">
                    ...
                </div>
            </div>
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
                <div class="item-nav flex" data-navtype="recent" data-click="0">
                    <div class="flex">RECENT</div>
                    <div class="flex door">V</div>
                </div>
                <div class="item-nav" data-recent="1">
                    
                </div>
                <div class="item-nav" data-recent="1">
                </div>
                <div class="item-nav" data-recent="1">
                </div>
                <hr class="border-neutral-weak">
                <div class="item-nav flex" data-navtype="topics" data-click="0">
                    <div class="flex">TOPICS</div>
                    <div class="flex door">V</div>
                </div>
                <hr class="border-neutral-weak">
                <a href="#">
                    <div class="item-nav flex" data-navtype="resources" data-click="0">
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
                            
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>
</html>