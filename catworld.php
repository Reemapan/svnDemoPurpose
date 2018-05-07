<?php ob_start();
 if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
$redirect = 'https://www.' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
header('HTTP/1.1 301 Moved Permanently');
header('Location: ' . $redirect);
exit();
} 
$var = $_GET["catid"];
if($var=='GOODNEWS'){
$var='GOOD NEWS';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-90186894-1', 'auto');
ga('send', 'pageview');
</script>
<title><?php echo $var; ?> |Global news for 8-18 years young</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="../image/favicon.ico" type="image/gif" sizes="16x16">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Reading is the best way for a child's growth and Newzworm gives a boost to that growth. Newzworm is the first ever global online news network specially designed for the young generation of 8-18 years. It is an innovative and interactive platform which brings in interesting news articles for kids. Newzworm is a news source for children that provides news on captivating topics like entertainment news, sports news, environment news, technology news, politics news and good news which are written in an easy to understand language. It brings the events in and around the world and the kids together and engages the kids with the 21st century. The kids can comprehend the news and also enjoy the science and history behind it. There is no place for the illicit content or complex sentences and complicated words in Newzworm."/>

<meta name="keywords" content="kids news,children news,articles for kids,world news for kids,new articles,news articles"/>
<link href="../m/css/style.min.css" rel="stylesheet" type="text/css">
<link href="../m/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../m/css/css.css" rel="stylesheet" type="text/css">
<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../flag/css/flag.css" type="text/css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
<script>
if(screen.width < 767){
window.location="https://m.newzworm.com/";
}
</script>
</head>
<body onunload="responsiveVoice.cancel();">
<!--Header Start Here-->
<?php
include "inc/configuration3.php";
session_set_cookie_params(8*60*60);

session_start();
/* if(isset($_COOKIE['name'])){
	$_SESSION['name']=$_COOKIE['name'];
	$_SESSION['value']='123123123qwe';
	
} */
error_reporting(0);
ini_set('session.gc_maxlifetime', '28800');
$a1="";
$b1="";
$c1="";
$a1=$_SESSION["catid"];
$b1=$_SESSION["page"];
$c1=$_SESSION["view_id"];
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]?catid=$a1&&page=$b1&&viewid=$c1";

