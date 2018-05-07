<?php ob_start();
/*  if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
$redirect = 'https://www.' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
header('HTTP/1.1 301 Moved Permanently');
header('Location: ' . $redirect);
exit();
}  */
include_once 'inc/configuration3.php';
include_once 'inc/configuration2.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>News world |  Contact Us</title>
<link rel="icon" href="image/favicon.ico" type="image/gif" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="m/css/style.min.css" rel="stylesheet" type="text/css">
<link href="m/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="m/css/css.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet"></head>
<body>
<!--Header Start Here-->
<?php include "header.php"; ?>
<div class="container">
<div class="row">
<div class="col-lg-12 col-xs-12 col-sm-12">
<!--<div class="text-center">
<h3 class="newzhead1" >Contact Us Today!</h3>
</div> -->
<div class="contct-box clearfix panel panel-default">
<div class="col-md-6">
<h3 class="page-heading"><span>Address</span></h3>
<address>
<ul>
<li><strong>  Skillizen Learning Solutions Pvt. Ltd.</strong></li>
<li>C-402, 4th Floor, Nirvana Courtyard </li>
<li>Nirvana Country, Sec 50 </li>
<li>Gurgaon, Haryana 122018 </li>
<li>Phone: +91 124 4011681</li>
<li>Email: info@newzworm.com </li>
</ul>
</address>
</div>
<?php
/*$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
echo '<a href="' . $escaped_url . '">' . $escaped_url . '</a>';*/
/*$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
echo $actual_link;*/
?>
<div class="col-md-6">
<h3>Query Form</h3>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $numberErr = "";
$name = $email = $number = $comment = $message = $query_massege = "";
$mess="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
if(isset($_POST["query_submit"]))
{
if (empty($_POST["name"]))
{
$nameErr = "Name is required";
}
else
{
$name = test_input($_POST["name"]);
// check if name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$name))
{
$nameErr = "* Only letters and white space allowed";
}
}
if (empty($_POST["email"]))
{
$emailErr = "Email is required";
}
else
{
$email = test_input($_POST["email"]);
// check if e-mail address is well-formed
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
$emailErr = "* Invalid email format";
}
}
if (empty($_POST["number"]))
{
$numberErr = "contact number is required";
}
else
{
$number = test_input($_POST["number"]);
// check if name only contains letters and whitespace
if (!preg_match("/^[0-9 +-]*$/",$number)) {
$numberErr = "* Only numbers allowed";
}
}
if (empty($_POST["comment"])) {
$comment = "";
} else {
$comment = test_input($_POST["comment"]);
}
}
}
if(isset($_POST["query_submit"]))
{

$query_name    =$_POST["name"];
$query_email   =$_POST["email"];
$query_number  =$_POST["number"];
$query_massege  =$_POST["message"];
date_default_timezone_set("Asia/Kolkata");
$qdate   		 = date("d:M:Y");
$qtime 		 = date("h:i:A");

if($nameErr=="")
{
if($emailErr=="")
{
if($numberErr=="")
{
$s="insert into query_form (name,email,phone_number,message,qdate,qtime) values('".$query_name."','".$query_email."','".$query_number."','".$query_massege."','".$qdate."','".$qtime."')";
if($conn->query($s))
{ $mess = "Thanks For The Feedback, We Will Get Back To You Very Soon.";
echo "<script type='text/javascript'>alert('$mess');</script>";	}
else{
echo mysqli_error();
}}
}}}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>
<small class="text-success"><?php echo $mess; ?></small>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<span class="text-danger"><?php echo $nameErr;?></span>
<div class="form-group">
<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

<input type="text" name="name" maxlength="20" class="form-control" required placeholder="Name" value="<?php echo $name;?>">
</div>
</div>
<span class="text-danger"><?php echo $emailErr;?></span>
<div class="form-group">
<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
<input type="text" name="email" maxlength="30" class="form-control" required placeholder="Email Address"  value="<?php echo $email;?>" />
</div>
</div>

<!-- Text input-->
<span class="text-danger"><?php echo $numberErr;?></span>
<div class="form-group">
<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
<input type="text" name="number" maxlength="21" class="form-control" required placeholder="Contact Number" value="<?php echo $number;?>" />
</div>
</div>
<div class="form-group">
<div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
<textarea name="message" maxlength="1000" id="message" required class="form-control" placeholder="Write messages here..."><?php echo $query_massege;?></textarea><?php echo $comment;?>
</div>
</div>
<!-- Success message -->
<!-- Button -->
<div class="form-group">
<button type="submit" class="btn login-gredint" name="query_submit" >Send <span class="glyphicon glyphicon-send"></span></button>
</div>
</form>
</div>
</div>
<iframe class="map-frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3509.1628870221207!2d77.06273962508935!3d28.414341486350196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d227acda0d06b%3A0xc3331c02dbd6cc0b!2sNirvana+courtyard!5e0!3m2!1sen!2sin!4v1475216288958"></iframe>
</div>
</div>
</div>
<?php include "footer.php"; ?>

</body>
</html>
<?php ob_flush(); ?>