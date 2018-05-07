<?php
  if(isset($_POST['userlogout'])){
  //unset($_SESSION["value"]);
  session_destroy();
  $_SESSION["catid"]="";
  $_SESSION["page"]="";
  $_SESSION["view_id"]="";
  	header('Location: index.php');
  }
?>