$rname = $remail = $rpass = $submes = "";
if(isset($_POST['regsubmit'])){

$regname=trim($_POST['regname']);
$regemail=trim($_POST['regemail']);
$regpass=trim($_POST['regpass']);

date_default_timezone_set("Asia/Kolkata");
$sdate   	= date("d:M:Y");
$stime 		= date("h:i:A");
$ipaddress = '';
if (getenv('HTTP_CLIENT_IP'))
$ipaddress = getenv('HTTP_CLIENT_IP');
else if(getenv('HTTP_X_FORWARDED_FOR'))
$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
else if(getenv('HTTP_X_FORWARDED'))
$ipaddress = getenv('HTTP_X_FORWARDED');
else if(getenv('HTTP_FORWARDED_FOR'))
$ipaddress = getenv('HTTP_FORWARDED_FOR');
else if(getenv('HTTP_FORWARDED'))
$ipaddress = getenv('HTTP_FORWARDED');
else if(getenv('REMOTE_ADDR'))
$ipaddress = getenv('REMOTE_ADDR');
else
$ipaddress = 'UNKNOWN';
$ipaddress = trim($ipaddress);
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ipaddress"));
$country = $geo["geoplugin_countryName"];
$city = $geo["geoplugin_city"];

$query=$conn->query("select * from track_report where ip='$ipaddress' ");
$row=$query->fetch_assoc();
$sec=$row['login_attempt'];
$sec=$sec+1;
$query=$conn->query("update track_report set login_attempt='$sec' where ip='$ipaddress'");
$quer=$conn->query("select * from user_registration where user_email='".$regemail."' ");
$rquer=$quer->num_rows();
if($rquer==0){
$res=$conn->query("insert into user_registration(user_name,user_email,user_password,rdate,rtime,city,country,ip)values('".$regname."','".$regemail."','".$regpass."','".$sdate."','".$stime."','$city','$country','$ipaddress')");
if($res){
$_SESSION["value"] = "123123123qwe";
$_SESSION["name"]=$regname;
header('Location: '.$actual_link.'');
}else{
echo mysqli_error();
}
}else{
echo "<script>alert('user already exists')</script>";
}
if(!isset($_COOKIE['newzworm'])){
setcookie("newzworm",$regemail,time()+60*60*24*31*365,'/');
$quer2=$conn->query("update user_registration set login_by='".$_COOKIE['newzworm']."' where user_email='".$regemail."'");
}else{
$quer2=$conn->query("update user_registration set login_by='".$_COOKIE['newzworm']."' where user_email='".$regemail."'");
}
}
?>
<?php
if(isset($_POST['userlogin'])){
$user = $_POST['userid'];
$pass = $_POST['userpass'];
$result =  $conn->query('select * from nluser where email="'.$user.'" and password="'.$pass.'"');
if($result->num_rows==1)
{
$row11=$result->fetch_assoc();
	if($row11['payment']==1){
$_SESSION["value"] = "123123123qwe";
$p = "SELECT * FROM  nluser WHERE email='".$user."' and password='".$pass."'";
$resource = $conn->query($p);
$row =$resource->fetch_assoc();
$_SESSION["user_id"] = $row['id'];
$_SESSION["name"]=$row['name'];
header('Location: '.$actual_link.'');
}else{
	echo "<script type='text/javascript'>alert('your Payment is Pending');</script>";
}
}else{
$Err = "Your email/mobile number or password is wrong";
echo "<script type='text/javascript'>alert('$Err');</script>";
}}
?>
<?php include_once 'inc/logout.php'; ?>
<div class="top-ship">
<div class="container">
<div class="row">
<div class="col-md-4 col-xs-12 col-lg-4 col-sm-4">
<?php
date_default_timezone_set("Asia/Kolkata");
$sdate   	=  date("M d l Y");
$stime 		= date(" h:i A");
?>
<p><?php echo $sdate; echo $stime;?></p>
</div>
<div class="col-md-4 col-xs-12 col-lg-4 col-sm-4">
<span id="google_translate_element"></span>
</div>
<div class="col-md-4 col-xs-12 col-lg-4 col-sm-4">
<div class="social-box">
<div class="social-media">
<ul>
<li>Follow us</li>
<li><a href="https://www.facebook.com/newzworm/" target="_blank"><i class="fa fa-facebook"></i></a></li>
<li><a href="https://twitter.com/newzworm/" target="_blank"><i class="fa fa fa-twitter"></i></a></li>
<!--li><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li-->
<li><a href="https://plus.google.com/106514798874929932268" target="_blank"><i class="fa fa-google-plus"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<header data-spy="affix" data-offset-top="38">
<div class="container">
<div class="row">
<div class="col-md-4 col-xs-12 col-lg-3 col-sm-3">
<div class="logo"> <a href="../index.php" class="page-scroll"><img src="../img/logodemo.png" alt="Newzworm" /></a> </div>
</div>

<div class="hidden-md hidden-xs col-lg-3 hidden-sm">
<form action='../search.php' method='get'>
<div class="main-search">
<div class="input-group">
<input type="text" class="form-control" name='search' placeholder="Search..." />
<span class="input-group-btn">
<button class="btn btn-info login-gredint" type="submit">
<i class="glyphicon glyphicon-search"></i>
</button>
</span>
</div>
</div>    
</form>
</div>

<div class="col-md-3 col-xs-12 col-lg-3 col-sm-3">
<div class="main-search">
<span>
<button href='subs' class='btn btn-default himanshu'>Newzworm Prime</button>
<a href='#weath' data-toggle='modal' class='btn btn-info'><span><i class='fa fa-cloud' aria-hidden='true'></i> <span class='temp'></span></span></a>
<a href='https://www.newzworm.com/'  class="btn" id='login-gredint' style='background-color:#f10d0d;'color type="submit"><i class="fa fa-home"></i></a>
</span>
</div>
</div>

<div class="col-md-4 col-xs-12 col-lg-3 col-sm-5">
<div class="search-box">

<div class="btn-group dropdown">

