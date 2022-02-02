<?php 
   error_reporting(E_ALL);
   ini_set('display_errors', '1');

   include('connection.php'); 
 
   $user_name = $email = $password = $confirm_password = "";
   $user_name_error = $email_error = $password_error = $confirm_password_error = "";

   if($_SERVER["REQUEST_METHOD"] == "POST"){

       $sql = "SELECT id FROM users WHERE username = :user_name";

       if($stmt = $pdo->prepare($sql)){
          $stmt->bindParam(":user_name", $param_user_name, PDO::PARAM_STR);
          $param_user_name = trim($_POST["user_name"]);

          if($stmt->execute()){
            if($stmt->rowCount() == 1){
                $user_name_error = "This username is already taken.";
            } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["user_name"]))){
                $user_name_error = "Username can only contain letters, numbers, and underscores.";
            } else{
                $user_name = trim($_POST["user_name"]);
            }
          }else{
            echo "I apologize! Something went wrong. Please try again later.";
            }
        }
       
        
        $sql = "SELECT id FROM users WHERE email = :email";

        if($stmt = $pdo->prepare($sql)){
           $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

           $param_email = trim($_POST["email"]);

           if($stmt->execute()){
             if($stmt->rowCount() == 1){
                $email_error = "This email is already taken.";
             } else{
                $email = trim($_POST["email"]);
             }
           } else{
            echo "I apologize! Something went wrong. Please try again later.";
            }
        }
        if(strlen(trim($_POST["password"])) < 8){
            $password_error = "Password must have at least 8 characters.";
        } else{
            $password = trim($_POST["password"]);
        }
        $confirm_password = trim($_POST["confirm_password"]);
        
        if(empty($password_error) && ($password != $confirm_password)){
        $confirm_password_error = "Password did not match.";
        }
        if(empty($user_name_error) && empty($password_error) && empty($confirm_password_error) && empty($email_error)){

            $sql = "INSERT INTO users (username, password, email) VALUES (:user_name, :password, :email)";
    
            if($stmt = $pdo->prepare($sql)){
                $stmt->bindParam(":user_name", $param_user_name, PDO::PARAM_STR);
                $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
                $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
    
                $param_user_name = $user_name;
                $param_password = password_hash($password, PASSWORD_DEFAULT);
                $param_email = $email;
               
                if($stmt->execute()){
                   header("location:login.php");
                } else{
                    $alert = "I am sorry! There was some error. Try again please.";
                    echo "<script type='text/javascript'>alert('$alert');</script>";
                }
            }
        }
        unset($pdo);
    }
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        require 'vendor/autoload.php';
    if(isset($_POST["Register"])){
        $responseKey=$_POST["g-recaptcha-response"];
        $userIP = $_SERVER['REMOTE_ADDR'];
        $secretKey="6LdqmxsbAAAAADtxkrCf36pqfoxtrlG2ia0AuYP2";
        $url="https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responceKey&remoteip=$userIP";

        $response = file_get_contents($url);
        $response= json_decode($response);
        print_r($responseKey);
     
        if(isset($_POST['reg_user'])){
         $to=$_POST['email'];
     
         if($user_name_error == '' && $email_error == '' && $password_error == '' && $confirm_password_error== '')
         {   
            
             $name=$_POST["name"];
             $email=$_POST["email"];
     
             $user_activation_code = md5(rand());
             $user_otp = rand(100000, 999999);
     
             $data = array(
                 ':username'=>$user_name,
                 ':email'=>$email,
                 ':password'=>$password,
                 ':user_activation_code'=>$user_activation_code,
                 ':user_email_status'=>'not verified',
                 ':user_otp'=>$user_otp
             );
     
             $query = "
             INSERT INTO users
             (username, email, password, user_activation_code, user_email_status, user_otp)
             SELECT * FROM (SELECT :username, :email, :password, :user_activation_code, :user_email_status, :user_otp) AS tmp
             WHERE NOT EXISTS (
                 SELECT email FROM users WHERE email = :email
             ) LIMIT 1
             ";
     
             $statement = $connect->prepare($query);
             $statement->execute($data);
             if($connect->lastInsertId() == 0)
             {
                 $message = '<label class="text-danger">Email Already Register</label>';
             }	
             else
             {   
                 $mail->IsHTML(true);
                 $mail->IsSMTP();
                 $mail->Host = 'smtp.gmail.com';
                 $mail->Port = '465';
                 $mail->SMTPSecure = 'tls';
                 $mail->SMTPAuth = true;
                 $mail->Username = "antoniosmylonas98@gmail.com";
                 $mail->Password = "eee2553pm";
                 $mail->setFrom = '$email';
                 $mail->FromName = 'Antonis';
                 $mail->AddAddress($email,'localhost');
                 $mail->WordWrap = 50;
                 $mail->Subject = 'Verification code to Verify Your Email';
                 $message_body = '<p>Enter the verification code in order to verify your account: <b>'.$user_otp.'</b>.</p><p>Sincerely,</p>';
                 $mail->Body = $message_body;
     
                 if($mail->Send())
                 {
                     echo '<script>alert("Please Check Your Email for Verification Code")</script>';
                     header('location:email_verification.php?code='.$user_activation_code);
                 }
                 else
                 {
                     $msg= $mail->ErrorInfo;
                 }
             }
     
         }
        }
    }

   
