<?php ob_start();
/* if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
$redirect = 'https://www.' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
header('HTTP/1.1 301 Moved Permanently');
header('Location: ' . $redirect);
exit();
}  */
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>News world | Newsletter</title>
<link rel="icon" href="image/favicon.ico" type="image/gif" sizes="16x16">
<meta https-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="m/css/style.min.css" rel="stylesheet" type="text/css">
<link href="m/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="m/css/css.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet"></head>
<body>
<?php include "header.php"; ?>
<div class="container">
<br>
<div class="row">
<div class="col-lg-12 col-xs-12 col-sm-12">
<div class="news-box clearfix panel panel-default panel-body">
<h3 class="page-heading"><span>Choose Your Newspaper Subscription Offer</span> </h3>
<div class='clearfix'></div>
<?php
if(isset($_GET['add_to_baskit'])){
if($_GET['add_to_baskit']=='sixmonth'){
$_SESSION['deal']= '449';
}elseif($_GET['add_to_baskit']=='oneyear'){
$_SESSION['deal']= '799';
}else{
	$_SESSION['deal']= '0';
}
?>

<br/>
<form action='' method='post'>
<div class="col-lg-4 col-xs-4 col-sm-4">
<h3>Subscriber Details</h3>

<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn "><i class='fa fa-inr' style='font-size:20px;'></i></label>
<input type="text" class="form-control" value='<?php echo $_SESSION['deal']?>' disabled>
</div>
</div>

<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-user"></label>
<input type="text" class="form-control"  placeholder="Enter Your Name" name="NLname" required/>
</div>
</div>

<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-user"></label>
<input type="text" class="form-control"  placeholder="Enter Your Parents Name" name="NLpname" required/>
</div>
</div>

<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-time"></label>
<input type="date" class="form-control"  placeholder="Enter Your Age" name="NLage"/>
</div>
</div>
<div class="form-group">
<div class="input-group text-center">
<label class="input-group-addon icon-btn glyphicon glyphicon-user"></label>
<b>	Boy <input type="radio" class="radio-bt"  placeholder="Enter Your Gender" value='boy' name="NLgender">
Girl <input type="radio" class="radio-bt"  placeholder="Enter Your Gender" value='girl' name="NLgender" checked>
</b></div>
</div>

<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-envelope"></label>
<input type="text" class="form-control"  placeholder="Enter Your User name" name="NLusername" required/>
</div>
</div>

<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-phone"></label>
<input type="password" class="form-control"  placeholder="Enter Your password" name="NLpassword" required/>
</div>
</div>

</div>
<div class="col-lg-4 col-xs-4 col-sm-4">
<h3>Mailing Details</h3>

<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-envelope"></label>
<input type="email" class="form-control" placeholder="Enter Your Email" name="NLemail" required/>
</div>
</div>

<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-phone"></label>
<input type="number" class="form-control" placeholder="Enter Your Mobile" name="NLmobile" required/>
</div>
</div>

<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-road"></label>
<textarea class="form-control"  rows='3' placeholder="Enter Your address" name="NLaddress" required>
</textarea>
</div>
</div>
<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-bookmark"></label>
<input type="text" class="form-control"  placeholder="Enter Your Town/city" name="NLcity" required/>
</div>
</div>
<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-bookmark"></label>
<input type="text" class="form-control"  placeholder="Enter Your Country" name="NLcountry" required/>
</div>
</div>
<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-share-alt"></label>
<input type="text" class="form-control"  placeholder="Enter Your Postal Code" name="NLcode" required/>
</div>
</div>

</div>
<div class="col-lg-4 col-xs-4 col-sm-4">
<img src='img/newspaper.jpg' class='img-responsive'/>
</div>
<div class='col-lg-12'>
<div class="form-group">
<div class="input-group">
<button type="submit" class="btn btn-danger btn-lg" name="NLsubmit">Submit <i class='fa fa-paper-plane' aria-hidden='true'></i></button>
</div>
</div>
</div>
</form>
<?php
if(isset($_POST['NLsubmit'])){
error_reporting(E_ALL);

date_default_timezone_set("Asia/Kolkata");
$date= date("d-m-Y");
if($_SESSION['deal']==799){
	$month=12;
	$total_issue=52;
}else{
	$month=6;
	$total_issue=26;
}

$quer1=$conn->query("Select * from nluser where email='".$_POST['NLemail']."'");
if($quer1->num_rows>=1){

echo $_SESSION['student_name']=$_POST['NLname'];
echo $_SESSION['parent_email']=$_POST['NLemail'];
echo $_SESSION['parent_name']=$_POST['NLpname'];

if($_SESSION['deal']!=0){
echo"<script>window.location.href='paymentof.php?student_name=".$_SESSION['student_name']."&parent_email=".$_SESSION['parent_email']."&parent_name=".$_SESSION['parent_name']."'</script>";
}
}else{
$quer = $conn->query("insert into nluser (name, parents_name, dob, gender, email, mobile, address, city, country, code, plan,password, start_date,month,total_issue,user_name) values('".$_POST['NLname']."',
'".$_POST['NLpname']."',
'".$_POST['NLage']."',
'".$_POST['NLgender']."',
'".$_POST['NLemail']."',
'".$_POST['NLmobile']."',
'".$_POST['NLaddress']."',
'".$_POST['NLcity']."',
'".$_POST['NLcountry']."',
'".$_POST['NLcode']."',
'".$_SESSION['deal']."',
'".$_POST['NLpassword']."',
'".$date."',
'".$month."',
'".$total_issue."',
'".$_POST['NLusername']."'
)");
if($quer){
echo $_SESSION['student_name']=$_POST['NLname'];
echo $_SESSION['parent_email']=$_POST['NLemail'];
echo $_SESSION['parent_name']=$_POST['NLpname'];
if($_SESSION['deal']!=0){
echo"<script>window.location.href='paymentof.php?student_name=".$_SESSION['student_name']."&parent_email=".$_SESSION['parent_email']."&parent_name=".$_SESSION['parent_name']."'</script>";
}
echo "<h2>Congrats</h2>";
}else{
echo "failed";
}
}
}
?>

<?php } else{
?>
<center>
<div class='col-lg-12'>
<a href='subscribe?add_to_baskit=freeCopy'class='btn btn-default' style='margin:10px'><h2>Order Free Copy</h2></a>
</div>
<div class='clearfix'></div>
<div class='col-lg-6'>
<div class='deal text-center'>

<h2>1 Year</h2>
<hr/>Best Deal <i class='fa fa-check dealcheck'></i><hr>
52 Issues <i class='fa fa-check dealcheck'></i><hr>
&nbsp;<br>
<i class='fa fa-inr'></i> 799 <hr/>
<form method='get' action=''>
<button type='submit' name='add_to_baskit' value='oneyear' class='btn btn-danger btn-lg'>add to basket <i class='fa fa-shopping-cart'></i> </button>
</form>
</div>
</div>
<div class='col-lg-6'>
<div class='deal text-center'>
<h2>6 Months</h2>
<hr/>
26 Issues <i class='fa fa-check dealcheck'></i><hr>
&nbsp;<br>
<i class='fa fa-inr'></i> 449<hr/>
<form method='get' action=''>
<button type='submit' name='add_to_baskit' value='sixmonth' class='btn btn-danger btn-lg'>add to basket <i class='fa fa-shopping-cart'></i> </button>
</form>
</div>
</div></center>
<?php } ?>
</div>
</div>
</div>
</div>

<?php include "footer.php"; ?>
</body>
</html>
<?php ob_flush(); ?>