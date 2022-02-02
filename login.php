<?php

session_start();
 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: logged_in.php");
    exit;
}
 

require_once "connection.php";

$username = $password = "";
$username_err = $password_err = $login_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
   
    if(empty($username_err) && empty($password_err)){
       
        $sql = "SELECT id, username, password FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
           
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            
            $param_username = trim($_POST["username"]);
            
           
            if($stmt->execute()){
               
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)) {
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            header("location: logged_in.php");
                        } else{
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo " Something went wrong. Please try again later.";
            }
            unset($stmt);
        }
    }
    unset($pdo);
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
    <title>Sign in | WebHotels.com</title>
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
                    <ul>
                        <li><a href="projectIndex.php">HOME</a></li>
                        <li><a href="contact_us.php">CONTACT US</a></li>
                    </ul>
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
        <form class="box" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Welcome back</h2>
            <?php 
            if(!empty($login_err)){
              echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }        
            ?>
            <div class="form-group">
            <input type="text" name="username" placeholder="Username"  class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
            <span class="error"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
            <input type="password" name="password" placeholder="Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
            <span class="error"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
            <input type="submit" name="login" value="Login" required>
            <span><a href="reset-password.php">Forgot Password?</a></span><br>
            <span>New User?<a href="register.php" > Register</a></span>
            </div>
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