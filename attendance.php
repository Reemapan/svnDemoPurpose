<?php ob_start("ob_gzhandler");
session_start();
?>
<!DOCTYPE HTML>
<html xmlns="https://www.w3.org/1999/xhtml" lang="en">
<head>
<title>Attendance Skillizen</title>
<meta name="keywords" content="NEWZWORM" />
<link rel="icon" href="image/favicon.ico" type="image/gif" sizes="16x16"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="kids news,children news,articles for kids,world news for kids,new articles,news articles"/>
<meta name="keywords" content="kids news,children news,articles for kids,world news for kids,new articles,news articles"/>
<script>
if(screen.width < 767){ window.location.href="https://www.newzworm.com/m/"; }
</script>
<link href="m/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
if(!isset($_SESSION['attendance'])){
?>
<div class='container'>
<form method='post' action='attendance.php'>
<div class='row'>
<div class='col-lg-2'><h3>User Name</h3></div>
<div class='col-lg-2'><h3><input type='text' name='nam'/></h3></div>
</div>

<div class='row'>
<div class='col-lg-2'><h3>Password</h3></div>
<div class='col-lg-2'><h3><input type='password' name='passwor'/></h3></div>
</div>

<div class='row'>
<div class='col-lg-2'></div>
<div class='col-lg-2'><h3><input type='Submit' name='submit'class='btn btn-danger btn-lg'/></h3></div>
</div>
</form>
</div>
<script src='js/min.js'></script>
<?php
}
include_once "inc/configuration3.php";
if(isset($_POST['submit'])){
$name=$_POST['nam'];
$password=$_POST['passwor'];
if($name=='123m' and $password=='123m'){
session_start();
$_SESSION['attendance']='madhav';
}
}

