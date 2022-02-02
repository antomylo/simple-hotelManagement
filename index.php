<?php
   function getCSS() { 
    if ((!isset($_COOKIE['css'])))
       $css='css1.css';
    else
      $css= $_COOKIE['css']  ;
  
    return $css;
  }
  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Lab11</title>
  <link href="<?php echo getCSS(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="container01">

  <h2 class="center">Επιλογή CSS και αποθήκευση σε Cookie!</h2>

  <p class="center">
  <?php
    if (!isset($_COOKIE['css'])) {
      echo 'Τρέχουσα Επιλογή: default';
    } else {
      echo 'Τρέχουσα Επιλογή: '.getCSS();
    }  
  ?>
  </p>
  
  <p class="center">
    [<a href="store_css.php?style=1">CSS1</a>] - 
    [<a href="store_css.php?style=2">CSS2</a>] -
    [<a href="clear_cookie.php">Clear Cookie</a>]
  </p>

</div>

</body>
</html>