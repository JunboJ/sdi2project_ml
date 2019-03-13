<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css" type="text/css"/>
    <link href="//amp.azure.net/libs/amp/2.2.4/skins/amp-default/azuremediaplayer.min.css" rel="stylesheet">

</head>
<body id="body">
    <div class="row">
        <div data-target=".navbar">
                    <nav class="navbar navbar-inverse navbar-fixed-top">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>  
                                    <span class="icon-bar"></span>  
                                    <span class="icon-bar"></span>  
                                    <span class="icon-bar"></span>                        
                                </button>
                            <a class="navbar-brand" href="#"><img id="logo_pic" src="img/logomovielover.png"></a>
                            </div>
                            <div>
                                <div class="collapse navbar-collapse" id="myNavbar">
                                    <ul class="nav navbar-nav">
                                    <li><a href="#section1">Home</a></li>
                                    <li><a href="moviedetails.html">Movies</a></li>
                                    <li><a href="#section3">News</a></li>
                                    <li><a href="#section4">Contact Us</a></li>
                                    <li><a href="registerpage.html" target="_blank">Login/Register</a></li></ul>
                                        <div class="search-container">
                                        <form action="/action_page.php" id="searchbox">
                                        <input type="text" placeholder="Search.." name="search">
                                        <button type="submit"><img src="img/magnify.png" width=20px></i></button>
                                        </form></div>                  
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
        </div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
    <?php
        session_start();

        $_SESSION['movieID'] = 4;
        $_SESSION['userID'] = 1;
        $movieID = $_SESSION['movieID'];
        $userID = $_SESSION['userID'];
        $myJSON = json_encode($movieID);
        include 'connection.php';
        
        $sql = "SELECT title, poster, releasedate, description FROM movies WHERE movieID = $movieID";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        
    ?>


    
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
    <div class="row">
        <div class="col-xm-2 col-sm-2 col-md-2 col-lg-2"></div>
        <div class="col-xm-8 col-sm-8 col-md-8】 col-lg-8">
            <div id="movietitle" class="row">
            <h1 id="movieTitle"><?php echo $row[0]?></h1>
            </div>
            <div id="trailer" class="row">
            <!-- <video id="azuremediaplayer" class="azuremediaplayer amp-default-skin amp-big-play-centered" tabindex="0"></video> -->
                <video id="video" controls autoplay>
                    <source src="../video/forwebsite.mp4" type="video/mp4">
                </video>
            </div>
            <div id="poster_synopsis" class="row">
                <div id="postercol" class="col-xm-3 col-sm-3 col-md-3 col-lg-3">
                    <?php 
                    $imgpath = 'img/';
                        echo '<img src='.$imgpath.$row[1].' style = "width:100%; max-width:260px; height:auto"> <br>';
                        echo "<h3>".$row[2]."</h3>";
                    ?>
                <button class="btn btn-default" onclick="addtoList(<?php echo $movieID?>,<?php echo $userID ?>)"><p id="btn_content">click</p></button>
                </div>
                <div class="col-xm-9 col-sm-9 col-md-9 col-lg-9">

                    <h2>Synopsis</h2>
                    <?php 
                        echo "<p>".$row[3]."<p>";
                    ?>
                </div>
            </div>
            <hr>
            <div class="news" class="row">
                <h2>News</h2>
                <ul>
                    <li><a>asdf</a></li>
                    <li><a>asdf</a></li>
                </ul>
            </div>
        </div>
        <div class="col-xm-2 col-sm-2 col-md-2 col-lg-2"></div>
    </div>
    <footer id="footer" class="">
            <div class="container">
                <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <br>
            <p>Copyright © 2019 Movie Lover, All Rights Reserved </p></div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <br>  
            <img src="img/socialmedia.png" width="100px">
            </div>
    </footer>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="//amp.azure.net/libs/amp/2.2.4/azuremediaplayer.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>


</body>
</html>