<?php
if(isset($_SESSION['value']))
{
$logvalue = "";
$logoutvalue = "<form method='post'><button type='submit' name='userlogout'  style='background-color:#FFF; color:#666; width:100%; height:37px;border:2px #FFFFFF solid;'><i class='fa fa-sign-out'></i> Logout</button></form>";
$logoutvalue2 = "dropdown";
$logoutvalue3 = "caret";
}
else
{
$logvalue = "#login-modal";
$logoutvalue = "";
$logoutvalue2 = "modal";
$logoutvalue3 = "";
}
?>
<button class="btn regis-btn" type="submit"><i class="fa fa-user"></i></button>
<button class="reg-login-btn" id="login-gredint" data-toggle="<?php  echo $logoutvalue2; ?>" data-target="<?php echo $logvalue;  ?>" type="button">
<?php
if(isset($_SESSION['value'])){
echo $_SESSION['name'];

setcookie('name',$_SESSION['name'],time() + (24*60*60*31),"/");
setcookie('value',$_SESSION['value'],time() + (24*60*60*31),"/");
}
else{
echo "Login";
}
?>
<span class="<?php echo $logoutvalue3; ?>"></span></button>
<ul class="dropdown-menu">
<li><?php echo $logoutvalue; ?></li>
</ul>
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<!--<a href="index.php" class="btn pull-right hidden-xs login-gredint"><i class="fa fa-home home-ic"></i></a>-->

</div>

</div>


</div>
</div>
</header>

<!--sharing popup -->
<div id="media-share" class="modal fade">
<div class="modal-dialog clearfix">
<div class="modal-content clearfix">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Share</h4>
</div>
<div class="modal-body clearfix">
<div class="row form-group">
<div class="col-md-6">
<div class="faceboox-share"> <a href="#"> <i class="fa fa-facebook"></i></a> </div>
</div>
<div class="col-md-6">
<div class="google-plus-share"> <a href="#"><i class="fa fa-google-plus"></i></a> </div>
</div>
</div>
<div class="row form-group">
<div class="col-md-6">
<div class="twite-share"> <a href="#"> <i class="fa fa-twitter"></i></a> </div>
</div>
<div class="col-md-6">
<div class="gmail-share"> <a href="#"> <i class="fa fa-envelope" aria-hidden="true"></i></a> </div>
</div>
</div>
</div>
<div class="modal-footer"> </div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<!--report popup -->
<div id="report-box" class="modal fade">
<div class="modal-dialog clearfix">
<div class="modal-content clearfix">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Report</h4>
</div>
<div class="modal-body clearfix">
<div class="row form-group">
<div class="col-md-12">
<textarea placeholder="write your messages here..." class="form-control" ></textarea>
</div>
</div>
<input type="submit" class="btn readmore pull-right" value="Submit" />
</div>
<div class="modal-footer"> </div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!--Login Popup here-->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog"   aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header" ><b style="font-size:18px;">WORLD'S FIRST NEWZ SOURCE FOR SMART KIDS</b>
<button type="button" class="close lclose" data-dismiss="modal" aria-hidden="true">x</button>
<!-- <h4 class="modal-title" id="myModalLabel"> Login/Sign Up </h4>-->
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-12" style="border-right: 1px dotted #C2C2C2; padding-right:30px;">
<!-- Nav tabs -->
<ul class="nav nav-tabs">
<li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
<!--<li><a href="#signup" data-toggle="tab">Sign Up</a></li>-->
</ul>
<!-- Tab panes -->
<div class="tab-content">
<div class="tab-pane active" id="Login">
<div class="panel-body">
<form  class="form-horizontal" method="post">
<div class="form-group">
<div class="col-sm-12">
<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-user"></label>
<input type="text" class="form-control"  placeholder="Enter Your Email" name="userid">
</div>
</div>
</div>
</div>
<div class="form-group">
<div class="col-sm-12">
<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-lock"></label>
<input type="password" class="form-control" placeholder="Enter Your Password" name="userpass">
</div>
<!-- /.input-group -->
</div>
</div>
</div>
<div class="form-group">
<div class="col-sm-6">
<div class="checkbox">
<label>
<input type="checkbox">
Remember me </label>
</div>
</div>
<div class="col-sm-6"> <a class="pull-right" data-dismiss="modal" aria-hidden="true" data-target="#forget-pass" data-toggle="modal" href="javascript:;">Forgot your password?</a></div>
</div>
<hr/>
<div class="row">
<div class="col-sm-12 text-center"><input type="submit" class="btn login-btn" name="userlogin" value="Login" />
</div>
</div>
</form>
</div>
</div>
<div class="tab-pane" id="signup">
<div class="panel-body">
<form  class="form-horizontal" method="post">
<div class="form-group">
<div class="col-sm-12">
<div class="input-group">
<label  class="input-group-addon icon-btn glyphicon glyphicon-user"></label>
<input type="text" class="form-control"  placeholder="Enter Your Full Name" name="regname" value="<?php echo $rname;?>" pattern="[A-Za-z '-]{2,}" title="Only letters and white space allowed" required="required">
</div>
</div>
</div>
<div class="form-group">
<div class="col-sm-12">
<div class="input-group">
<label  class="input-group-addon icon-btn glyphicon glyphicon-envelope"></label>
<input type="email" class="form-control"  placeholder="Enter Your Email ID" name="regemail" value="<?php echo $remail;?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter valid email id" required="required">
</div>
</div>
</div>
<div class="form-group">
<div class="col-sm-12">
<div class="input-group">

