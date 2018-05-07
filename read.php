<?php ob_start();
 if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
header('HTTP/1.1 301 Moved Permanently');
header('Location: ' . $redirect);
exit();
}
include "inc/configuration3.php";

if(isset($_GET['viewd'])){
$varo2=$_GET['viewd'];
$varo2=str_replace("-"," ",$varo2);
$var=$_GET['viewid'];
}

$que19 = $conn->query("SELECT * from news_update where new_id ='$var'");
$row19 = $que19->fetch_assoc();

$catg=trim($row19['categoury']);
$catg=str_replace(" ","-",$catg);
$varo=str_replace(" ","-",$row19['new_title']);
$varo=str_replace("?","",$varo);
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
<meta name="description" content="Reading is the best way for a child's growth and Newzworm gives a boost to that growth. Newzworm is the first ever global online news network specially designed for the young generation of 8-18 years. It is an innovative and interactive platform which brings in interesting news articles for kids. Newzworm is a news source for children that provides news on captivating topics like entertainment news, sports news, environment news, technology news, politics news and good news which are written in an easy to understand language. It brings the events in and around the world and the kids together and engages the kids with the 21st century. The kids can comprehend the news and also enjoy the science and history behind it. There is no place for the illicit content or complex sentences and complicated words in Newzworm."/>
<meta name="keywords" content="kids news,children news,articles for kids,world news for kids,new articles,news articles"/>
<link href="../../m/css/style.min.css" rel="stylesheet" type="text/css">

<link href="../../m/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../../m/css/css.css" rel="stylesheet" type="text/css">
<link href="../../font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
<script>
if(screen.width < 767){
window.location.href="https://www.newzworm.com/m/<?php echo $catg."/".$varo."/".$var ?>";
}
</script>
</head>
<body onload='speechSynthesis.cancel()'>
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
if($result->num_rows==1){
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
<div class="logo"> <a href="../../index.php" class="page-scroll"><img src="../../img/logodemo.png" alt="Newzworm" /></a> </div>
</div>

<div class="hidden-md hidden-xs col-lg-3 hidden-sm">
<form action='../../search.php' method='get'>
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
<input type="text" class="form-control"  placeholder="Enter Your Email" name="userid"/>
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
//include_once '../../gp.php';
}
echo "<br>";
//include_once '../../fbb/index.php';
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
<div><h3>Location of the news<i class='fa fa-times pull-right cross' style='color:red'></i></h3></div>
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
<div id='Newslocation'><?php echo $country?></div>
</div></div>
<hr/>
<div class='row text-left'>
<div class='col-lg-12'><b>About News Location</b></div>
<div class='col-lg-6'>
<h6 class='name' style='background-color:#ff2;border-radius:5px;color:#f00;padding:2px;'></h6>
<h6 class='languages' style='background-color:#0061ff;border-radius:5px;color:#fff;padding:2px;'></h6>
<h6 class='capital' style='background-color:#ffa500;border-radius:5px;color:#fff;padding:2px;'></h6>
<h6 class='region' style='background-color:#fa00ff;border-radius:5px;color:#fff;padding:2px;'></h6>
<h6 class='subregion' style='background-color:#ff4c00;border-radius:5px;color:#fff;padding:2px;'></h6>
</div>
<div class='col-lg-6'>
<h6 class='callingCodes' style='background-color:#ff4c00;border-radius:5px;color:#fff;padding:2px;'></h6>
<h6 class='population' style='background-color:#ff0033;border-radius:5px;color:#fff;padding:2px;'></h6>
<h6 class='currencies' style='background-color:#19ff00;border-radius:5px;color:#f00;padding:2px;'></h6>
<h6 class='timezones' style='background-color:#ffa500;border-radius:5px;color:#fff;padding:2px;'></h6>
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



