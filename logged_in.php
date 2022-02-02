<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <link rel="shortcut icon" href="Images/favicon.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Attract more guests to your  hotel No sign up fees,plus daily assistance for you and your guests. Whether big or small, an individual or a professional, start earning more with the largest online travel company in the world!">
    <meta name="keywords" content="Reservation, List, Booking, Guest, Revenue, Partner, Advertise, Online">
    <meta name="msapplication-config" content="none">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300;600&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>HOTEL SPECIFICATION | WebHotels</title>
</head>
<body>
<header>
    <div class="Header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <h1>WebHotels</h1>
                </div>
                <nav>
                    <ul id="menu">
                        <li><a href="projectIndex.php">HOME</a></li>
                        <li><a href="contact_us.php">CONTACT US</a></li>
                        <li><a href="logout.php">LOGOUT</a></li>
                    </ul>
                    <div class="user_tracking">Hi, <?php echo htmlspecialchars($_SESSION["username"]); ?></div>
                </nav>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="body">
        <div class="body-image">
            <img src="Images/world-map.png" alt="world map">
        </div>
        <div class="row">
            <div class="col-3" id="choice1">
                <span>INSERT HOTEL'S SPECS</span>
                <a href="hotelmanagement.php"><img src="Images/loggedin2.jpg" alt=""></a>
            </div>
            <div class="col-3" id="choice2">
               <span>UPLOAD HOTEL'S PHOTOS</span>
               <a href="upload.php"><img src="Images/loggedin1.png" alt=""></a>
            </div>
        </div>
    </div>
</main>
<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and IOS mobile phone.</p>
                    <div class="app-logo">
                        <img src="Images/play-store.png" alt="">
                        <img src="Images/app-store.png" alt="">
                    </div>
                </div>
                <div class="footer-col-2">
                    <h1>WebHotels</h1>
                    <p>Our Purpose Is To Make Hotel Booking Accessible to the Many.</p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>


            </div>
            <hr>
            <p class="copyright">&copy; WebHotels 2021 | All Rights Reserved.</p>
        </div>
    </div>

</footer>

</body>

</html>
