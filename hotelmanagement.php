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
    <title>Hotel's Specifications | WebHotels</title>
    <script type="text/javascript">
        function validate_form() {
            var result = true;

            var title = document.getElementById("title").value;
            var address= document.getElementById("address").value;
            var phonenumber = document.getElementById("phonenumber").value;
            var rooms = document.getElementById("rooms").value;
            var district = document.forms["regBox"]["district"].value;
            var coordinates = document.getElementById("coordinates").checked;
            
            if (validate_title(title)) {

            }
            if (validate_address(address)) {

            }
            if (validate_phonenumber(phonenumber)) {

            }
            if (validate_rooms(rooms)) {

            }
            

            var height = document.getElementById("Height").value;
            if ((isNaN(height)) || (!isNaN(height) && (Number(height) > 5 || Number(height) < 1))) {
                result = false;
                alert("Something went wrong!Stars value must be 1 to 5!");
            }

            //CHECKBOX-EQUIPMENT
            var interests1 = document.getElementById("interests1").checked;
            var interests2 = document.getElementById("interests2").checked;
            var interests3 = document.getElementById("interests3").checked;
            if (interests1 == false && interests2 == false && interests3 == false) {
                result = false;
                alert("Select at least one Equipment!");
            }

        }


        //HIGHLIGHT
        var style;

        function highlightOn(element) {
            style = document.getElementById(element).style;
            document.getElementById(element).style.border = "solid 2px red";
            document.getElementById(element).style.boxShadow = "0px 0px 15px 2px yellow";
        }

        function highlightOff(element) {
            document.getElementById(element).style = style;
        }

        //USERNAME
        function validate_title(title) {
            var illegalChars = new RegExp("/\W/");
            var result = true;
            var length = 0;
            if (username.length == "") {
                result = false;
                alert("You must enter a Title!");
            } else if (illegalChars.test(title) || title.length < 8 || title.length > 20) {
                result = false;
                alert("You must enter at least 8 characters!");
            }
            return result;
        }
        function validate_phonenumber(phonenumber) {
            var result = true;
            var length = 0;
            if (phonenumber.length == "") {
                result = false;
                alert("Phone-Number is empty")
            } else if (phonenumber.length != 10 || isNaN(phonenumber)) {
                result = false;
                alert("Wrong type of Phone-Number");
            }
            return result;
        }
        function validate_rooms(rooms) {
            if ((isNaN(rooms)) || (!isNaN(rooms) && (Number(rooms) > 5 || Number(rooms) < 1))) {
                result = false;
                alert("Something went wrong!Rooms value must be 1 to 100!");
            }
        }

       
        

        //INCOMEINDEX
        function validate_district(district) {
            var result = true;
            var length = 0;
            if (district == "") {
                result = false;
                alert("District is empty!");
            } else if (district < 1) {
                result = false;
                alert("You did not choose a District!");
            }
            return result;
        }

    
    </script>
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
            <p id="alert"></p>
            <form class="regBox" id="regBox" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"  onsubmit="return Validate()" name="vform">
            <h2>INSERT YOUR INFORMATION</h2>
            <table style="width: 100%;">
                <tr>
                    <td width="25%">&nbsp;</td>
                  
                </tr>
                <tr>
                    <td class="right" width="20%"><strong>Title :</strong></td>
                    <td>
                        <input type="text" name="title" id="title" size="25" maxlength="25" onfocus="highlightOn('title');" onblur="highlightOff('title');" />
                    </td>
                </tr>
                <tr>
                    <td class="right"><strong>District :</strong></td>
                    <td>
                        <select name="district" id="district">
                            <option value="-1" style="color:red;" selected="selected" >--Select District--</option>
                            <option value="1">Pierias</option>
                            <option value="2">Thessalonikis </option>
                            <option value="3">Thessalias </option>
                            <option value="4">Dramas</option>
                            <option value="5">Kilkis</option>
                            <option value="6">Dwdekaniswn</option>
                            <option value="6">Thesprwtias</option>
                            <option value="6">Iwanninwn</option>
                            <option value="6">Xalkidikis</option>
                            <option value="6">Prevezas</option>
                            <option value="6">W. Attikis</option>
                            <option value="6">E. Attikis</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="right" width="20%"><strong>Address :</strong></td>
                    <td>
                        <input type="text" name="address" id="address" size="25" maxlength="25" onfocus="highlightOn('address');" onblur="highlightOff('address');" />
                    </td>
                </tr>
                <tr>
                <td class="right" width="20%"><strong>PhoneNumber:</strong></td>
                    <td>
                        <input type="text" name="phonenumber" id="phonenumber" size="25" maxlength="25" onfocus="highlightOn('phonenumber');" onblur="highlightOff('phonenumber');" />
                    </td>
                </tr>
                <tr>
                    <td class="right"><strong>Rooms :</strong></td>
                    <td>
                        <input name="rooms" type="number" min="1" max="100" step="1" id="rooms" />
                    </td>
                </tr>
                <tr>
                    <td class="right" width="20%"><strong>Coordinates :</strong></td>
                    <td>
                        <input type="text" name="coordinates" id="coordinates" size="25" maxlength="25" onfocus="highlightOn('coordinates');" onblur="highlightOff('coordinates');" />
                    </td>
                </tr>
               <tr>
                    <td class="right"><strong>Quality-Stars:</strong></td>
                    <td>
                        <input name="height" type="number" min="1" max="5" step="1" id="Height" />
                    </td>
                </tr>
                <tr>
                    <td class="right"><strong>Equipment :</strong></td>
                    <td class="checkbox">
                       <input  type="checkbox" name="interests1" id="interests1" />
                        <label for="interests1">Pool</label> &nbsp;&nbsp;&nbsp;&nbsp;
                        <label>
                        <input type="checkbox" name="interests2" id="interests2" />Gym
                        </label> &nbsp;&nbsp;&nbsp;
                        <label>
                         <input type="checkbox" name="interests3" id="interests3" />Cinema
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>
                        <button name="submit" type="submit" id="submit" value="send">Send</button>
                    </td>
                </tr>
            </table>
            </form>
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