<div class='popup4'>
<div class='row'><form method='post'  action=''>
<div class='col-lg-12'><h5><i class='fa fa-times pull-right closesubs'>close</i></h5></div>
<div class='col-lg-12'>
<div class='col-lg-6'><input type='text' name='cname' class='input' Placeholder='Enter Name'/></div>
<div class='col-lg-6'><input type='email' name='cemail' class='input' Placeholder='Enter Email-Id'/></div></div>
<div class='col-lg-12'><textarea Placeholder='Comment Here' name='ccomment' class='textarea' rows='2' required></textarea></div>
<div class='col-lg-12'><input type='submit' name='csubmit' class='btn btn-primary input' value='Post Comment' /></div>
<div class='col-lg-12'><h6>We respect your privacy and safeguarding your privacy is our top-priority</h6></div></form>
</div>
</div>
<?php
if(isset($_POST['csubmit'])){
$cname=$_POST['cname'];
$ccomment=$_POST['ccomment'];
$cemail=$_POST['cemail'];
$quer=$conn->query("insert into review (name,email,comment,date) values('$cname','$cemail','$ccomment','".date('d-m-Y')."')");
}?>
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

echo "<li><a class='page-scroll' href='../../".$cat1."/1'><img src='../../image/allnews.png' alt='All news' class='img-responsive' /> All news </a></li>
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

<div id='popupt'>
<div id="popuptbody"></div>
<div id="popuptfooter" class='text-right'></div>
</div>
<!--Read more main section start here -->
<section>
<div class="container">
<div class="row">
<div class="col-lg-7 col-xs-12 col-sm-7">
<div class="panel panel-default panel-body">
<?php
$row1 = $conn->query("SELECT * from news_update where new_id='".$var."' order by new_id desc")->fetch_array();

$vmp1=substr($row1[6],0,3);

$q1 = $conn->query("SELECT * from news_update where new_id=".$row1[0]." and categoury like 'W%'");
$pk1 = $q1->num_rows;
if($pk1>0){
$gh1="world-tag";
}
$q2 = $conn->query("SELECT * from news_update where new_id=".$row1[0]." and categoury like 'L%'");
$pk2 = $q2->num_rows;
if($pk2>0){
$gh1="life-tag";
}
$q3 = $conn->query("SELECT * from news_update where new_id=".$row1[0]." and categoury like 'S%'");
$pk3 = $q3->num_rows;
if($pk3>0){
$gh1="sport-tag";
}
$q4 = $conn->query("SELECT * from news_update where new_id=".$row1[0]." and categoury like 'G%'");
$pk4 = $q4->num_rows;
if($pk4>0){
$gh1="good-tag";
}
$q5 = $conn->query("SELECT * from news_update where new_id=".$row1[0]." and categoury like 'E%'");
$pk5 = $q5->num_rows;
if($pk5>0){
$gh1="enter-tag";
}
$q6 = $conn->query("SELECT * from news_update where new_id=".$row1[0]." and categoury like 'T%'");
$pk6 = $q6->num_rows;
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
";

$nw=trim($row1[2])." ".trim($row1[3])." ".trim($row1[4]);
?>
<script>
var msg = new SpeechSynthesisUtterance();
msg.text = "<?php echo strip_tags($nw)?>";

function spk(){
speechSynthesis.speak(msg);
}
</script>

<button class='volume-button'>
<i class='fa fa-volume-off down2' onclick="spk()" aria-hidden='true'></i>
<i class='fa fa-volume-up up2' onclick="speechSynthesis.cancel()" aria-hidden='true'></i>
</button>

<div class='pull-right'><button class='btn btn-success wh' value='what'>What</button>
<button class='btn btn-primary wh' value='who'>Who</button>
<button class='btn btn-danger gm' value='<?php echo trim($row1[18])?>'>Where</button>
<button class='btn btn-info wh' value='when'>When</button></div>
<div class='clearfix'></div>
<?php echo "
<br><p class='thnews-txt'>";
$countru=trim($row1[19]);
// select Terminology words 
$q7=$conn->query("select * from term");
$x=0;
while($r7 = $q7->fetch_assoc()){
$term[$x]=$r7['term'];
$x++;
}
// find dectionary words
$q2=$conn->query("Select * from dictionary");
$x=0;
while($r2= $q2->fetch_assoc()){
$words[$x]=$r2['word'];
$x++;
}