<label class="input-group-addon icon-btn glyphicon glyphicon-lock"></label>
<input type="password" class="form-control"  placeholder="Enter Your Password" name="regpass" value="<?php echo $rpass;?>" pattern="[A-Za-z0-9@#$% '-]{2,}" title="Only @#$ letters, white space and Digits allowed" required="required">
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12"><input type="submit" class="btn login-btn" value="Signup" name="regsubmit"/>

</div>
</div>
</form>
</div>
</div>
</div>
</div>
<div class="hidden">
<div class="row text-center sign-with">
<div class="col-md-12">
<h3>Login Using</h3>
</div>
<div class='row'>
<div class="col-md-12 col-xs-12 col-sm-12">
</div></div>
<div class='row'>
<div class="col-md-12">
<?php 
if(!isset($_SESSION['value'])){
if(!isset($_GET['state'])){
include_once '../gp.php';	
}
echo "<br>";
include_once '../fbb/index.php';
} ?>
</div></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--forget password modal-->
<div id="forget-pass" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content clearfix">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
<h4>If you have forgotten your password you can reset it here.</h4>
</div>
<div class="modal-body">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-body">
<div class="text-center">
<div class="panel-body">
<?php
$femail="";
if(isset($_POST['fsubmit'])){
$femail = $_POST['femail'];
$re =  $conn->query('select * from user_registration where user_email="'.$femail.'"');
if($re->num_rows==1)
{
$row51 = $re->fetch_assoc();
$to = $femail;
$subject = "Password Recovery to Newzworm account";

$message = "<div style='background-color:#ddd;padding:10px;'>
<img src='../../img/logodemo.png' width='200px' height='50px'>
<div style='background-color:#fff;padding:10px;margin:10px;'><h3 style='font-family:Arial, Helvetica, sans-serif; color:#F00;'>Your Newzworm Account details:</h3>
<table width='auto' border='0' style='font-family:Arial, Helvetica, sans-serif; color:#999;'>
<tr>
<td width='200px'>Your Name</td>
<td>".$row51['user_name']."</td>
</tr>
<tr>
<td>Your Email ID</td>
<td>".$row51['user_email']."</td>
</tr>
<tr>
<td>Your Password</td>
<td>".$row51['user_password']."</td>
</tr>
</table>
</div>
<small style='font-size:10px;'>Delivered by Skillizen Learning Solutions Pvt. Ltd. C-402, 4th Floor, Nirvana Courtyard Nirvana Country, Sec 50, Gurugram, Haryana 122018</small>
</div>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 5.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <noreply@newzworm.com>' . "\r\n";
$headers .= 'Cc: datacare@newzworm.com' . "\r\n";

mail($to,$subject,$message,$headers);

$submes = "Please check Your Email, We Sent you a Mail for password Recovery";
echo "<script type='text/javascript' >alert('$submes');</script>";
}
else
{
$forErr = "Your entered email is wrong";
echo "<script type='text/javascript'>alert('$forErr');</script>";
}
}
?>
<form method="post">
<fieldset>
<div class="form-group">
<input class="form-control input-lg" name="femail" type="email" placeholder="Enter Your Email ID" value="<?php echo $femail;?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter valid email id" required="required">
</div>
<div class="form-group col-xs-offset-3 col-md-6">
<input class="btn login-btn" value="Reset Password" type="submit" name="fsubmit">
</div>
<div class="clearfix"></div>
<p>or</p>
<a data-dismiss="modal" aria-hidden="true" data-toggle="modal" data-target="#login-modal"  href="javascript:;">Login</a>
</fieldset>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div id="weath" class="modal fade">
<div class='modal-dialog modal-sm'>
<div class='modal-content'>
<div class='modal-body' style='height:300px'>
<div id='location' style="font-size:20px;font-weight:bolder;"></div>
<hr/>
<div>
<div class='col-lg-3 col-sm-3 col-md-3 text-center'><div id='weather'> </div>
</div>
<div class='col-lg-9 col-sm-9 col-md-9'style="border-left:1px solid #ccc">
<div class='temp' style="font-size:24px;font-weight:bolder;"></div>
<div id='mic'></div>
<div id='desc'></div>
<div id='rise'></div>
<div id='set'></div>
<span id='low'></span> <span id='high'></span>
</div></div></div></div></div></div>