if(isset($_SESSION['attendance'])){
date_default_timezone_set("Asia/Kolkata");
$date=date('d-m-Y');
$time=date('H:i A');
$q1=$conn->query("select * from attendance where date='$date'");
if($q1->num_rows >= 1 ){
$_SESSION['ready']='ready to update';
}else{
$q2=$conn->query("insert into attendance (date) value('$date')");
}


if(isset($_SESSION['ready'])){
// Himanshu Attendance
if(isset($_POST['entryhimanshu'])){
$q3=$conn->query("UPDATE attendance set himanshu_entry='$time' where date ='$date'");
}
if(isset($_POST['leavehimanshu'])){
$leave='leave';
$q3=$conn->query("UPDATE attendance set himanshu_entry='$leave' where date ='$date'");
}
if(isset($_POST['WFHhimanshu'])){
$WFH='WFH';
$q3=$conn->query("UPDATE attendance set himanshu_entry='$WFH' where date ='$date'");
}
if(isset($_POST['exithimanshu'])){
$q3=$conn->query("UPDATE attendance set himanshu_exit='$time' where date ='$date'");
}


// Nakul Attendance

if(isset($_POST['entryNakul'])){
$q3=$conn->query("UPDATE attendance set nakul_entry='$time' where date ='$date'");
}
if(isset($_POST['leaveNakul'])){
$leave='leave';
$q3=$conn->query("UPDATE attendance set nakul_entry='$leave' where date ='$date'");
}
if(isset($_POST['WFHNakul'])){
$WFH='WFH';
$q3=$conn->query("UPDATE attendance set nakul_entry='$WFH' where date ='$date'");
}
if(isset($_POST['exitNakul'])){
$q3=$conn->query("UPDATE attendance set nakul_exit='$time' where date ='$date'");
}

// Gazala Attendance

if(isset($_POST['entrypreet'])){
$q3=$conn->query("UPDATE attendance set saumya_entry='$time' where date ='$date'");
}
if(isset($_POST['leavepreet'])){
$leave='leave';
$q3=$conn->query("UPDATE attendance set saumya_entry='$leave' where date ='$date'");
}
if(isset($_POST['WFHpreet'])){
$WFH='WFH';
$q3=$conn->query("UPDATE attendance set saumya_entry='$WFH' where date ='$date'");
}
if(isset($_POST['exitpreet'])){
$q3=$conn->query("UPDATE attendance set saumya_exit='$time' where date ='$date'");
}

// Deepak Attendance

if(isset($_POST['entryDeepak'])){
$q3=$conn->query("UPDATE attendance set deepak_entry='$time' where date ='$date'");
}
if(isset($_POST['leaveDeepak'])){
$leave='leave';
$q3=$conn->query("UPDATE attendance set deepak_entry='$leave' where date ='$date'");
}
if(isset($_POST['WFHDeepak'])){
$WFH='WFH';
$q3=$conn->query("UPDATE attendance set deepak_entry='$WFH' where date ='$date'");
}
if(isset($_POST['exitDeepak'])){
$q3=$conn->query("UPDATE attendance set deepak_exit='$time' where date ='$date'");
}

// Vikas Attendance

if(isset($_POST['entryVikas'])){
$q3=$conn->query("UPDATE attendance set vikas_entry='$time' where date ='$date'");
}
if(isset($_POST['leaveVikas'])){
$leave='leave';
$q3=$conn->query("UPDATE attendance set vikas_entry='$leave' where date ='$date'");
}
if(isset($_POST['WFHVikas'])){
$WFH='WFH';
$q3=$conn->query("UPDATE attendance set vikas_entry='$WFH' where date ='$date'");
}
if(isset($_POST['exitVikas'])){
$q3=$conn->query("UPDATE attendance set vikas_exit='$time' where date ='$date'");
}

// Radhika Attendance

if(isset($_POST['entryNitish'])){
$q3=$conn->query("UPDATE attendance set nitish_entry='$time' where date ='$date'");
}
if(isset($_POST['leaveNitish'])){
$leave='leave';
$q3=$conn->query("UPDATE attendance set nitish_entry='$leave' where date ='$date'");
}
if(isset($_POST['WFHNitish'])){
$WFH='WFH';
$q3=$conn->query("UPDATE attendance set nitish_entry='$WFH' where date ='$date'");
}
if(isset($_POST['exitNitish'])){
$q3=$conn->query("UPDATE attendance set nitish_exit='$time' where date ='$date'");
}

}
?>
<div class='container'>
<div class='col-lg-12'>
<table border=5px style='text-align:center;width:100%;'>
<tr><td><h3>Name</h3></td><td><h3>Entry</h3></td><td><h3>Exit</h3></td><td><h3>Leave</h3></td><td><h3>W.F.H.</h3></td></tr>
<tr>
<td><h3>Himanshu Gupta</h3></td>
<td><form action='' method='post'><input type='submit' class='btn btn-primary' value='Entry' id='entryhimanshu' name='entryhimanshu'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-success' value='Exit' id='exithimanshu' name='exithimanshu'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-danger' value='Leave' id='leavehimanshu' name='leavehimanshu'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-info' value='WFH' id='WFHhimanshu' name='WFHhimanshu'/></form></td>
</tr>
<tr>
<td><h3>Nakul Bhaduria</h3></td>
<td><form action='' method='post'><input type='submit' class='btn btn-primary' value='Entry' id='entryNakul' name='entryNakul'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-success' value='Exit' id='exitNakul' name='exitNakul'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-danger' value='Leave' id='leaveNakul' name='leaveNakul'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-info' value='WFH' id='WFHNakul' name='WFHNakul'/></form></td>
</tr>

<tr>
<td><h3>Deepak Kasana</h3></td>
<td><form action='' method='post'><input type='submit' class='btn btn-primary' value='Entry' id='entryDeepak' name='entryDeepak'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-success' value='Exit' id='exitDeepak' name='exitDeepak'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-danger' value='Leave' id='leaveDeepak' name='leaveDeepak'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-info' value='WFH' id='WFHDeepak' name='WFHDeepak'/></form></td>
</tr>
<!--tr>
<td><h3>Radhika</h3></td>
<td><form action='' method='post'><input type='submit' class='btn btn-primary' value='Entry' id='entryNitish' name='entryNitish'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-success' value='Exit' id='exitNitish' name='exitNitish'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-danger' value='Leave' id='leaveNitish' name='leaveNitish'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-info' value='WFH' id='WFHNitish' name='WFHNitish'/></form></td>
</tr-->

<tr>
<td><h3>Gazala</h3></td>
<td><form action='' method='post'><input type='submit' class='btn btn-primary' value='Entry' id='entryNitish' name='entrypreet'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-success' value='Exit' id='exitNitish' name='exitpreet'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-danger' value='Leave' id='leaveNitish' name='leavepreet'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-info' value='WFH' id='WFHNitish' name='WFHpreet'/></form></td>
</tr>

<tr>
<td><h3>Vikas</h3></td>
<td><form action='' method='post'><input type='submit' class='btn btn-primary' value='Entry' id='entryVikas' name='entryVikas'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-success' value='Exit' id='exitVikas' name='exitVikas'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-danger' value='Leave' id='leaveVikas' name='leaveVikas'/></form></td>
<td><form action='' method='post'><input type='submit' class='btn btn-info' value='WFH' id='WFHVikas' name='WFHVikas'/></form></td>
</tr>

</table>
</div>
</div>
<hr/>
<?php if(isset($_POST['latemail'])){
	$himanshu='himanshugupta9467@gmail.com';
	$Saumya='saumya.jain2803@gmail.com';
	$nakul='nakulbhaduriya@gmail.com';
	$sidharth='sidh.tripathy@gmail.com';
	$deepak='deepakkasana6@gmail.com';
	$q4=$conn->query("Select * from attendance where date='$date'");
	$r4=$q4->fetch_assoc();
	$late_commer='';
	$email='sidh.tripathy@gmail.com,';
	
	if(trim($r4['himanshu_entry'])== null){
	}
	
	if(trim($r4['saumya_entry'])== null){
		
	}
	
	if(trim($r4['vikas_entry'])== null){
		$late_commer .='Vikas,';
		$email.='vikasmaurya5540@outlook.com';
	}
	
	if(trim($r4['nakul_entry'])== null){
		$late_commer.='Nakul Bhaduriya,';
		$email.='nakulbhaduriya@gmail.com,';
	}
	
	
	if(trim($r4['deepak_entry'])== null){
		$late_commer .='Deepak Kasana';
		$email .='deepakkasana6@gmail.com';
	}
	if(trim($r4['nitish_entry'])== null){
		$late_commer .='';
		$email .='';
	}
	$Subject='Late Comers '.$date;
	$headers  = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From:Newzworm@newzworm.com \r\n";
		echo $message='Sir, <br>'.$late_commer.' are late today.';
	if(mail($sidharth,$Subject,$message,$headers)){
		echo 'Sent to Sidharth sir';
	}
	$subject1 ="You are Late at Skillizen";
	
	echo $message1="
	Dear Skillizen,<br/>

Perhaps due to some personal situation, today you have arrived significantly late at the work place.
<br/><br/>
This is to remind you that our regular office starting time is at 9:00am. And while we expect everybody to be at office by that time but we can understand due to some logistical issues there may be a small delay in arrival once in a while. 
<br/><br/>
But for any reason if you are not able to reach to office by 9:30 am, please be aware that there will be a half day's salary deduction and the same will be reflecting in your next salary payout.   
<br/><br/>
We hope this is a one-off case of delayed arrival and there will be very few such reoccurrences in future. We would further like to emphasize that your late coming to office must not have any adverse effect on your work targets. 
<br/><br/><br/>

Thanks & Regards,
<br/>
Skillizen HR";

	if(mail($email,$subject1,$message1,$headers)){

	}
 $late_commer;
}
?>
<div class='container'>
<div class='row'>
<form method='post'>
<input type='submit' name='latemail' value='Late After 9:30 ' class='btn btn-danger btn-lg'/>
</form>
</div>
</div>

<table class='table table-striped'>
<thead>
<tr>
<td>Date</td>
<td>Himanshu entry</td>
<td>Himanshu exit</td>
<td>Nakul Entry</td>
<td>Nakul exit</td>
<td>Gazala Entry</td>
<td>Gazala Exit</td>
<td>Deepak Entry</td>
<td>Deepak exit</td>
<td>Vikas Entry</td>
<td>Vikas exit</td>
</tr>
</thead>
<tbody>
<?php
$q="select * from attendance where date like '%12-2017'";
$qr=$conn->query($q);


while($r=$qr->fetch_assoc()){
	echo "
<tr>
<td>".$r['date']."</td>
<td>".$r['himanshu_entry']."</td>
<td>".$r['himanshu_exit']."</td>
<td>".$r['nakul_entry']."</td>
<td>".$r['nakul_exit']."</td>
<td>".$r['saumya_entry']."</td>
<td>".$r['saumya_exit']."</td>
<td>".$r['deepak_entry']."</td>
<td>".$r['deepak_exit']."</td>
<td>".$r['vikas_entry']."</td>
<td>".$r['vikas_exit']."</td>
</tr>
	";
}
?>
</tbody>
</table>
<?php
}
?>
</body>
</html>