if(!empty($countru)){
$country=trim($row1[19]);
$quert = $conn->query("Select * from country where name='$country'");
$row10 = $quert->fetch_assoc();
$flag=$row10['flag'];
$address=trim($row1[18]);
$alpha2=trim($row10['alpha2']);

// Add City
$news=strip_tags($row1[2]);
$news= preg_replace("/".$address."/","<b class='gm' title='$alpha2' value='$address'><img src='https://www.newzworm.com/m/flags/$flag' width=20px height=20px> $0 <i class='fa fa-map-marker'></i>  </b>",$news,1);


$x=0;
$y=0;
while($words[$x]){
if(strpos($news,$words[$x]) !== false){
    $word_found[$y]=$words[$x];
	$y++;
}
	
$news= preg_replace("/\b(".$words[$x]. ")\b/", "<b class='wordmeaning' title='".$words[$x]."'>".$words[$x]."</b>", $news,1);
$x++;
}
// Replace Terminology words
$x=0;
$z=0;
while($term[$x]){
	if(in_array($term[$x], $term_found)){

}else{
	$news= preg_replace("/\b(".$term[$x]. ")\b/", "<b class='terminology' title='".$term[$x]."'>".$term[$x]."</b>", $news,1);
}
	
if(strpos($news, $term[$x]) !== false){
$term_found[$z]=$term[$x];
$z++;

}
$x++;
}
echo $news;
}else{
$news=strip_tags($row1[2]);
$x=0;
$y=0;
while($words[$x]){
if(strpos($news,$words[$x]) !== false){
    $word_found[$y]=$words[$x];
	$y++;
}
	
$news= preg_replace("/\b(".$words[$x]. ")\b/", "<b class='wordmeaning' title='".$words[$x]."'>".$words[$x]."</b>", $news,1);
$x++;
}
// Replace Terminology words
$x=0;
$z=0;
while($term[$x]){
	if(in_array($term[$x], $term_found)){

}else{
	$news= preg_replace("/\b(".$term[$x]. ")\b/", "<b class='terminology' title='".$term[$x]."'>".$term[$x]."</b>", $news,1);
}
	
if(strpos($news, $term[$x]) !== false){
$term_found[$z]=$term[$x];
$z++;

}
$x++;
}
echo $news;
}

echo "<div class='know-news'>Understand
<div class='know-news-red'><span>behind the news</span> </div>
</div><br><br>
<p class='thnews-txt'>";
$x=0;
$behind=strip_tags($row1[3]);
while($words[$x]){
if(in_array($words[$x], $word_found)) {

}else{
	$behind= preg_replace("/\b(".$words[$x]. ")\b/", "<b class='wordmeaning' title='".$words[$x]."'>".$words[$x]."</b>", $behind,1);
}
	
if(strpos($behind, $words[$x]) !== false){
$word_found[$y]=$words[$x];
$y++;

}

$x++;
}
// Replace Terminology words
$x=0;
while($term[$x]){
if(in_array($term[$x], $term_found)){

}else{
	$behind= preg_replace("/\b(".$term[$x]. ")\b/", "<b class='terminology' title='".$term[$x]."'>".$term[$x]."</b>", $behind,1);
}
	
if(strpos($behind, $term[$x]) !== false){
$term_found[$z]=$term[$x];
$z++;

}
$x++;
}
echo $behind;
echo "</p>
<div class='know-news'>think
<div class='know-news-red'><span>beyond the news</span> </div>
</div>
<br>
<br>
<p class='thnews-txt'>";
$beyond=strip_tags($row1[4]);
$x=0;
while($words[$x]){

if(in_array($words[$x], $word_found)) {
}
else{
	$beyond= preg_replace("/\b(".$words[$x]. ")\b/", "<b class='wordmeaning' title='".$words[$x]."'>".$words[$x]."</b>", $beyond,1);
}
	
if(strpos($beyond, $words[$x]) !== false) {
    $word_found[$y]=$words[$x];
	$y++;
}

$x++;
}
// Replace Terminology words
$x=0;
while($term[$x]){
if(in_array($term[$x], $term_found)) {

}else{
	$beyond= preg_replace("/\b(".$term[$x]. ")\b/", "<b class='terminology' title='".$term[$x]."'>".$term[$x]."</b>", $beyond,1);
}
	
if(strpos($beyond, $term[$x]) !== false){
$term_found[$z]=$term[$x];
$z++;
}
$x++;
}
echo $beyond;
?>
</p>

