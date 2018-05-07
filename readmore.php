<?php ob_start();
 /* if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
} */ 
include_once 'inc/configuration1.php';
include_once 'inc/configuration2.php';

if(isset($_GET['viewd'])){
	$varo2=$_GET['viewd'];
	$varo2=str_replace("-"," ",$varo2);
	$var=$_GET['viewid'];
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
<title><?php echo strip_tags($varo2)?> | Newzworm | Read More</title>
<link rel="icon" href="../../image/favicon.ico" type="image/gif" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../../m/css/style.min.css" rel="stylesheet" type="text/css">

<link href="../../m/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../../m/css/css.css" rel="stylesheet" type="text/css">
<link href="../../font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
<script>
if(screen.width < 767){
//window.location="https://www.newzworm.com/m/readmore.php?viewid=<?php echo $var?>";
}
</script>
</head>
<body onunload="responsiveVoice.cancel();">
<!--Header Start Here-->
<?php
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
include_once 'inc/configuration1.php';
include_once 'inc/configuration2.php';

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

$query=mysqli_query($con,"select * from track_report where ip='$ipaddress' ");
$row=mysqli_fetch_array($query);
$sec=$row['login_attempt'];
$sec=$sec+1;
$query=mysqli_query($con,"update track_report set login_attempt='$sec' where ip='$ipaddress'");
$quer=mysqli_query($con,"select * from user_registration where user_email='".$regemail."' ");
$rquer=mysqli_num_rows($quer);
if($rquer==0){
$res=mysqli_query($con,"insert into user_registration(user_name,user_email,user_password,rdate,rtime,city,country,ip)values('".$regname."','".$regemail."','".$regpass."','".$sdate."','".$stime."','$city','$country','$ipaddress')");
if($res){
$_SESSION["value"] = "123123123qwe";
$_SESSION["name"]=$regname;
header('Location: '.$actual_link.'');
}else{
echo mysql_error();
}
}else{
echo "<script>alert('user already exists')</script>";
}
if(!isset($_COOKIE['newzworm'])){
setcookie("newzworm",$regemail,time()+60*60*24*31*365,'/');
$quer2=mysqli_query($con,"update user_registration set login_by='".$_COOKIE['newzworm']."' where user_email='".$regemail."'");
}else{
$quer2=mysqli_query($con,"update user_registration set login_by='".$_COOKIE['newzworm']."' where user_email='".$regemail."'");
}
}
?>
<?php
//$Err = "";
if(isset($_POST['userlogin'])){
$user = $_POST['userid'];
$pass = $_POST['userpass'];
$result =  mysqli_query($con,'select * from user_registration where user_email="'.$user.'" and user_password="'.$pass.'"');
if(mysqli_num_rows($result)==1)
{
$_SESSION["value"] = "123123123qwe";
$p = "SELECT * FROM  user_registration WHERE user_number='$user' or user_email='$user'";
$resource = mysqli_query($con,$p);
$row = mysqli_fetch_row($resource);
$_SESSION["user_id"] = $row[0];
$_SESSION["name"]=$row[1];
header('Location: '.$actual_link.'');
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
<div class="logo"> <a href="../../index.php" class="page-scroll"><img src="../../img/logodemo.png" alt="Newzworm" /></a> </div>
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
<!--<button class="btn regis-btn" type="submit"><i class="fa fa-user"></i></button>
<button class="reg-login-btn" id="login-gredint" data-toggle="<?php  echo $logoutvalue2; ?>" data-target="<?php echo $logvalue;  ?>" type="button">-->
<?php
if(isset($_SESSION['value'])){
//echo $_SESSION['name'];

setcookie('name',$_SESSION['name'],time() + (24*60*60*31),"/");
setcookie('value',$_SESSION['value'],time() + (24*60*60*31),"/");
}
else{
//echo "Login / Register";
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

<div class="col-md-3 col-xs-12 col-lg-3 col-sm-3">
<div class="main-search">
<span>
<a href='../../newsletter.php' class='btn btn-default'>Subscribe Newsletter</a>
<a href='#weath' data-toggle='modal' class='btn btn-info'><span><i class='fa fa-cloud' aria-hidden='true'></i> <span class='temp'></span></span></a>
</span>
</div>
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
<div class="col-md-8" style="border-right: 1px dotted #C2C2C2; padding-right:30px;">
<!-- Nav tabs -->
<ul class="nav nav-tabs">
<li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
<li><a href="#signup" data-toggle="tab">Sign Up</a></li>
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
<div class="col-md-4">
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
include_once 'gp.php';	
}
echo "<br>";
include_once 'fbb/index.php';
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
$re =  mysqli_query($con,'select * from user_registration where user_email="'.$femail.'"');
if(mysqli_num_rows($re)==1)
{
$row51 = mysqli_fetch_row($re);
$to = $femail;
$subject = "Password Recovery to Newzworm account";

$message = "<div style='background-color:#ddd;padding:10px;'>
<img src='../../img/logodemo.png' width='200px' height='50px'>
<div style='background-color:#fff;padding:10px;margin:10px;'><h3 style='font-family:Arial, Helvetica, sans-serif; color:#F00;'>Your Newzworm Account details:</h3>
<table width='auto' border='0' style='font-family:Arial, Helvetica, sans-serif; color:#999;'>
<tr>
<td width='200px'>Your Name</td>
<td>$row51[1]</td>
</tr>
<tr>
<td>Your Email ID</td>
<td>$row51[3]</td>
</tr>
<tr>
<td>Your Password</td>
<td>$row51[4]</td>
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
<div><h4>Location<button class='btn btn-danger btn-xs pull-right cross'><i class='fa fa-times'></i></button></h4></div>
<hr/>
<div class='row' style="background-color:#3e61ef;color:#fff">

<div class='col-lg-12 text-center'><h3><span id='distance'>Wait...</span></h3></div>
</div>
<div class='col-lg-12'><div class='row' style='border-bottom:2px dashed black'><i class='fa fa-plane' area-hidden='true'></i></div></div>
<div class='row'>

<iframe id='myframe' frameborder="0" style="border:0;" src="" allowfullscreen>
</iframe>
</div>
<div class='row'>
<div class='col-lg-4 text-center' style="background:;height:200px;border-radius:5px;">
<h4>Your Location</h4>
<div id='your_location'></div>
</div>
<div class='col-lg-4'>
</div>
<div class='col-lg-4 text-center' style="background:;height:200px;border-radius:5px;">
<h4>News Location</h4>
<div id='Newslocation'><?php echo $countr?></div>
</div>
<div></div>
</div>
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

echo "<li><a class='page-scroll' href='cat_world.php'><img src='../../image/allnews.png' alt='All news' class='img-responsive' /> All news </a></li>
<li><a class='catactive' href='../../".$cat1."/1'><img src='../../image/world.png' alt='world news' class='img-responsive' /> World</a></li>
<li><a class='catactive' href='../../".$cat2."/1'><img src='../../image/life.png' alt='life news' class='img-responsive' /> Life</a></li>
<li><a class='catactive' href='../../".$cat3."/1'> <img src='../../image/sport.png' alt='sport news' class='img-responsive'/>Sports </a></li>
<li><a class='catactive' href='../../".$cat4."/1'><img src='../../image/skillzen.png' alt='Good news' class='img-responsive' /> Good News </a></li>
<li><a class='catactive' href='../../".$cat5."/1'> <img src='../../image/fun.png' alt='Entertainment news'  class='img-responsive' /> Entertainment</a></li>
<li><a class='catactive' href='../../".$cat6."/1'><img src='../../image/trading.png' alt='Trending news'  class='img-responsive' /> Trending</a></li>";
?>
</ul>
</div>
</div>
</nav>
<!--category ends here-->
<?php
$val = $var;
$_SESSION["view_id"]=$val;

$c1=$_SESSION["view_id"];
?>
<br>
<div id="popupoverlay"></div>
<div id='popup'>
<div id="popupbody"></div>
<div id="popupfooter" class='text-right'></div>
</div>
<!--Read more main section start here -->
<section>
<div class="container">
<div class="row">
<div class="col-lg-7 col-xs-12 col-sm-7">
<div class="panel panel-default panel-body">
<?php
$que1 = mysqli_query($con,"SELECT * from news_update where new_id='".$var."' order by new_id desc");
$row1 = mysqli_fetch_row($que1);
$vmp1=substr("$row1[6]",0,3);

$q1 = mysqli_query($con,"SELECT * from news_update where new_id=".$row1[0]." and categoury like 'W%'");
$pk1 = mysqli_num_rows($q1);
if($pk1>0){
$gh1="world-tag";
}
$q2 = mysqli_query($con,"SELECT * from news_update where new_id=".$row1[0]." and categoury like 'L%'");
$pk2 = mysqli_num_rows($q2);
if($pk2>0){
$gh1="life-tag";
}
$q3 = mysqli_query($con,"SELECT * from news_update where new_id=".$row1[0]." and categoury like 'S%'");
$pk3 = mysqli_num_rows($q3);
if($pk3>0){
$gh1="sport-tag";
}
$q4 = mysqli_query($con,"SELECT * from news_update where new_id=".$row1[0]." and categoury like 'G%'");
$pk4 = mysqli_num_rows($q4);
if($pk4>0){
$gh1="good-tag";
}
$q5 = mysqli_query($con,"SELECT * from news_update where new_id=".$row1[0]." and categoury like 'E%'");
$pk5 = mysqli_num_rows($q5);
if($pk5>0){
$gh1="enter-tag";
}
$q6 = mysqli_query($con,"SELECT * from news_update where new_id=".$row1[0]." and categoury like 'T%'");
$pk6 = mysqli_num_rows($q6);
if($pk6>0){
$gh1="trand-tag";
}

echo "<div class='thenew-box' >
<span class='$gh1'>$row1[6]</span>
<img src='../../m/$row1[5]' class='img-responsive' alt='$row1[1]'>
<h1>$row1[1]</h1>
<small>$row1[12] $row1[13] $row1[14] $row1[9]</small>
<div class='know-news'>Know
<div class='know-news-red'><span>The News</span> </div>
</div>
"?>

<input type='hidden' id='text' value='<?php echo strip_tags($row1[2]); echo strip_tags($row1[3]); echo strip_tags($row1[4]);?>'>

<button class='volume-button' onclick="responsiveVoice.speak($('#text').val(),'UK English Female', {rate: 0.9});">
<i class='fa fa-volume-off down2' aria-hidden='true'></i>
<i class='fa fa-volume-up up2' aria-hidden='true'></i>
</button>
<div class='pull-right'><button class='btn btn-success wh' value='what'>What</button>
<button class='btn btn-primary wh' value='who'>Who</button>
<button class='btn btn-danger gm' value='<?php //echo trim($row1[18])?>'>Where</button>
<button class='btn btn-info wh' value='when'>When</button></div>
<div class='clearfix'></div>
<?php echo "
<br><p class='thnews-txt'>";
$countru=trim($row1[19]);
if(!empty($countru)){
$country=trim($row1[19]);
$quert = mysqli_query($con,"Select * from country where name='$country'");
$row10 = mysqli_fetch_array($quert);
$flag=$row10['flag'];
$address=trim($row1[18]);
echo preg_replace("/".$address."/","<b class='gm' value='$address'><img src='https://www.newzworm.com/m/flags/$flag' width=20px height=20px> $0 <i class='fa fa-map-marker'></i>  </b>",$row1[2]);	
}
else{
	echo $row1[2];
}
echo "<div class='know-news'>Understand
<div class='know-news-red'><span>behind the news</span> </div>
</div><br><br>
<p class='thnews-txt'>$row1[3]</p>
<div class='know-news'>think
<div class='know-news-red'><span>beyond the news</span> </div>
</div>
<br>
<br>
<p class='thnews-txt'>$row1[4]</p>

<div class='thenew-share-box po-static'>
<div class='main-button'>
<a class='share-menu btn' data-toggle='collapse' href='#read-share-icon1' aria-expanded='false' aria-controls='read-share-icon1'>
<i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
<ul class='share-icon' id='read-share-icon1'>
<li><div data-href='https://newzworm.com/readmore.php?viewd=$varo2' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=https://www.newzworm.com/readmore.php?viewd=".trim($varo2)."&pm=ds;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
<li><a target='_blank' href='https://twitter.com/intent/tweet?text=$varo2 https://www.newzworm.com".$_SERVER['REQUEST_URI']."'  data-size='large'><i class='fa fa-twitter twiter'></i></a>
";//<li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li>
echo"<li><a href='https://plus.google.com/share?url=https://newzworm.com/readmore.php?viewd=$varo2' target='_blank' onclick='javascript:window.open(this.href,
'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;'><img src='https://www.gstatic.com/images/icons/gplus-32.png' alt='Share on Google+'/></a></li>
</ul>
</div>

";
// }
echo "</div>";
?>
</div>
</div>
<div class="col-lg-3 col-xs-12 col-sm-3">
<div class="panel row">
<div class="panel-body pad0">
<ul class="vertical-slide">
<?php
$que2 = mysqli_query($con,"SELECT * from news_update where (categoury like '$row1[6]%') and (new_id != ".$row1[0].") order by new_id DESC limit 0,14");
while($row2 = mysqli_fetch_row($que2))
{
echo "<li class='news-item'>";
$catg=str_replace(" ","-",$row2[6]);
$varo=str_replace(" ","-",$row2[1]);
echo "<a href='../".$varo."/$row2[0]'>
<span class='$gh1'>$row1[6]</span>
<img src='../../m/$row2[5]' class='img-responsive' alt='' />
<p>$row2[1]</p></a></li>";
}
?>

</ul>
</div>
<div class="panel-footer text-center padd0"> </div>
</div>
</div>
<div class="col-lg-2 col-xs-12 col-sm-2">
<a href="https://skillizen.com/" target="_blank" class="new-add"><img src="../../add/skillizen.jpg" class="img-add" alt="" title=""/></a><br>
<a href="https://www.iskillsolympiad.org/" target="_blank" class="new-add">
<img src="../../add/olympiad.jpg" class="img-add1" alt="" title=""/> </a>
</div>
</div>
</div>
<div class="container">
<hr>
<div class="row">
<div class="col-lg-12">
<ul class="all-catnews">
<?php
if($vmp1!='WOR')
{
$que3 = mysqli_query($con,"SELECT * from news_update where categoury like 'WORLD%' order by rand()");
$row3 = mysqli_fetch_row($que3);
echo "<li>";

$catg=trim($row3[6]);
$varo=str_replace(" ","-",$row3[1]);
echo "<a href='../../$catg/".$varo."/$row3[0]'>
<span class='world-tag'>$row3[6]</span>
<img src='../../m/$row3[5]' class='img-responsive' alt=''/>
<div class='overlay'><p>$row3[1]</p></div></a>
</li>";
}
?>
<?php
if($vmp1!='LIF')
{
$que4 = mysqli_query($con,"SELECT * from news_update where categoury like 'LIFE%' order by rand()");
$row4 = mysqli_fetch_row($que4);
echo "
<li>";
$catg=trim($row4[6]);
$varo=str_replace(" ","-",$row4[1]);
echo "<a href='../../$catg/".$varo."/$row4[0]'>
<span class='life-tag'>$row4[6]</span>
<img src='../../m/$row4[5]' class='img-responsive' alt=''/>
<div class='overlay'><p>$row4[1]</p></div></a>
</li> ";
}
?>
<?php
if($vmp1!='SPO')
{
$que5 = mysqli_query($con,"SELECT * from news_update where categoury like 'SPORTS%' order by rand()");
$row5 = mysqli_fetch_row($que5);
echo "
<li>";
$catg=trim($row5[6]);
$varo=str_replace(" ","-",$row5[1]);
echo "<a href='../../$catg/".$varo."/$row5[0]'>
<span class='sport-tag'>$row5[6]</span>
<img src='../../m/$row5[5]' class='img-responsive' alt=''/>
<div class='overlay'><p>$row5[1]</p></div></a>
</li> ";
}
?>
<?php
if($vmp1!='GOO')
{
$que6 = mysqli_query($con,"SELECT * from news_update where categoury like 'GOOD NEWS%' order by rand()");
$row6 = mysqli_fetch_row($que6);
echo "
<li>";
$catg='GOOD-NEWS';
$varo=str_replace(" ","-",$row6[1]);
echo "<a href='../../$catg/".$varo."/$row6[0]'>
<span class='good-tag'>$row6[6]</span>
<img src='../../m/$row6[5]' class='img-responsive' alt=''/>
<div class='overlay'><p>$row6[1]</p></div></a>
</li> ";
}
?>
<?php
if($vmp1!='ENT')
{
$que7 = mysqli_query($con,"SELECT * from news_update where categoury like 'ENTERTAINMENT%' order by rand()");
$row7 = mysqli_fetch_row($que7);
echo "
<li>";
$catg=trim($row7[6]);
$varo=str_replace(" ","-",$row7[1]);
echo "<a href='../../$catg/".$varo."/$row7[0]'>
<span class='enter-tag'>$row7[6]</span>
<img src='../../m/$row7[5]' class='img-responsive' alt=''/>
<div class='overlay'><p>$row7[1]</p></div></a>
</li> ";
}
?>
<?php
if($vmp1!='TRE')
{
$que8 = mysqli_query($con,"SELECT * from news_update where categoury like 'TRENDING%' order by rand()");
$row8 = mysqli_fetch_row($que8);
echo "
<li>";
$catg=str_replace(" ","-",$row8[6]);
$varo=str_replace(" ","-",$row8[1]);
echo "<a href='../../$catg/".$varo."/$row8[0]'>
<span class='trand-tag'>$row8[6]</span>
<img src='../../m/$row8[5]' class='img-responsive' alt=''/>
<div class='overlay'><p>$row8[1]</p></div></a>
</li> ";
}
?>

</ul>
</div>
</div>
</div>
</section>
<!--Read more main section end here -->
<!--Bid add start here -->
<div class="big-add text-center"> <img src="../../add/big-add.gif"  class="img-responsive big-add-img" alt="" title="" /> </div>
<!--Bid add end here -->

<!--Footer start here -->
<footer>
<div class="container">
<div class="row">
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
<?php

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
$query=mysqli_query($con,"select * from track_report where `ip`='".$ipaddress."'");
if(mysqli_num_rows($query)==0){
$query1=mysqli_query($con,"INSERT INTO track_report (ip,date,device) VALUES('".$ipaddress."','$date','DESKTOP')");
}

if(isset($_GET['viewid'])){
$viewid=$_GET['viewid'];
$query=mysqli_query($con,"select * from news_update where new_id='$viewid'");
$row=mysqli_fetch_array($query);
$cat=$row['categoury'];
$cat=strtoupper($cat);
$cat=trim($cat);
date_default_timezone_set("Asia/Kolkata");
$date=date('d:m:Y')." ".date('H:i A');
switch($cat){
case "WORLD":
$q=mysqli_query($con,"SELECT * from track_report where ip='".$ipaddress."'");
$r=mysqli_fetch_array($q);
$clicks=$r['world'];
$clicks=$clicks+1;
$qe=mysqli_query($con,"UPDATE track_report set world='$clicks' , date='$date' where ip='".$ipaddress."'");
break;

case "ENTERTAINMENT":
$q=mysqli_query($con,"SELECT * from track_report where ip='".$ipaddress."'");
$r=mysqli_fetch_array($q);
$clicks=$r['entertainment'];
$clicks=$clicks+1;
$qe=mysqli_query($con,"UPDATE track_report set entertainment='$clicks', date='$date' where ip='".$ipaddress."'");
break;

case "LIFE":
$q=mysqli_query($con,"SELECT * from track_report where ip='".$ipaddress."'");
$r=mysqli_fetch_array($q);
$clicks=$r['life'];
$clicks=$clicks+1;
$qe=mysqli_query($con,"UPDATE track_report set life='$clicks', date='$date' where ip='".$ipaddress."'");
break;

case "GOOD NEWS":
$q=mysqli_query($con,"SELECT * from track_report where ip='".$ipaddress."'");
$r=mysqli_fetch_array($q);
$clicks=$r['good_news'];
$clicks=$clicks+1;
$qe=mysqli_query($con,"UPDATE track_report set good_news='$clicks', date='$date' where ip='".$ipaddress."'");
break;

case "SPORTS":
$q=mysqli_query($con,"SELECT * from track_report where ip='".$ipaddress."'");
$r=mysqli_fetch_array($q);
$clicks=$r['sports'];
$clicks=$clicks+1;
$qe=mysqli_query($con,"UPDATE track_report set sports='$clicks', date='$date' where ip='".$ipaddress."'");
break;

case "TRENDING":
$q=mysqli_query($con,"SELECT * from track_report where ip='".$ipaddress."'");
$r=mysqli_fetch_array($q);
$clicks=$r['trending'];
$clicks=$clicks+1;
$qe=mysqli_query($con,"UPDATE track_report set trending='$clicks', date='$date' where ip='".$ipaddress."'");
break;
}
}

$query=mysqli_query($con,"select * from track_report where ip='$ipaddress' ");
$row=mysqli_fetch_array($query);
$sec=$row['clicks'];
$sec=$sec+1;
$subclick=$row['sub_clicks'];
if($subclick==4){ ?>

<div style='position:fixed;bottom:0px;width:;padding:10px;font-size:18px;background:black;z-index:1;color:white;' class='container text-center'>
<b>You have one free Article left. </b>Get UNLIMITED access for only $9.99 per year.<b style='font-size:20px;'> Subscribe Now </b>
</div>
<?php }elseif($subclick==5){ ?>
<div style='position:fixed;bottom:0px;width:;padding:10px;font-size:18px;background:black;z-index:1;color:white;' class='container text-center'>
<b>This is your last free article </b>Get UNLIMITED access for only $9.99 per year <b style='font-size:20px;'> Subscribe Now </b>
</div>

<?php }elseif($subclick>=5){
//	echo "<script>window.location.href='../../subscribe'</script>";
}else{
$subclick=$subclick+1;
$query=mysqli_query($con,"update track_report set clicks='$sec',sub_clicks='$subclick' where ip='$ipaddress'");
}
?>
<h4 class="footer-subhead">Newzworm app Download Now...</h4>
<div class="app-menu">
<ul>
<li><a href="https://play.google.com/store/apps/details?id=com.newzworm.newzworm&hl=en" target="_blank"><img src="../../img/googleplay.png" alt="Play Store App" class="img-responsive"/></a></li>
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
<li><a href="../../about-us.php">About </a></li>
<li><a href="../../privacy-policy.php"> Privacy Policy </a></li>
<li><a href="../../contact.php">Contact Us</a></li>
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
<li><a href='../../".$cat1."/1'> World</a></li>
<li><a href='../../".$cat2."/1'> Life</a></li>
<li><a href='../../".$cat3."/1'> Sports </a></li>
<li><a href='../../".$cat4."/1'> Good News </a></li>
<li><a href='../../".$cat5."/1'> Entertainment</a></li>
<li><a href='../../".$cat6."/1'> Trending</a></li>";
?>
</ul>
</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
<?php
// define variables and set to empty values
$emailErr = "";
$email = "";
$submes = "";

if(isset($_POST["subsubmit"]))
{
$semail = $_POST["semail"];
$que41 = mysqli_query($con,"SELECT email FROM subscriber WHERE email='$semail'");
$row41 = mysqli_num_rows($que41);

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
$que1 = mysqli_query($con,"insert into subscriber (email) values('".$semail."')");

if($que1)
{ $submes = "Thanks For Subscription";
echo "<script type='text/javascript'>alert('$submes');</script>";	}
else{
echo mysql_error();
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
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-90186894-1', 'auto');
ga('send', 'pageview');
</script>
</footer>
<!-- jQuery -->
<!-- End outer wrapper -->
<script src='../../js/responsive_voice.js'></script>
<script src='../../js/min.js'></script>
<script src="../../js/jquery.bootstrap.newsbox.js"></script>
<script src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
<script src="../../js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
$("a").click(function(){
var ip = $.trim('<?php echo $ipaddress?>');
$.ajax({
type:'POST',
url:"../../ajax/tracking.php",
data:{ip:ip},
});
});
});

$(document).ready(function(){
$(window).load(function(){
var ip = $.trim('<?php echo $ipaddress?>');
setInterval(function(){
$.ajax({
type:'GET',
url:'../../ajax/updatetime.php',
data:{ip:ip},
});
},1000);
});
});
</script>

<script>

$(document).ready(function(){
$(".volume-button").click(function(){
if($(".down2").css("display")=="none"){
$(".down2").show();
responsiveVoice.cancel();
responsiveVoice.pause();
$(".up2").hide();
}else{
$(".up2").show();
$(".up1").hide();
$(".down1").show();
$(".down2").hide();
responsiveVoice.resume();
}
});

$(".volume-buttonn").click(function(){
if($(".down1").css("display")=="none"){
$(".down1").show();
responsiveVoice.cancel();
responsiveVoice.pause();
$(".up1").hide();
}else{
$(".up1").show();
$(".up2").hide();
$(".down1").hide();
$(".down2").show();
responsiveVoice.resume();
}
});
});
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
<!--vertical News slider script -->
<script type="text/javascript">
$(function () {
$(".vertical-slide").bootstrapNews({
newsPerPage: 4,
autoplay: true,
pauseOnHover:true,
direction: 'up',
newsTickerInterval: 4000,
onToDo: function () {
//console.log(this);
}
});
});
</script>
<!--Share menu toggle script here -->
<script>
$(document).ready(function() {
$('.share-menu').click(function(){
//get collapse content selector
var collapse_content_selector = $(this).attr('href');

//make the collapse content to be shown or hide
var toggle_switch = $(this);
$(collapse_content_selector).toggle(function(){
if($(this).css('display')=='none'){
//toggle_switch.html('Show');//change the button label to be 'Show'
}
});
});
});
</script>
<!-- Meaning popup end -->
<script>
$(".v").click(function(event){
$('#popup').css('left',event.pageX);      // <<< use pageX and pageY
$('#popup').css('top',event.pageY + 15);
$('#popup').css('display','inline');
$('#popup').css('display','inline');
$('#popupoverlay').css('display','inline');
$("#popup").css("position", "absolute");  // <<< also make it absolute!

var alt = $(this).attr("title");
$("#popupbody").html(alt);
});

$("#popup").click(function(){
$('#popupoverlay').hide();
$("#popup").hide({width:0,height:0},1500);
});
$("#popupoverlay").click(function(){
$('#popupoverlay').hide();
$("#popup").hide({width:0,height:0},1500);
});
$("#popupbody").click(function(){
$('#popupoverlay').hide();
$("#popup").hide({width:0,height:0},1500);
});
</script>
<script >
function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
var R = 6371; // Radius of the earth in km
var dLat = deg2rad(lat2-lat1);  // deg2rad below
var dLon = deg2rad(lon2-lon1);
var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * Math.sin(dLon/2) * Math.sin(dLon/2);
var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
var d = R * c; // Distance in km
return d;
}

function deg2rad(deg) {
return deg * (Math.PI/180)
}


if(navigator.geolocation){
navigator.geolocation.getCurrentPosition(function(position){
var latitude=position.coords.latitude;
var longitude= position.coords.longitude;
$.getJSON("https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(SELECT%20woeid%20FROM%20geo.places(1)%20WHERE%20text=%27("+latitude+","+longitude+")%27)%20and%20u=%27c%27%20&format=json",function(a){
//to show current condition

var location = a.query.results.channel.title;
var city=a.query.results.channel.location.city;
var country=a.query.results.channel.location.country;
var humidity =a.query.results.channel.atmosphere.humidity;
var visibility = a.query.results.channel.atmosphere.visibility;
var sunrise=a.query.results.channel.astronomy.sunrise;
var sunset=a.query.results.channel.astronomy.sunset;
var image=a.query.results.channel.image.url;
var temp=a.query.results.channel.item.condition.temp;
var des=a.query.results.channel.item.condition.text;
var high=a.query.results.channel.item.forecast[0].high;
var low=a.query.results.channel.item.forecast[0].low;
$('#location').html(city+", "+country);
$('#your_location').html(city+", "+country);

$('#desc').html(des);
$('#set').html("Sunset : "+sunset);
$('#rise').html("Sunrise : "+sunrise);
$('.temp').html(temp + String.fromCharCode(176)+"C");
$('#high').html(" to "+high + String.fromCharCode(176)+"C");
$('#low').html(low + String.fromCharCode(176)+"C");
$('#mic').html("Humidity " + humidity + "%");

$(document).ready(function(){
$('.gm').click(function(){
var city1=$(this).attr("value");
$('#Newslocation').html(city1);
$.post("../../ajax/latitude.php",{city:city1},function(data){
var latitude1=data.substring(0, data.indexOf(','));
var latt=latitude1+",";
var longitude1=data.replace(latt,'');
$.getJSON("https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(SELECT%20woeid%20FROM%20geo.places(1)%20WHERE%20text=%27("+latitude1+","+longitude1+")%27)%20and%20u=%27c%27%20&format=json",function(b){
var city1=b.query.results.channel.location.city;
var country1=b.query.results.channel.location.country;
var iflocation="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDTrZglfe4HazFQzQn5Z99hXnXLwsR7aBc&origin="+city+"&destination="+city1+"&zoom=1";
document.getElementById('myframe').src = iflocation;
});
var distance=getDistanceFromLatLonInKm(latitude,longitude,latitude1,longitude1);
var distance = Math.round(distance);
$('#distance').html("You are "+distance+" km <i class='fa fa-paper-plane' area-hidden='true'></i> away from here");
});
});
});
});
});
}
</script>
<script>
$(document).ready(function(){
	$('.gm').click(function(){
		if($('#popupl').css('right')=='0px'){
			$('#popupl').animate({right:'-100%',},1000);
			$('#popupl').delay(1000).css({display:'none'});
		}else{
			$('#popup2').delay(1000).css({display:'none'});
			$('#popupl').css({display:'block'});
			$('#popupl').animate({right:'0px',},1000);
			
		}
	});
	$('.cross').click(function(){
		$('#popupl').animate({right:'-100%',},1000);
		$('#popup2').animate({right:'-100%',},1000);
	});
});
</script>
<script>
$(document).ready(function(){
	$('.wh').click(function(){
		if($('#popup2').css('right')=='0px'){
			$('#popup2').animate({right:'-100%',},1000);
			$('#popup2').delay(1000).css({display:'none'});
		}else{
			$('#popupl').delay(1000).css({display:'none'});
			$('#popup2').css({display:'block'});
			$('#popup2').animate({right:'0px',},1000);
		var vaal=$(this).attr("value");
		if(vaal=='who'){
			$('#distanc').html('Who is involved?');
			$('#information').html("<i class='fa fa-user'></i> Himanshu Gupta?");
		}else if(vaal=='what'){
			$('#distanc').html('What Happened?');
			$('#information').html("<?php echo trim($row1[15]) ?>");	
		}else if(vaal=='when'){
			$('#distanc').html('When did it take Place?');
			$('#information').html("<?php echo $row1[12]."-".$row1[13]."-".$row1[14]." ".$row1[9] ?>");	
		}
	}
	});
});
</script>
<script type="text/javascript">
function googleTranslateElementInit() {
new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>
<?php ob_flush(); ?>