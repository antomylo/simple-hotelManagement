<?php

  if (!isset($_GET['style'])) {
    header('Location: projectIndex.php');
    exit();
  }

  switch ($_GET['style']) {  
    case '1':
      $style = 'style.css';
      break;  
    case '2':
      $style = 'homepagecss2.css';
      break;  
    default:
      $style = 'style.css';
  }
  
  if (isset($_COOKIE['css']))
    setcookie ('css', '', time()-3600);

  $expire= time()+60*60*24*120 ;

  setcookie( 'css',$style,$expire);

  header('Location: projectIndex.php');
  exit();

 ?>
 