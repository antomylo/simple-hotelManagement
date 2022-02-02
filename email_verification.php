<?php

include('connection.php');

$message = '';

if(isset($_GET['activation_code']))
{
 $query = "
  SELECT * FROM users
  WHERE user_activation_code = :user_activation_code
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':user_activation_code'   => $_GET['activation_code']
  )
 );
 $no_of_row = $statement->rowCount();
 
 if($no_of_row > 0)
 {
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   if($row['user_email_status'] == 'not verified')
   {
    $update_query = "
    UPDATE users
    SET user_email_status = 'verified' 
    WHERE id = '".$row['id']."'
    ";
    $statement = $connect->prepare($update_query);
    $statement->execute();
    $sub_result = $statement->fetchAll();
    if(isset($sub_result))
    {
     $msg = '<label id="Success">Your Email is successfully verified <br />Please procceed - <a href="login.php">Login</a></label>';
    }
   }else
   {
    $msg = '<label id="info">Your Email Address Already Verified</label>';
   }
  }
 }else
 {
  $message = '<label id="Error">Invalid Link</label>';
 }
}

?>
<!DOCTYPE html>
<html>
 <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="Images/favicon.png">
  <title>Email Verification | WebHotels</title>  
 </head>
 <body>
  <div class="small-container">
   <h1>PHP Register Login Script with Email Verification</h1>
   <h3><?php echo $msg; ?></h3>
   </div>
 </body>
</html>
