<?php 
ob_start();
session_start();
$_SESSION['parent_name']=$_GET['parent_name'];
$_SESSION['student_name']=$_GET['student_name'];
$_SESSION['parent_email']=$_GET['parent_email'];
if(empty($_SESSION['student_name'])){ header('Location: index.php');}
include_once('inc/configuration1.php');
include_once('inc/configuration2.php');
function getRealIpAddr()
{
if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
{
$ip=$_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
{
$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}
else{
$ip=$_SERVER['REMOTE_ADDR'];
}

return $ip;
}

//$xmm = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getRealIpAddr());219.75.27.16 ,59.103.198.105 ,135.245.168.33
$xmm = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".getRealIpAddr());
//$xmm = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=122.162.27.100");

$currency3=$xmm->geoplugin_currencyCode ;
$cureny=$xmm->geoplugin_currencySymbol;
//$currency3='INR';
$c=$xmm->geoplugin_currencyConverter;

$t1="$";
$t2=$_SESSION['deal'];
$_SESSION['t2']=$t2;
/* if($t2==399){
$amountt=$t2;
}
elseif($t2==599){
$amountt=$t2;
} */
$amountt=$t2;

$country=$xmm->geoplugin_countryName;
$countip=$xmm->geoplugin_request;
//$total1 = round($c)* $amountt;
$total1 =  $amountt;
$total= round($total1,2);
$_SESSION['total']=$total;
$_SESSION['student_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Newzworm</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#popup{ display:none;}
#overlay{ display:none;}
</style>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/login-css.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<?php //include_once'inc/payment-header.php'?>

<!--Contact social media icon and contact form include_once start here -->
<?php //include_once'inc/media.php'?>
<!--Contact social media icon and contact form include_once end here -->
<!--What section -->
<section class="clearfix section-box  child-benfit" id="what-box">
<div class="container">
<div class="col-md-12 col-lg-12 form-group">
<div class="text-center">
<h1 class="pagesub-heading">You are almost done to get access to the newzworm Newsletter...</h1>
</div>

</div>
<div class="col-lg-12 col-sm-12">
<div class="payment-hader">
<h3><span>You Pay :</span> <span id="dollar_block" style="display:none;"><?php $currency2=$currency3;

if("AUD" ==$currency2) { echo $currency2.' '; echo $total;}  elseif("CAD" ==$currency2) { echo $currency2.' '; echo $total;}
elseif("EUR" ==$currency2) { echo $currency2.' '; echo $total;} elseif("GBP" ==$currency2) { echo $currency2.' '; echo $total; }
elseif("JPY" ==$currency2) { echo $currency2.' '; echo $total;} elseif("USD" ==$currency2) { echo $currency2.' '; echo $total;}
elseif("NZD" ==$currency2) { echo $currency2.' '; echo $total; } elseif("CHF" ==$currency2) {  echo $currency2.' '; echo $total;}
elseif("HKD" ==$currency2) { echo $currency2.' '; echo $total; }   elseif("SGD" ==$currency2) { echo $currency2.' '; echo $total;}
elseif("SEK" ==$currency2) { echo $currency2.' '; echo $total;} elseif("DKK" ==$currency2) {echo $currency2.' '; echo $total;}
elseif("PLN" ==$currency2) { echo $currency2.' '; echo $total; }  elseif("NOK" ==$currency2) { echo $currency2.' '; echo $total; }
elseif("HUF" ==$currency2) { echo $currency2.' '; echo $total;} elseif("CZK" ==$currency2) {echo $currency2.' '; echo $total; }
elseif("ILS" ==$currency2) { echo $currency2.' '; echo $total; } elseif("MXN" ==$currency2) {echo $currency2.' '; echo $total;}
elseif("BRL" ==$currency2) {  echo $currency2.' '; echo $total; }elseif("MYR" ==$currency2) {echo $currency2.' '; echo $total;}
elseif("PHP" ==$currency2) { echo $currency2.' '; echo $total;}elseif("TWD" ==$currency2) { echo $currency2.' '; echo $total;}
elseif("THB" ==$currency2) {  echo $currency2.' '; echo $total; } elseif("TRY" ==$currency2) {  echo $currency2.' '; echo $total;}
elseif("RUB" ==$currency2) {   echo $currency2.' '; echo $total; }else  {  echo $t1.' '; echo $t2;}

?></span>
<span id="rupes_block"><?php echo $cureny.' ' . $total; ?></span></h3>
</div>
<div class="panel panel-default panel-body">
<div class="col-md-6 col-xs-10 col-sm-10"><p class="info-font"><?php echo $_SESSION['student_name']; ?></p></div>
<div class="col-md-6 col-xs-2 col-sm-2"><p class="info-font"><?php echo $_SESSION['parent_name']; ?></p></div>
<div class="col-md-6 col-sm-6 col-xs-12"><p class="info-font"><?php echo $_SESSION['parent_email']; ?></p></div>
<div class="col-md-6 col-sm-6 col-xs-12"><p class="info-font">India</p></div>
<div class="clearfix"></div>
<hr/>
<form action="paypal_payment.php" method="post">
<div class="paypal-menu text-center">
<span class="pull-left mobile-left"><strong>PAY USING</strong></span>
<?php
echo '
<input type="radio" name="payment" id="payu" value="payu" class="radio-btn" checked="checked"  onclick="remove_price(\'dollar_block\',\'rupes_block\')" />
<label for="payu" class="css-label"> <img src="img/payyou.png" alt="Payu" /> </label>';?>

<!--<input type="radio" name="payment" id="paypal" value="paypal" class="radio-btn"   onClick="remove_price('rupes_block','dollar_block')"/>
<label for="paypal" class="css-label"  title = "Preferred By Global User" data-toggle="tooltip"> <img src="img/paypal.png" alt="paypal" /> </label>-->
</div>
<hr/>
<div class="text-center">
<button type="submit" name="payment_submit" class="process-pay btn"> Proceed to Payment</button>
<script>
function remove_price(id1,id2){

document.getElementById(id1).style.display="none";
document.getElementById(id2).style.display="inline-block";
}

</script>

</div>
</form>
<hr/>
<div class="payoption">
<img src="img/master.png" alt="master card" />
<img src="img/visa.png" alt="visa card" />
<img src="img/mastero.png" alt="mastero card" />
<!-- <img src="img/discover.png" alt="discover card" /> -->
<img src="img/american.png" alt="american card" />
<img src="img/net-banking.png" alt="net-banking" />
</div>
</div>
</div>
</div>

</section>

<!--Footer start here -->
<?php //include_once'inc/footer.php'?>
<!-- End outer wrapper -->
<script>
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();
});
</script>

</body>
</html>