?>

</script>
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
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script defer src="script.js"></script>
        <script type="text/javascript">
           var onloadCallback = function() {
             grecaptcha.render('html_element', {
               '6LdqmxsbAAAAACxx5u1qxVE0ApwPMGUoPCOjtqDl' : '6LdqmxsbAAAAACxx5u1qxVE0ApwPMGUoPCOjtqDl'
             });
           };
    </script>
        <title>Registration Page | WebHotels</title>
    </head>
    <header>
        <div class="Header">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <h1>WebHotels.com</h1>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="projectIndex.php">HOME</a></li>
                            Already a Partner;
                            <li><a type="button" class="button" href="login.php" target="_blank">Login</a></li>
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
            <form class="regBox" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"  onsubmit="return Validate()" name="vform">
                <h2>Register Here</h2>
                <div class="input-label" id="user_name_div"<?php echo (!empty($user_name_error)) ? 'has-error' : ''; ?>>
                    <input type="text" name="user_name" value="<?php echo $user_name; ?>" placeholder="Username" id="username">
                    <div id="uname_response"></div>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#username').keyup(function(){
                                var username = $(this).val().trim();

                                if(username != ''){
                                    $.ajax({
                                        url:'ajaxfile.php',
                                        type:'POST',
                                        data: { username: username},
                                        success: function(response){
                                            $('#uname_response').html(response);
                                        }
                                    });
                                }else{
                                    $('#uname_response').html("");
                                }
                            });
                        });
                    </script>
                     <div class="error"  id="name_error"><span><?php echo $user_name_error; ?></span></div>
                </div>
                <div class="input-label" id="email_div" <?php echo (!empty($email_error)) ? 'has-error' : ''; ?>>
                    <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email"  id="email">
                    <div class="error" id="email_error"><span><?php echo $email_error; ?></span></div>
                </div>
                <div class="input-label" id="password_div"<?php echo (!empty($password_error)) ? 'has-error' : ''; ?>>
                    <input type="password" name="password" value="<?php echo $password; ?>" placeholder="Password" id="password">
                    <div class="error"><span><?php echo $password_error; ?></span></div>
                </div>
                <div class="input-label" id="pass_confirm_div" <?php echo (!empty($confirm_password_error)) ? 'has-error' : ''; ?>>
                    <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>" placeholder="Confirm Password"  id="password2">
                    <div class="error" id="password_error"><span><?php echo $confirm_password_error; ?></span></div>
                </div>
                <br><br>
                <div class="g-recaptcha" data-sitekey="6LdqmxsbAAAAACxx5u1qxVE0ApwPMGUoPCOjtqDl" data-callback="verifyCaptcha"></div>
                <div id="g-recaptcha-error"></div>
                <div class="regBtn">
                    <input type="submit" name="reg_user" value="Register" id="check"><br>
                    <span>Already a User?<a href="login.php"> Login</a></span>
                </div>
            </form>
            <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
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
                        <h1>WebHotels.com</h1>
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
                <p class="copyright">&copy; WebHotels.com 2021 | All Rights Reserved.</p>
            </div>
        </div>
</footer>
</body>
</html>
