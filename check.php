<?php

include 'connection.php';

if(isset($_POST['username'])){
    $username  = $_POST["username"];
    $sql = $mysql->query("SELECT * FROM users WHERE username  = '$username'");
    if($sql->rowCount() > 0){
         echo '<span class="text-danger">Not Exist</span>';
    }else{
        echo '<span class="text-success">Exist</span>';
    }

}
?>