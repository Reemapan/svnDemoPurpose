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
include_once 'inc/configuration3.php';
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

$query=$conn->query("select * from track_report where ip='$ipaddress' ");
$row=$query->fetch_assoc();
$sec=$row['login_attempt'];
$sec=$sec+1;
$query=$conn->query("update track_report set login_attempt='$sec' where ip='$ipaddress'");
$quer=$conn->query("select * from user_registration where user_email='".$regemail."' ");
$rquer=$quer->num_rows;
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
$Err = "Your Email-Id or Password is wrong";
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
<span id="google_translate_element" class='hidden'></span>
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

    <div class="col-md-4 col-xs-12 col-lg-3 col-sm-4">
<div class="logo"> <a href="index.php" class="page-scroll"><img src="img/logodemo.png" alt="Newzworm" /></a> </div>
</div>
    
<div class=" hidden-md hidden-xs col-lg-3 hidden-sm">
<form action='search.php' method='get'>
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
<div class="col-md-4 col-xs-12 col-lg-3 col-sm-4">
<div class="main-search">
<span>
<button class='btn btn-default himanshu'>Newzworm Prime</button>
<!--<a href='subscribe.php' class='btn btn-danger'>Subscribe</a>-->
<a href='#weath' data-toggle='modal' class='btn btn-info'><span><i class='fa fa-cloud' aria-hidden='true'></i> <span class='temp'></span></span></a>
<a href='https://www.newzworm.com/'  class="btn" id='login-gredint' style='background-color:#f10d0d;'color type="submit"><i class="fa fa-home"></i></a>    
</span>
</div>
</div>

<div class="col-md-4 col-xs-12 col-lg-3 col-sm-4">
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
<!--<a href="index.php" class="btn pull-right hidden-xs login-gredint"><i class="fa fa-home home-ic"></i></a>

</div>

</div>-->

</div>
</div>
    <div class=" hidden col-md-1 col-xs-1 col-lg-1 col-sm-1">
    <img src='img/harvard.png' style="margin-top:5px" class='img-responsive'>
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
<input type="email" class="form-control"  placeholder="Enter Your Email" name="userid">
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
<div class="md-hidden">
<div class="row text-center sign-with">
<div class="col-md-12">
<!--<h3>Login Using</h3>-->
</div>
<div class='row'>
<div class="col-md-12 col-xs-12 col-sm-12">
</div></div>
<div class='row'>
<div class="col-md-12">
<?php
if(!isset($_SESSION['value'])){
if(!isset($_GET['state'])){
//include_once 'gp.php';
}
echo "<br>";
//include_once 'fbb/index.php';
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
if($query->num_rows($re)==1)
{
$row51 = $re->fetch_assoc();
$to = $femail;
$subject = "Password Recovery to Newzworm account";

$message = "<div style='background-color:#ddd;padding:10px;'>
<img src='https://www.newzworm.com/img/logodemo.png' width='200px' height='50px'>
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

echo "<li><a class='page-scroll' href='../../".$cat1."/1'><img src='https://www.newzworm.com/image/allnews.png' alt='All news' class='img-responsive' /> All news </a></li>
<li><a class='catactive' href='".$cat1."/1'><img src='https://www.newzworm.com/image/world.png' alt='world news' class='img-responsive' /> World</a></li>
<li><a class='catactive' href='".$cat2."/1'><img src='https://www.newzworm.com/image/life.png' alt='life news' class='img-responsive' /> Life</a></li>
<li><a class='catactive' href='".$cat3."/1'> <img src='https://www.newzworm.com/image/sport.png' alt='sport news' class='img-responsive'/>Sports </a></li>
<li><a class='catactive' href='".$cat4."/1'><img src='https://www.newzworm.com/image/skillzen.png' alt='Good news' class='img-responsive' /> Good News </a></li>
<li><a class='catactive' href='".$cat5."/1'> <img src='https://www.newzworm.com/image/fun.png' alt='Entertainment news'  class='img-responsive' /> Entertainment</a></li>
<li><a class='catactive' href='".$cat6."/1'><img src='https://www.newzworm.com/image/trading.png' alt='Trending news'  class='img-responsive' /> Trending</a></li>";
?>
</ul>
</div>
</div>
</nav>
<!--category ends here-->