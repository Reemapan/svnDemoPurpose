<!doctype html>
<html>
<head>
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="m/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class='container'>
<div class='row' style="background:#ccc">
<div class= 'col-lg-6'>
<?php
include_once 'inc/configuration1.php';
include_once 'inc/configuration2.php';

$qr=mysql_query("SELECT * from track_report order by country");
$countr=null;
$count_c=1;
$x=1;
echo "<h2>Country</h2>";
	while($r=mysql_fetch_array($qr)){
		$ip=trim($r['ip']);
		$ct=$r['country'];
		if($ct!=$countr){
		echo $x++." ";	
		echo $countr=$ct;
		echo "<br>";
		$count_c++;	
		}
	}
?>
</div>
<div class='col-lg-6'>
<?php 
$qr=mysql_query("SELECT * from track_report order by city");
$countr=null;
$count_c=1;
$x=1;
echo "<h2>City</h2>";
	while($r=mysql_fetch_array($qr)){
		$ip=trim($r['ip']);
		$cty=$r['city'];
		if($cty!=$countr){
		echo $x++." ";	
		echo $countr=$cty;
		echo "<br>";
		$count_c++;	
		}
	}
?>
</div>
</div>
</div>
<!--
<form method='post' class='form-data' action=''>
<button type='submit' name='submi' id='registersubmit'>submit</button>
</form>
<div style='background-color:#eee;margin:20px;padding:20px;'>
<img src='http://www.skillizen.com/image/logo.png' />
<hr style='border-bottom:2px solid green;'>
<center>

<h3 style='font-family:Arial, Helvetica, sans-serif; color:#F00;'>Your skillizen Account Login details:</h3>
<table width='auto' border='0' style='font-family:Arial, Helvetica, sans-serif; color:#555;'>
  <tr>
    <td width='200px'>Your Name</td>
    <td>Himanshu Gupta</td>
  </tr>
  <tr>
    <td>Your Mobile Number</td>
    <td>9467396412</td>
  </tr>
  <tr>
    <td>Your Email ID</td>
    <td>Himanshu</td>
  </tr>
  <tr>
    <td>Your Username</td>
    <td>himansh</td>
  </tr>
  <tr>
    <td>Your Password</td>
    <td>946175685</td>
  </tr>
</table>
</center><br></div>
<small>Delivered by Skillizen Learning Solutions Pvt. Ltd. C-402, 4th Floor, Nirvana Courtyard
Nirvana Country, Sec 50, Gurugram, Haryana 122018</small>

<div style='background-color:#eee;padding:20px;margin:20px;'>
			<img src='http://www.skillizen.com/image/logo.png'>
			<hr style='border-bottom:2px solid red;'>
			Hi <b>$sname</b><br><br>Welcome to the Life Skills Curriculum- We are pleased to have you onboard.<br>Your registeration has been done successfully.<br> <br><b> Your UserID:</b> $username <br><br>
  <b>Your Password:</b> $password<br><br>You are now part of an elite worldwide group of young children who will embark upon acquiring Critical Life Skills and preparing to lead the world in the 21st century.<br /> 
Now you are just one step  away from enrolling yourself in the world's 1st online Life Skills Curriculum.<br>Go to skillizen.com and enter the login details.
<br />
<br> <br>Regards,<br>
 Skillizen Learning Solutions Pvt. Ltd.<br />
C-402, 4th Floor, Nirvana Courtyard <br>
Nirvana Country, Sec 50 <br>
Gurgaon, Haryana 122018 <br>
Email: info@skillizen.com </div>
<small>Delivered by Skillizen Learning Solutions Pvt. Ltd. C-402, 4th Floor, Nirvana Courtyard
Nirvana Country, Sec 50, Gurugram, Haryana 122018</small>

<?php
/*if(isset($_POST['submi'])){
$femail='himanshugupta9467@gmail.com';
			$to      = "$femail";
            $subject = "Skillizen account detail";
            $message = "
<div style='background-color:#ccc;padding:20px;margin:20px;'>
			<img src='http://www.skillizen.com/image/logo.png'>
			<hr>
			Hi <b>Himanshu</b><br><br>Welcome to the Life Skills Curriculum- We are pleased to have you onboard.<br>Your registeration has been done successfully.<br> <br><b> Your UserID:</b> himansh <br><br>
  <b>Your Password:</b> Himanshu<br><br>You are now part of an elite worldwide group of young children who will embark upon acquiring Critical Life Skills and preparing to lead the world in the 21st century.<br /> 
Now you are just one step  away from enrolling yourself in the world's 1st online Life Skills Curriculum.<br>Go to skillizen.com and enter the login details.
<br />
<br> <br>Regards,<br>
 Skillizen Learning Solutions Pvt. Ltd.<br />
C-402, 4th Floor, Nirvana Courtyard <br>
Nirvana Country, Sec 50 <br>
Gurgaon, Haryana 122018 <br>
Email: info@skillizen.com </div>
<small>Delivered by Skillizen Learning Solutions Pvt. Ltd. C-402, 4th Floor, Nirvana Courtyard
Nirvana Country, Sec 50, Gurugram, Haryana 122018</small>

";
            $header  = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= "From:info@skillizen.com \r\n";
            $retval = mail($to, $subject, $message, $header);
			if($retvel){
            $submes = "Please check Your Email, We Sent you a Mail for username and password ";
            echo "<script type='text/javascript'>alert('$submes');</script>";
        }
}*/
?>
<style>
.modal-dialog{
	z-index:1;
	top:20%;
	left:30%;
	position:fixed;
}
#onvideopopup2{
	z-index:12;
	height:100vh;
	width:100vw;
	position:fixed;
	display:block;
	background-color:#f00;
}
input{
	color:red;
	background-color:red;
	font-color:red;
}
</style>
<input type='radio'>sasasa
</div>--> 
</body>				
</html>