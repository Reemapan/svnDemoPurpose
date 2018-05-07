<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Newzworm :: News for Children</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
</head>

<body>

<?php

if(isset($_SESSION["news"]))
{
include 'header.php';
include 'update_subscribers2.php';
include 'footer.php';
}
else
{
	header('Location: index.php');
}
?>
</body>
</html>