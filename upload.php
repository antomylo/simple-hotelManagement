<?php
   include "connection.php";
   
   session_start();

   if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
      header("location: login.php");
      exit;
   }

   if(isset($_GET["del"])){
       @$id=intval($_GET['id']);
       @$name=$_GET["name"];   
       $query=$pdo->prepare("DELETE FROM fileupload WHERE id=?");
       $query->execute(array($id));
       @unlink("Images/".$name);

       
   }

   if(isset($_POST["submit"])){
       $upload_dir="Images/";
       $maxSize = 300000;
       $type = $_FILES["file"]["type"];
       $name =$_FILES["file"]["name"];
       $tmp_name =$_FILES["file"]["tmp_name"];
       $fileExtension=explode(".",$name);
       $fileExtension=end($fileExtension);

       $n1=rand(1,10000);
       $n2=date("ymd");
       $n3=time();
       @$newName=$n1.$n2.$n3.".".$fileExtension;

       $filePath=$upload_dir.$newName;
       if(empty($name)){
           echo "<h1>Please Select a File</h1>";
       }elseif($_FILES["file"]["size"]>$maxSize){
           echo "Please Select max size = 3KB";
    
       }elseif($type=="image/jpeg"){
           move_uploaded_file($tmp_name,$filePath);
           $add=$pdo->prepare("INSERT INTO fileupload SET fileName=?");
           $ok=$add->execute(array($newName));
           if($ok){
               echo "Save to Database";
               header("Refresh:2");
           }else{
               echo "No Saved";
           }
        }
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
    <title>Gallery | WebHotels</title>
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
        <form id="upload" action="" method="POST"  enctype="multipart/form-data">
           <input id="inputfile" type="file" name="file" value="">
           <br>
           <button id="submit" type="submit" name="submit">Save</button>
        </form>
        <hr>
        <h1 id="h1">GALLERY</h1>
        <?php 
          $query=$pdo->prepare("SELECT * FROM fileupload where id");
          $query->execute(array());
          $list=$query->fetchAll(PDO::FETCH_OBJ);
          foreach($list as $list2) { ?>
              <div class="gallery" style="float:left;border:3px solid lightblue;width:256px;height:256px;margin:20px;border-radius:7px;">
                 <img src="Images/<?php echo $list2->fileName;?>" style="width:250px;height:250px;border-radius:7px;padding:0;">
                 <a href="?del&id=<?php echo $list2->id;?>&name=<?php echo $list2->fileName;?>"><button class="galBtn" type="submit" style="color:#e62e00;margin-top:10px;">Delete</button></a>
              </div>
             
           
          <?php } ?>
</div>
</main>
<footer>
    <div class="gallery-footer">
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
    </div>
</footer>
</body>

</html>