<?php 
$catg=trim($row1['categoury']);
$catg=str_replace(" ","-",$catg);
$varo=trim($row1['new_title']);
$varo=str_replace(" ","-",$varo);

echo "
<div class='thenew-share-box po-static'>
<div class='main-button'>
<a class='share-menu btn' data-toggle='collapse' href='#share-icon-all' aria-expanded='false' aria-controls='share-icon-all'>
<i class='fa fa-share-alt' aria-hidden='true'></i> Share</a></div>
<ul class='share-icon' id='share-icon-all'>
<li><div data-href='https://newzworm.com/$catg/$varo/".$row1['new_id']."' data-layout='button' data-size='large' data-mobile-iframe='false'><a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fnewzworm.com/$catg/$varo/".$row1['new_id']."&amp;src=sdkpreparse'><i class='fa fa-facebook face'></i></a></div></li>
<li><a target='_blank' href='https://twitter.com/intent/tweet?text=".$varo." https://newzworm.com/$catg/$varo/".$row1['new_id']."'  data-size='large'><i class='fa fa-twitter twiter'></i></a></li>
";//            <li><a href='#' title='linkdin' ><i class='fa fa-linkedin linkdin'></i></a></li>
echo"
<li><a href='https://plus.google.com/share?url=https://newzworm.com/$catg/$varo/".$row1['new_id']."' target='_blank' onclick='javascript:window.open(this.href);return false;'><img src='https://www.gstatic.com/images/icons/gplus-32.png' alt='Share on Google+'/></a></li>
</ul>
</div>

</div>";
?>

<?php
if(isset($_POST['commentSubmit'])){
	$comment=$_POST['comment'];
	$date=date('d:m:Y');
	$time=date('h:i:A');
	if(isset($_SESSION['name'])){
		$name=$_SESSION['name'];
	}else{
		$name='unknown';
	}
	$news=$var;
	$que12=$conn->query("insert into review (comment,date,time,name,news) values('$comment','$date','$time','$name','$news')");
}
?>
<div class='clearfix'></div>
<hr style='margin:5px'/>
<div class='row feeling'>
<div  class='col-lg-12'>
<form class='form-group' action='' method='post'>
<textarea required class='input-group' style='width:100%' name='comment' Placeholder='Comment Here...'></textarea><br/>
<button type='submit' name='commentSubmit' class='btn btn-primary pull-right'>Comment</button>
</form>
</div>
<div class='clearfix'></div>
<?php 
$quw=$conn->query("select * from review where news='".$var."'");

if($quw->num_rows>0){
while($rwo=$quw->fetch_assoc()){
 ?>
<hr style='margin:3px;border-color:#000;'/>
<div  class='col-lg-2'>
<img src='../../m/add/user.png' style=''class='img-responsive'>
</div>
<div  class='col-lg-10'>
<div class='comment-user'><?php echo $rwo['name'];?></div>
<div class='comment-content text-justify'><?php echo $rwo['comment'];?></div>
</div>

<div class='clearfix'></div>
<?php }
} ?>
</div>