<div id='popupl' class='text-justify'>
<div><h3>Location of the news<button class='btn btn-danger btn-xs pull-right cross'><i class='fa fa-times'></i></button></h3></div>
<hr/>
<div class='row' style="background-color:#3e61ef;color:#fff">

<div class='col-lg-12 text-center'><h5><span id='distance'>Wait...</span></h5></div>
</div>
<div class='col-lg-12'><div class='row' style='border-bottom:2px dashed black'><i class='fa fa-plane' area-hidden='true'></i></div></div>
<div class='row'>

<iframe id='myframe' frameborder="0" style="border:0;" src="" allowfullscreen>
</iframe>
</div>
<div class='row'>
<div class='col-lg-4 text-center' style="background:;height:100px;border-radius:5px;">
<h4>Your Location</h4>
<div id='your_location'></div>
</div>
<div class='col-lg-4'>
</div>
<div class='col-lg-4 text-center' style="background:;height:100px;border-radius:5px;">
<h4>News Location</h4>
<div id='Newslocation'><?php echo $countr?></div>
</div></div>
<hr/>
<div class='row text-left'>
<div class='col-lg-6'>
<h6 class='name'></h6>
<h6 class='callingCodes'></h6>
<h6 class='capital'></h6>
<h6 class='region'></h6>
<h6 class='subregion'></h6>
</div>
<div class='col-lg-6'>
<h6 class='population'></h6>
<h6 class='currencies'></h6>
<h6 class='timezones'></h6>
<h6 class='languages'></h6>	
</div></div>
</div>

<div id='popup2' class='text-justify'>
<div><h4>
<?php?>
About News<button class='btn btn-danger btn-xs pull-right cross'><i class='fa fa-times'></i></button></h4></div>
<hr/>
<div class='row' style="background-color:#3e61ef;color:#fff">
<div class='col-lg-12 text-center'><h3><span id='distanc'></span></h3></div>
</div>
<div class='col-lg-12'>
<div class='row' style='border-bottom:2px dashed black'><hr/></i></div>
</div>
<div class='col-lg-12' id='information'>

</div>
</div>

<div id='overlay'></div>
<div id='subs' class='text-center' style='background:#fff;width:600px;border:2px solid #ccc;border-radius:10px;padding:20px'>
<div class='row'>
<i class='fa fa-times pull-right clos' id='clos' style='padding-right:20px;'></i>
<div class='col-lg-6' style='border-right:2px solid #ccc;'>
<img src='../img/newspaper.jpg' height='150px'/>
</div>
<div class='col-lg-6'style='padding-top:20px;'>
<img src='../img/newzworm.png' class='img-responsive'/>
</div>
</div>
<div class='row'>
<div class='col-lg-6' style='border-right:2px solid #ccc;'>
<br/><b>Home Delivery</b><sub>(India only)</sub><br/>
<i class='fa fa-inr'></i>399 for the first 6 months
</div>
<div class='col-lg-6'>
<br/><b>Digital access</b><br/>
Save 50% off the regular rate
</div>
</div>
<div class='row'>
<div class='col-lg-6' style='border-right:2px solid #ccc;'>
<br/><a href='../subscribe' class='btn btn-success btn-sm'>Subscribe</a>
</div>
<div class='col-lg-6'>
<br/><a href='../DigitalSubscription.php' class='btn btn-success btn-sm'>Subscribe</a>
</div>
</div>
<div class='row text-center'><br/>Already a subscriber? <a>Sign In</a></div>
</div>
<!--Header ends here-->

<!--Category Starts here-->
<nav class="fixed-box">
<div class="container-fluid">
<div class="collapse navbar-collapse" id="myNavbar">
<a class="btn btn-default btn-outline cat-btn hidden-xs login-gredint" title="categories"  data-toggle="collapse" href="#categories" aria-expanded="false" aria-controls="categories"><i class="fa fa-bars" aria-hidden="true"></i></a>
<ul class="nav navbar-nav"  id="categories">
<?php
$cat1="WORLD";
$cat2="LIFE";
$cat3="SPORTS";
$cat4="GOODNEWS";
$cat5="ENTERTAINMENT";
$cat6="TRENDING";

