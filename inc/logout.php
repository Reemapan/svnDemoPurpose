<?php
  if(isset($_POST['userlogout'])){
  $_SESSION['news']=null;
  session_destroy();
  header('Location: index.php');
  }
?>