</div>
</div>
<div class="col-lg-3 col-xs-12 col-sm-3">
<div class="panel row">
<div class="panel-body pad0">
<ul class="vertical-slide">
<?php
$que2 = $conn->query("SELECT * from news_update where (categoury like '$row1[6]%') and (new_id != ".$row1[0].") order by new_id DESC limit 0,14");
while($row2 = $que2->fetch_assoc())
{
echo "<li class='news-item'>";
$catg=str_replace(" ","-",$row2['categoury']);
$varo=str_replace(" ","-",$row2['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='../".$varo."/".$row2['new_id']."'>
<span class='$gh1'>".$row1['categoury']."</span>
<img src='../../m/".$row2['image_url']."' class='img-responsive' alt='' />
<p>".$row2['new_title']."</p></a></li>";
}
?>

</ul>
</div>
<div class="panel-footer text-center padd0"> </div>
</div>
</div>
<div class="col-lg-2 col-xs-12 col-sm-2">
<a href="https://skillizen.com/" target="_blank" class="new-add"><img src="../../add/skillizen.jpg" class="img-add" alt="" title=""/></a><br>
<a href="http://iskillsolympiad.com/" target="_blank" class="new-add"><img src="../../add/olympiad1.jpg" class="img-add" alt="International Life Skills Olympiad" title="International Life Skills Olympiad"/></a>
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
$que3 = $conn->query("SELECT * from news_update where categoury like 'WORLD%' order by rand()");
$row3 = $que3->fetch_assoc();
echo "<li>";

$catg=trim($row3['categoury']);
$varo=str_replace(" ","-",$row3['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='../../$catg/".$varo."/".$row3['new_id']."'>
<span class='world-tag'>".$row3['categoury']."</span>
<img src='../../m/".$row3['image_url']."' class='img-responsive' alt=''/>
<div class='overlay'><p>".$row3['new_title']."</p></div></a>
</li>";
}
?>
<?php
if($vmp1!='LIF')
{
$que4 = $conn->query("SELECT * from news_update where categoury like 'LIFE%' order by rand()");
$row4 = $que4->fetch_assoc();
echo "
<li>";
$catg=trim($row4['categoury']);
$varo=str_replace(" ","-",$row4['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='../../$catg/".$varo."/".$row4['new_id']."'>
<span class='life-tag'>".$row4['categoury']."</span>
<img src='../../m/".$row4['image_url']."' class='img-responsive' alt=''/>
<div class='overlay'><p>".$row4['new_title']."</p></div></a>
</li> ";
}
?>
<?php
if($vmp1!='SPO')
{
$que5 = $conn->query("SELECT * from news_update where categoury like 'SPORTS%' order by rand()");
$row5 = $que5->fetch_assoc();
echo "<li>";
$catg=trim($row5['categoury']);
$varo=str_replace(" ","-",$row5['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='../../$catg/".$varo."/".$row5['new_id']."'>
<span class='sport-tag'>".$row5['categoury']."</span>
<img src='../../m/".$row5['image_url']."' class='img-responsive' alt=''/>
<div class='overlay'><p>".$row5['new_title']."</p></div></a>
</li> ";
}
?>
<?php
if($vmp1!='GOO')
{
$que6 = $conn->query("SELECT * from news_update where categoury like 'GOOD NEWS%' order by rand()");
$row6 = $que6->fetch_assoc();
echo "
<li>";
$catg='GOOD-NEWS';
$varo=str_replace(" ","-",$row6['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='../../$catg/".$varo."/".$row6['new_id']."'>
<span class='good-tag'>".$row6['categoury']."</span>
<img src='../../m/".$row6['image_url']."' class='img-responsive' alt=''/>
<div class='overlay'><p>".$row6['new_title']."</p></div></a>
</li> ";
}
?>
<?php
if($vmp1!='ENT')
{
$que7 = $conn->query("SELECT * from news_update where categoury like 'ENTERTAINMENT%' order by rand()");
$row7 = $que7->fetch_assoc();;
echo "
<li>";
$catg=trim($row7['categoury']);
$varo=str_replace(" ","-",$row7['new_title']);
echo "<a href='../../$catg/".$varo."/".$row7['new_id']."'>
<span class='enter-tag'>".$row7['categoury']."</span>
<img src='../../m/".$row7['image_url']."' class='img-responsive' alt=''/>
<div class='overlay'><p>".$row7['new_title']."</p></div></a>
</li> ";
}
?>
<?php
if($vmp1!='TRE')
{
$que8 = $conn->query("SELECT * from news_update where categoury like 'TRENDING%' order by rand()");
$row8 = $que8->fetch_assoc();
echo "
<li>";
$catg=str_replace(" ","-",$row8['categoury']);
$varo=str_replace(" ","-",$row8['new_title']);
$varo=str_replace("?","",$varo);
echo "<a href='../../$catg/".$varo."/".$row8['new_id']."'>
<span class='trand-tag'>".$row8['categoury']."</span>
<img src='../../m/".$row8['image_url']."' class='img-responsive' alt=''/>
<div class='overlay'><p>".$row8['new_title']."</p></div></a>
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

<script src='../../js/min.js'></script>
<script src="../../js/jquery.bootstrap.newsbox.js"></script>
<script src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
<script src="../../js/bootstrap.min.js"></script>

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
$date=date('d:m:Y');
$time=date('H:i A');
$query=$conn->query("select * from track_report where `ip`='".$ipaddress."'");
if($query->num_rows==0){
$query1=$conn->query("INSERT INTO track_report (ip,date,datet,device) VALUES('".$ipaddress."','$date','$time', 'DESKTOP')");
}


if(isset($_GET['viewid'])){
$viewid=$_GET['viewid'];
$query=$conn->query("select * from news_update where new_id='$viewid'");
$row=$query->fetch_assoc();
$cat=$row['categoury'];
$cat=strtoupper($cat);
$cat=trim($cat);
switch($cat){
case "WORLD":
$q=$conn->query("SELECT * from track_report where ip='".$ipaddress."'");
$r=$q->fetch_assoc();
$clicks=$r['world'];
$clicks=$clicks+1;
$qe=$conn->query("UPDATE track_report set world='$clicks' , date='$date', datet='$time' where ip='".$ipaddress."'");
break;

case "ENTERTAINMENT":
$q=$conn->query("SELECT * from track_report where ip='".$ipaddress."'");
$r=$q->fetch_assoc();
$clicks=$r['entertainment'];
$clicks=$clicks+1;
$qe=$conn->query("UPDATE track_report set entertainment='$clicks', date='$date', datet='$time' where ip='".$ipaddress."'");
break;

case "LIFE":
$q=$conn->query("SELECT * from track_report where ip='".$ipaddress."'");
$r=$q->fetch_assoc();
$clicks=$r['life'];
$clicks=$clicks+1;
$qe=$conn->query("UPDATE track_report set life='$clicks', date='$date', datet='$time' where ip='".$ipaddress."'");
break;

case "GOOD NEWS":
$q=$conn->query("SELECT * from track_report where ip='".$ipaddress."'");
$r=$q->fetch_assoc();
$clicks=$r['good_news'];
$clicks=$clicks+1;
$qe=$conn->query("UPDATE track_report set good_news='$clicks', date='$date', datet='$time' where ip='".$ipaddress."'");
break;

case "SPORTS":
$q=$conn->query("SELECT * from track_report where ip='".$ipaddress."'");
$r=$q->fetch_assoc();
$clicks=$r['sports'];
$clicks=$clicks+1;
$qe=$conn->query("UPDATE track_report set sports='$clicks', date='$date', datet='$time' where ip='".$ipaddress."'");
break;

case "TRENDING":
$q=$conn->query("SELECT * from track_report where ip='".$ipaddress."'");
$r=$q->fetch_assoc();
$clicks=$r['trending'];
$clicks=$clicks+1;
$qe=$conn->query("UPDATE track_report set trending='$clicks', date='$date', datet='$time' where ip='".$ipaddress."'");
break;
}
}

$query=$conn->query("select * from track_report where ip='$ipaddress' ");
$row=$query->fetch_assoc();
$datte=trim($row['date']);
$date=trim($date);
if($datte!=$date){
$quer=$conn->query("update track_report set sub_clicks=0 where ip='$ipaddress' ");	
}
$sec=$row['clicks'];
$sec=$sec+1;
$subclick=$row['sub_clicks'];
if(!$_SESSION['value']){
if($subclick==4){ ?>

<div style='position:fixed;bottom:0px;width:;padding:10px;font-size:18px;background:black;z-index:1;color:white;' class='container text-center'>
<b>You have one free Article left. </b>Get UNLIMITED access for only $9.99 per year.<b style='font-size:20px;'> <a style='color:#fff;' href='../../DigitalSubscription.php'>Subscribe Now</a></b>
</div>
<?php }elseif($subclick==5){ ?>
<div style='position:fixed;bottom:0px;width:;padding:10px;font-size:18px;background:black;z-index:1;color:white;' class='container text-center'>
<b>This is your last free article </b>Get UNLIMITED access for only $9.99 per year <b style='font-size:20px;'> <a style='color:#fff;' href='../../DigitalSubscription.php'>Subscribe Now </a></b>
</div>

<?php }elseif($subclick>=6){
	?>
<div style='position:fixed;bottom:0px;width:;padding:10px;font-size:18px;background:black;z-index:1;color:white;' class='container text-center'>
Get UNLIMITED access for only $9.99 per year <b style='font-size:20px;'> <a style='color:#fff;' href='../../DigitalSubscription.php'>Subscribe Now </a></b>
</div>
<?php
echo '<script>window.location.href="../../DigitalSubscription.php"</script>';
}
$subclick=$subclick+1;
}
$query=$conn->query("update track_report set clicks='$sec',sub_clicks='$subclick' where ip='$ipaddress'");

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
<li><a href="../../archive.php">Archives</a></li>
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
$que41 = $conn->query("SELECT email FROM subscriber WHERE email='$semail'");
$row41 = $que41->num_rows;

if($row41>0) {
setcookie("subscribe","done",time()+24*60*60*31);
$emailErr = "$semail Already Subscribed";
$email = $semail;
echo "<script type='text/javascript'>alert('$emailErr');</script>";
}

if($emailErr=="")
{
date_default_timezone_set("Asia/Kolkata");
$sdate   	=  date("d:M:Y");
$stime 		= date("h:i:A");
$que1 = $conn->query("insert into subscriber (email) values('".$semail."')");

if($que1){
setcookie('subscribe','done',time()+24*60*60*31);
$submes = "Thanks For Subscription";
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
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-90186894-1', 'auto');
ga('send', 'pageview');
</script>
</footer>

<div id='overlay'></div>
<div id='subs' class='text-center' style='background:#fff;width:600px;border:2px solid #ccc;border-radius:10px;padding:20px'>
<div class='row'>
<i class='fa fa-times pull-right clos' id='clos' style='padding-right:20px;'></i>
<div class='col-lg-6' style='border-right:2px solid #ccc;'>
<img src='../../img/newspaper.jpg' alt='Newspaper' height='150px'/>
</div>
<div class='col-lg-6'style='padding-top:20px;'>
<img src='../../img/newzworm.png' alt='Digital access' class='img-responsive'/>
</div>
</div>
<div class='row'>
<div class='col-lg-6' style='border-right:2px solid #ccc;'>
<br/><b>Home Delivery</b><sub>(India only)</sub><br/>
<i class='fa fa-inr'></i>449 for the first 6 months
</div>
<div class='col-lg-6'>
<br/><b>Digital access</b><br/>
Save 50% off the regular rate
</div>
</div>
<div class='row'>
<div class='col-lg-6' style='border-right:2px solid #ccc;'>
<br/><a href='../../subscribe' class='btn btn-success btn-sm'>Subscribe</a>
</div>
<div class='col-lg-6'>
<br/><a href='../../DigitalSubscription.php' class='btn btn-success btn-sm'>Subscribe</a>
</div>
</div>
<div class='row text-center'><br/>Already a subscriber? <a>Sign In</a></div>
</div>

<!-- jQuery -->
<!-- End outer wrapper -->

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

$(".up2").hide();
}else{
$(".up2").show();
$(".up1").hide();
$(".down1").show();
$(".down2").hide();

}
});

$(".volume-buttonn").click(function(){
if($(".down1").css("display")=="none"){
$(".down1").show();

$(".up1").hide();
}else{
$(".up1").show();
$(".up2").hide();
$(".down1").hide();
$(".down2").show();

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
$('.wordmeaning').click(function(event){
var wor = $(this).attr("title");
$.post("../../ajax/meaning.php",{wor:wor},function(data){
$('#popup').css('left',event.pageX);      // <<< use pageX and pageY
$('#popup').css('top',event.pageY + 15);
$('#popup').css('display','inline');
$('#popup').css('display','inline');
$('#popupoverlay').css('display','inline');
$("#popup").css("position", "absolute");  // <<< also make it absolute!
$("#popupbody").html(data);
});
});

$('.terminology').click(function(event){
var wor = $(this).attr("title");
$.post("../../ajax/terminology.php",{wor:wor},function(data){
$('#popupt').css('left',event.pageX);      // <<< use pageX and pageY
$('#popupt').css('top',event.pageY + 15);
$('#popupt').css('display','inline');
$('#popupt').css('display','inline');
$('#popupoverlay').css('display','inline');
$("#popupt").css("position", "absolute");  // <<< also make it absolute!
$("#popuptbody").html(data);
});
});

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
$("#popupt").click(function(){
$('#popupoverlay').hide();
$("#popupt").hide({width:0,height:0},1500);
});
$("#popupoverlay").click(function(){
$('#popupoverlay').hide();
$("#popup").hide({width:0,height:0},1500);
$("#popupt").hide({width:0,height:0},1500);
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
$('#distanc').html('About News Maker?');
$('#information').html("<h3><i class='fa fa-user'></i> <?php echo trim($row1['who'])?></h3>");
}else if(vaal=='what'){
$('#distanc').html('What Happened?');
$('#information').html("<h5><?php echo trim($row1[15]) ?><h5>");
}else if(vaal=='when'){
$('#distanc').html('When did it take Place?');
$('#information').html("<h3><?php echo trim($row1[21]) ?></h3>");
}
}
});
});
</script>

<?php
$quer3 =$conn->query("select * from country where name='$country'");
$row33=$quer3->fetch_assoc();

?>
<script>
$(document).ready(function(){
jQuery.getJSON("https://restcountries.eu/rest/v1/alpha/<?php echo $row33['alpha2']?>",function(a){
name=a.name;
callingCodes=a.callingCodes;
capital=a.capital;
region=a.region;
subregion=a.subregion;
population=a.population;
currencies=a.currencies;
timezones=a.timezones[0];
languages=a.languages[0];
$('.name').html("Country : " +name);
$('.callingCodes').html(" Calling Code : "+callingCodes);
$('.capital').html("Capital : "+capital);
$('.region').html("Region : "+region);
$('.subregion').html("Subregion : "+subregion);
$('.population').html("Population : "+population);
$('.currencies').html("currency : "+currencies);
$('.timezones').html("Time-Zone : "+timezones);
$('.languages').html("Languages : "+languages);
});
});
</script>

<script>
$(document).ready(function(){
$('#clos').click(function(){
$('#subs').css({display:'none'});
$('#overlay').css({display:'none'});
});
});
$(document).ready(function(){
$('#overlay').click(function(){
$('#subs').css({display:'none'});
$('#overlay').css({display:'none'});
});
});
$(document).ready(function(){
$('.himanshu').click(function(event){
$('#subs').css('right',"80px");      // <<< use pageX and pageY
$('#subs').css('top',event.pageY + 25);
$('#overlay').css({display:'block'});
$('#subs').css({display:'block'});
});
});
</script>

<script>
/* $(document).ready(function(){
setTimeout(function(){
$('.popup4').css('display','block');
$('.popup4').animate({'left':'350px'},1000);
},20000);
});
$('.closesubs').click(function(){
$('.popup4').css('display','none');
}); */
</script>
<script>
$(document).ready(function(){
$('.feel').mouseover(function(){
$(this).animate({'height':'55px'},100);
});
$('.feel').mouseout(function(){
$(this).animate({'height':'50px'},100);
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