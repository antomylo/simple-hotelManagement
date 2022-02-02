<?php
  function getCSS() {
    if ((!isset($_COOKIE['css'])))
       $css='style.css';
    else
      $css= $_COOKIE['css']  ;
    return $css;
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
    <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link href="<?php echo getCSS(); ?>" rel="stylesheet" type="text/css" />
    <title>WEB HOTELS | List your Hotel rooms on WebHotels.com</title>
</head>

<body>
    <header>
        <div class="header">
            <div class="container">
                <div class="navbar" id="navbar">
                    <div class="logo">
                        <h1>WebHotels</h1>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="projectIndex.php" target="_blank">HOME</a></li>
                            Already a Partner;
                            <li><a type="button" class="button" href="login.php" target="_blank">Login</a></li>
                            <li><a href="contact_us.php" target="_blank">CONTACT US</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="row">
                    <div class="col-2">
                        <span class="text1">List your vacation home on WebHotels.com</span>
                        <span class="text2">Registration can take as little as 15 minutes to complete – get started today</span>
                    </div>
                    <div class="col-2">
                        <div class="borderbox">
                            <h2>Create new listing</h2><br>
                            <h4><i class="fa fa-check" aria-hidden="true"></i> It's free to create a listing</h4>
                            <h4><i class="fa fa-check" aria-hidden="true"></i> 24/7 support by phone or email</h4>
                            <h4><i class="fa fa-check" aria-hidden="true"></i> Set your own house rules for guests</h4>
                            <h4><i class="fa fa-check" aria-hidden="true"></i> Sync your calendar with other sites you list on</h4><br>
                            <h4>Create a partner account to get started:</h4>
                            <a type="button" class="button" href="register.php" target="_blank">Get Started&#8594;</a><br><br>
                            <h5>By continuing, you agree to let Booking.com email you regarding your property registration.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>

    <main>
        <div class="offer">
            <div class="small-container">
                <div class="row">
                    <div class="col-2">
                        <img src="Images/homeImage.svg" class="offer-img" alt="">
                    </div>
                    <div class="col-2">

                        <h1><strong>Your peace of mind is our top priority</strong></h1><br>
                        <h2>Here’s how we’re helping you feel confident welcoming guests:</h2><br>
                        <h3><i class="fa fa-check-square-o" aria-hidden="true"></i> Set <strong>house rules</strong> guest must agree to before they stay</h3><br>
                        <h3><i class="fa fa-check-square-o" aria-hidden="true"></i> Request damage deposits for extra security</h3><br>
                        <h3><i class="fa fa-check-square-o" aria-hidden="true"></i> Report guest misconduct if something goes wrong</h3><br>
                        <h3><i class="fa fa-check-square-o" aria-hidden="true"></i> Access 24/7 support in 43+ languages.</h3>


                    </div>
                </div>
            </div>
        </div>
        <div class="comments">
            <div class="small-container">
                <div class="row">
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <small>One of the most well organized booking apps!!I totally suggest it!</small>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <img src="Images/user3.png" alt="">
                        <h3>Matt Damon</h3>
                    </div>
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <small>I'm a fan of WebHotels.com!Makes your business more comfortable than ever!!</small>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <img src="Images/user2.png" alt="">
                        <h3>Brad Pitt</h3>
                    </div>
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <small>If you're are looking for a booking app,you are very lucky here. </small>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <img src="Images/user1.png" alt="">
                        <h3>Jackie Chan</h3>
                    </div>

                </div>
            </div>
        </div>
        <br><br><br><br>
        <div class="offer">
            <div class="small-container">
                <div class="row">
                    <div class="col-2">
                        <h1>Get to know your quests</h3><br>
                            <h2>No matter where they’re from, our guests share a few similarities.</h2><br><br>
                            <h3><i class="fa fa-check-circle" aria-hidden="true"></i> 75% of nights booked are by guests with 5 or more previous bookings</h3><br>
                            <h3><i class="fa fa-check-circle" aria-hidden="true"></i> 68% of nights booked are by families and couples</h3><br>
                            <h3><i class="fa fa-check-circle" aria-hidden="true"></i> 68% of nights booked are by families and couples</h3><br>

                    </div>
                    <div class="col-2">
                        <img src="Images/indexImage2.svg" class="offer-img" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="logos">
            <div class="small-container">
                <div class="row">
                    <div class="col-5">
                        <a href="" target=""><img src="Images/instagram.png" alt="">
                    </div>
                    <div class="col-5">
                        <a href="" target=""></a><img src="Images/twitter.png" alt="">
                    </div>
                    <div class="col-5">
                        <a href="" target=""><img src="Images/facebook.png" alt=""></a>
                    </div>
                    <div class="col-5">
                        <a href="" target=""><img src="Images/youtube.png" alt=""></a>
                    </div>


                </div>
            </div>
        </div>
        <div id="container_ch_css">
            <h2 class="center">CHOOSE YOUR LAYOUT AND SAVE IT WITH COOKIES</h2>
            <p class="center">
            <?php
            if (!isset($_COOKIE['css'])) {
              echo 'Current Choice: default';
            } else {
              echo 'Current Choice: '.getCSS();
            }  
            ?>
            </p>
            <p class="center">
            [<a href="store_css.php?style=1">CSS1</a>] - 
            [<a href="store_css.php?style=2">CSS2</a>] -
            [<a href="clear_cookie.php">Clear Cookie</a>]
            </p>
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