echo "<li><a class='page-scroll' href='../../".$cat1."/1'><img src='../image/allnews.png' alt='All news' class='img-responsive' /> All news </a></li>
<li><a class='catactive' href='../".$cat1."/1'><img src='../image/world.png' alt='world news' class='img-responsive' /> World</a></li>
<li><a class='catactive' href='../".$cat2."/1'><img src='../image/life.png' alt='life news' class='img-responsive' /> Life</a></li>
<li><a class='catactive' href='../".$cat3."/1'> <img src='../image/sport.png' alt='sport news' class='img-responsive'/>Sports </a></li>
<li><a class='catactive' href='../".$cat4."/1'><img src='../image/skillzen.png' alt='Good news' class='img-responsive' /> Good News </a></li>
<li><a class='catactive' href='../".$cat5."/1'> <img src='../image/fun.png' alt='Entertainment news'  class='img-responsive' /> Entertainment</a></li>
<li><a class='catactive' href='../".$cat6."/1'><img src='../image/trading.png' alt='Trending news'  class='img-responsive' /> Trending</a></li>";
?>
</ul>
</div>
</div>
</nav>
<!--category ends here-->
<?php
echo $cont = $_GET["page"];
$_SESSION["catid"]=$var;
$_SESSION["page"]=$cont;
$a1=$_SESSION["catid"];
$b1=$_SESSION["page"];
?>
<!--Categorey section start here -->
<div id="popupoverlay">
</div>
<div id="popup">
</div>
<section>
<div class="container">
<br>
<div class="col-lg-12">
<?php
if($var=="WORLD")
{$pmo="cat-sebhead";}
if($var=="LIFE")
{$pmo="cat-sebhead1";}
if($var=="SPORTS")
{$pmo="cat-sebhead2";}
if($var=="GOOD NEWS")
{$pmo="cat-sebhead3";}
if($var=="ENTERTAINMENT")
{$pmo="cat-sebhead4";}
if($var=="TRENDING")
{$pmo="cat-sebhead5";}
?>
<h1  class="<?php echo $pmo;?>"><span><?php echo $var;?></span></h1>
<!--<p class="ext-p">
</p> -->
</div>
<div class="row form-group">
<?php
$vale=($cont-1)*9;
$que31 = $conn->query("SELECT * from news_update where categoury like '$var%' order by new_id DESC limit $vale,9 ");
while($row31 = $que31->fetch_assoc())
{echo "<div class='col-md-4 col-lg-4 col-sm-4 col-xs-12'>
<div class='cat-box'>";
$varo=str_replace(" ","-",$row31['new_title']);
$varo=str_replace("?","",$varo);
$varo2=str_replace(" ","-",$var);

echo "<a href='../$varo2/".$varo."/".$row31['new_id']."'>
<img src='../m/".$row31['image_url']."' class='img-responsive' alt='".$row31['new_title']."' title='".$row31['new_title']."'/>
<h3>". $row31['new_title']."</h3></a>
<p>".$row31['slider_dis']."</p>
<div class='cat-datebox'>".$row31['udate']." ". $row31['umonth']." ". $row31['uyear']." ".$row31['news_day']."</div>
</div>
</div>";}
?>
</div>
</div>
<br>
<!--pagination start here -->

<div class="container">
<div class="col-lg-12">
<?php
$que35 = $conn->query("SELECT * from news_update WHERE categoury like'$var%'");
$row35 = $que35->num_rows;
$row36 = $row35/9;
$row37 = $row35%9;
if($row37!=0){
$row36=$row36+1;
}else{
$row36=$row36;
}
$class_varible="";

echo "<nav aria-label='...'>
<ul class='pagination'>";

for($i=1;$i<=$row36;$i++){
if($cont==$i){
$class_varible="active";
}
if($cont<$i){
$class_varible="";
} ?>
  
    <li class="page-item <?php echo $class_varible; ?>">
	<a class="page-link" href="<?php echo $i; ?>"><?php echo $i; ?></a>
	</li>
    

<?php

 }

?>
<li class="page-item hidden">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
  </nav>

  
  
</div>
</div>


</section>

<!--Categorey section end here -->
<!--Footer start here -->

<footer>
<div class="container">
<div class="row">
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
<?php
include_once "inc/configuration3.php";
$ipaddress = '';
if (getenv('HTTP_CLIENT_IP'))
$ipaddress = getenv('HTTP_CLIENT_IP');
else if(getenv('HTTP_X_FORWARDED_FOR'))
$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
else if(getenv('HTTP_X_FORWARDED'))
$ipaddress = getenv('HTTP_X_FORWARDED');
else if(getenv('HTTP_FORWARDED_FOR'))
$ipaddress = getenv('HTTP_FORWARDED_FOR');
else if(getenv('HTTP_FORWARDED'))
$ipaddress = getenv('HTTP_FORWARDED');
else if(getenv('REMOTE_ADDR'))
$ipaddress = getenv('REMOTE_ADDR');
else
$ipaddress = 'UNKNOWN';
$ipaddress = trim($ipaddress);
date_default_timezone_set("Asia/Kolkata");
$date=date('d:m:Y')." ".date('H:i A');
$query=$conn->query("select * from track_report where `ip`='".$ipaddress."'");
if($query->num_rows==0){
$query1=$conn->query("INSERT INTO track_report (ip,date,device) VALUES('".$ipaddress."','$date','DESKTOP')");
}

if(isset($_GET['viewid'])){
$viewid=$_GET['viewid'];
$query=$conn->query("select * from news_update where new_id='$viewid'");
$row=$query->fetch_assoc();
$cat=$row['categoury'];
$cat=strtoupper($cat);
$cat=trim($cat);
date_default_timezone_set("Asia/Kolkata");
$date=date('d:m:Y')." ".date('H:i A');
switch($cat){
case "WORLD":
$q=$conn->query("SELECT * from track_report where ip='".$ipaddress."'");
$r=$q->fetch_assoc();
$clicks=$r['world'];
$clicks=$clicks+1;
$qe=$conn->query($con,"UPDATE track_report set world='$clicks' , date='$date' where ip='".$ipaddress."'");
break;

case "ENTERTAINMENT":
$q=$conn->query("SELECT * from track_report where ip='".$ipaddress."'");
$r=$q->fetch_assoc();
$clicks=$r['entertainment'];
$clicks=$clicks+1;
$qe=$conn->query("UPDATE track_report set entertainment='$clicks', date='$date' where ip='".$ipaddress."'");
break;

case "LIFE":
$q=$conn->query("SELECT * from track_report where ip='".$ipaddress."'");
$r=$q->fetch_assoc();
$clicks=$r['life'];
$clicks=$clicks+1;
$qe=$conn->query("UPDATE track_report set life='$clicks', date='$date' where ip='".$ipaddress."'");
break;

case "GOOD NEWS":
$q=$conn->query("SELECT * from track_report where ip='".$ipaddress."'");
$r=$q->fetch_assoc();
$clicks=$r['good_news'];
$clicks=$clicks+1;
$qe=$conn->query($con,"UPDATE track_report set good_news='$clicks', date='$date' where ip='".$ipaddress."'");
break;

case "SPORTS":
$q=$conn->query("SELECT * from track_report where ip='".$ipaddress."'");
$r=$q->fetch_assoc();
$clicks=$r['sports'];
$clicks=$clicks+1;
$qe=$conn->query("UPDATE track_report set sports='$clicks', date='$date' where ip='".$ipaddress."'");
break;

case "TRENDING":
$q=$conn->query("SELECT * from track_report where ip='".$ipaddress."'");
$r=$q->fetch_assoc();
$clicks=$r['trending'];
$clicks=$clicks+1;
$qe=$conn->query("UPDATE track_report set trending='$clicks', date='$date' where ip='".$ipaddress."'");
break;
}
}

$query=$conn->query("select * from track_report where ip='$ipaddress' ");
$row=$query->fetch_assoc();
$sec=$row['clicks'];
$sec=$sec+1;
$query=$conn->query("update track_report set clicks='$sec' where ip='$ipaddress'");
?>
<h4 class="footer-subhead">Newzworm app Download Now...</h4>
<div class="app-menu">
<ul>
<li><a href="https://play.google.com/store/apps/details?id=com.newzworm.newzworm&hl=en" target="_blank"><img src="https://www.newzworm.com/img/googleplay.png" alt="Play Store App" class="img-responsive"/></a></li>
<!--li><a href="#" target="_blank"><img src="img/applestore.png" alt="IOS app" class="img-responsive">  </a></li> -->
</ul>
</div>
<div class="social-media">
<ul>
<li><a href="https://www.facebook.com/newzworm/" target="_blank"><i class="fa fa-facebook"></i></a></li>
<li><a href="https://twitter.com/newzworm/" target="_blank"><i class="fa fa fa-twitter"></i></a></li>
<!--li><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li-->
<li><a href="https://plus.google.com/106514798874929932268" target="_blank"><i class="fa fa-google-plus"></i></a></li>
</ul>
</div>
</div>
<div class="col-md-2 col-lg-2 col-sm-2 col-xs-5">
<h4 class="footer-subhead">Links</h4>
<div class="footer-menu">
<ul>
<li><a href="../about-us.php">About </a></li>
<li><a href="../privacy-policy.php"> Privacy Policy </a></li>
<li><a href="../contact.php">Contact Us</a></li>
<li><a href="../archive.php">Archives</a></li>
</ul>
</div>
</div>
<div class="col-md-2 col-lg-2 col-sm-2 col-xs-7">
<h4 class="footer-subhead">Categories</h4>
<div class="footer-menu">
<ul>
<?php
$cat1="WORLD";
$cat2="LIFE";
$cat3="SPORTS";
$cat4="GOODNEWS";
$cat5="ENTERTAINMENT";
$cat6="TRENDING";
echo "
<li><a href='".$cat1."/1'> World</a></li>
<li><a href='".$cat2."/1'> Life</a></li>
<li><a href='".$cat3."/1'> Sports </a></li>
<li><a href='".$cat4."/1'> Good News </a></li>
<li><a href='".$cat5."/1'> Entertainment</a></li>
<li><a href='".$cat6."/1'> Trending</a></li>";
?>
</ul>
</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
<?php

include_once 'inc/configuration2.php';
// define variables and set to empty values
$emailErr = "";
$email = "";
$submes = "";

if(isset($_POST["subsubmit"]))
{
$semail = $_POST["semail"];
$que41 = $conn->query($con,"SELECT email FROM subscriber WHERE email='$semail'");
$row41 = $query->num_rows($que41);

if($row41>0) {
$emailErr = "$semail Already Subscribed";
$email = $semail;
echo "<script type='text/javascript'>alert('$emailErr');</script>";
}

if($emailErr=="")
{
date_default_timezone_set("Asia/Kolkata");
$sdate   	=  date("d:M:Y");
$stime 		= date("h:i:A");
$que1 = $conn->query($con,"insert into subscriber (email) values('".$semail."')");

if($que1)
{ $submes = "Thanks For Subscription";
echo "<script type='text/javascript'>alert('$submes');</script>";	}
else{
echo mysqli_error();
}
}
}
?>
<h4 class="footer-subhead form-group">Get News in your Inbox</h4>
<form method="post" action="">
<div class="input-group form-group">
<input type="text" class="form-control hei42" placeholder="Enter your email id" name="semail" value="<?php echo $email;?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter valid email id" required="required">
<div class="input-group-btn out-bg">
<button class="btn subcribe" type="submit" name="subsubmit">SUBSCRIBE</button>
</div>
</div>
</form>

</div>
</div>
</div>

<div class="container-fluid">
<div class="row">

<div class="col-md-12">
<hr/>
<p class="copyright">&copy; 2016 newzworm.com. All rights reserved.</p>
</div>

</div>
</div>

</footer>
<!-- jQuery -->
<!-- End outer wrapper -->
<script src='../js/responsive_voice.js'></script>
<script src='../js/min.js'></script>
<script src="../js/jquery.bootstrap.newsbox.js"></script>
<script src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
$('#selcat').val("<?php echo $_GET['page'] ?>");
</script>
<script>
$(document).ready(function(){
$("a").click(function(){
var ip = $.trim('<?php echo $ipaddress?>');
$.ajax({
type:'POST',
url:"../ajax/tracking.php",
data:{ip:ip},
});
});
});

var ip = $.trim('<?php echo $ipaddress?>');
setInterval(function(){
$.ajax({
type:'GET',
url:'../ajax/updatetime.php',
data:{ip:ip},
});
},1000);

</script>

<!--on click News slider script -->
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
showDivs(slideIndex += n);
}

function showDivs(n) {
var i;
var x = document.getElementsByClassName("mynews");
if (n > x.length) {slideIndex = 1}
if (n < 1) {slideIndex = x.length}
for (i = 0; i < x.length; i++) {
x[i].style.display = "none";
}
//x[slideIndex-1].style.display = "block";
}
</script>

<script type="text/javascript">
function googleTranslateElementInit() {
new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>