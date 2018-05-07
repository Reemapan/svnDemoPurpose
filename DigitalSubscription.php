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
<h3 class="page-heading"><span>Choose Your Digital Subscription Offer</span> </h3>
<div class='clearfix'></div>
<?php 
if(isset($_GET['add_to_baskit'])){
	if($_GET['add_to_baskit']=='oneyear'){
	$_SESSION['deal']= '9.99';
	}elseif($_GET['add_to_baskit']=='sixmonth'){
	$_SESSION['deal']= '5.99';
	}elseif($_GET['add_to_baskit']=='onemonth'){
	$_SESSION['deal']= '1.99';	
	}
?>
<br/>
<form action='' method='post'>
<div class="col-lg-12 col-xs-12 col-sm-12">
<h3>Subscriber Details</h3>
</div>
<div class="col-lg-4 col-xs-4 col-sm-4">
<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn "><i class='fa fa-usd' style='font-size:20px;'></i></label>
<input type="text" class="form-control" value='<?php echo $_SESSION['deal']?>' disabled>
</div>
</div>

<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-envelope"></label>
<input type="text" class="form-control"  placeholder="Enter Your User name" name="NLname" required/>
</div>
</div>

<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-phone"></label>
<input type="password" class="form-control"  placeholder="Enter Your password" name="NLpassword" required/>
</div>
</div>

<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-time"></label>
<input type="date" class="form-control"  placeholder="Enter Your Age" name="NLage" required/>
</div>
</div>

</div>
<div class="col-lg-4 col-xs-4 col-sm-4">

<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-user"></label>
<input type="text" class="form-control"  placeholder="Enter Your Parents Name" name="NLpname" required/>
</div>
</div>

<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-envelope"></label>
<input type="email" class="form-control"  placeholder="Enter Your Email" name="NLemail" required/>
</div>
</div>

<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-phone"></label>
<input type="number" class="form-control"  placeholder="Enter Your Mobile" name="NLmobile" required/>
</div>
</div>

<div class="form-group">
<div class="input-group">
<label class="input-group-addon icon-btn glyphicon glyphicon-bell"></label>
<input type="text" class="form-control"  placeholder="Subscription Code" name="NLsubscribe"/>
</div>
</div>

</div>
<div class="col-lg-4 col-xs-4 col-sm-4">
<img src='img/newzworm.png' class='img-responsive'/>
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

if($_POST['NLsubscribe']=='ILSO17SUB1855'){

   if($_SESSION['deal']==9.99){

         $quer = $conn->query("Select * from nluser where email='".$_POST['NLemail']."'");


         if($quer->num_rows==0){
         $payment=1;
         $quer1 = $conn->query("insert into nluser (name, parents_name, dob, email, mobile, password, plan,payment) values('".$_POST['NLname']."','".$_POST['NLpname']."','".$_POST['NLage']."','".$_POST['NLemail']."','".$_POST['NLmobile']."','".$_POST['NLpassword']."','".$_SESSION['deal']."','".$payment."'
	)");


              if($quer1){
                   echo $_SESSION['student_name']=$_POST['NLname'];
                   echo $_SESSION['parent_email']=$_POST['NLemail'];
                   echo $_SESSION['parent_name']=$_POST['NLpname'];


                    if($_SESSION['deal']!=0){
                          echo"<script>window.location.href='registeredsuccessfully.php?student_name=".$_SESSION['student_name']."&parent_email=".$_SESSION['parent_email']."&parent_name=".$_SESSION['parent_name']."'</script>";
                                            }

                     echo "<h2>Congrats</h2>";

                         }


             else{
                  echo "failed";
                 }


                 }
                 else{
                     echo "<script>alert('Email id Already Exist')</script>";
                     }
                  



             }


            else{
            echo '<script>alert("The subscription code is valid only for 1 year Digital Subscription plan only")</script>';
             }


}


else if($_POST['NLsubscribe']!=''&&$_POST['NLsubscribe']!='ILSO17SUB1855'){
 echo '<script>alert("The Subscription code you have filled in wrong")</script>';
}



else if($_POST['NLsubscribe']==''){
	
	$quer = $conn->query("Select * from nluser where email='".$_POST['NLemail']."'");
if($quer->num_rows==0){
$quer1 = $conn->query("insert into nluser (name, parents_name, dob, email, mobile, password, plan) values('".$_POST['NLname']."','".$_POST['NLpname']."','".$_POST['NLage']."','".$_POST['NLemail']."','".$_POST['NLmobile']."','".$_POST['NLpassword']."','".$_SESSION['deal']."'
	)");
	if($quer1){
		$_SESSION['student_name']=$_POST['NLname'];
		$_SESSION['parent_email']=$_POST['NLemail'];
		$_SESSION['parent_name']=$_POST['NLpname'];
			echo"<script>window.location.href='payment.php?student_name=".$_SESSION['student_name']."&parent_email=".$_SESSION['parent_email']."&parent_name=".$_SESSION['parent_name']."'</script>";	
		echo "congrats";
	}else{
		echo "failed";
	}
}else{
echo "<script>alert('Email id Already Exist')</script>";
}
}
}
?>

<?php } else{
?>
<center>
<div class='row'>
<div class='col-lg-12 text-center'>
<table  style='width:100%;text-align:center;'border='2px'>
<tr HEIGHT='50PX;'><td><h2>Price</h2></td><td><h2>News</h2></td><td><h2>Saving</h2></td><td><h2>Duration</h2></td><td><h2>Payment</h2></td><td></td></tr>
<tr HEIGHT='80PX;'><td>FREE</td><td>3-News Daily</td><td>100%</td><td>1day</td><td>Payment</td><td></td></tr>
<tr HEIGHT='80PX;'><td>$1.99</td><td>Unlimited </td><td>30%</td><td>1 Month</td><td>Debit/Credit Card</td><td><form method='get' action=''><button type='submit' name='add_to_baskit' value='onemonth' class='btn btn-danger btn-lg'>add to basket <i class='fa fa-shopping-cart'></i> </button></form></td></tr>
<tr HEIGHT='80PX;'><td>$5.99</td><td>Unlimited</td><td>40%</td><td>6 Month</td><td>Debit/Credit Card</td><td><form method='get' action=''><button type='submit' name='add_to_baskit' value='sixmonth' class='btn btn-danger btn-lg'>add to basket <i class='fa fa-shopping-cart'></i> </button></form></td></tr>
<tr HEIGHT='80PX;'><td>$9.99</td><td>Unlimited</td><td>70%</td><td>1 Year</td><td>Debit/Credit Card</td><td><form method='get' action=''><button type='submit' name='add_to_baskit' value='oneyear' class='btn btn-danger btn-lg'>add to basket <i class='fa fa-shopping-cart'></i> </button></form></td></tr>
</table>
</div>
</div>
<div class='clearfix'></div>
</center>
<?php } ?>
</div>
</div>
</div>
</div>

<?php include "footer.php"; ?>
</body>
</html>
<?php ob_flush(); ?>