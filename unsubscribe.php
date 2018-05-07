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
<h3 class="page-heading"><span>Unsubcribe Your Newsletter</span> </h3>
<div class='clearfix'></div>
<div class='modal-dialog modal-md'>
<div class='modal-content'>
<div class='modal-header'>
<h3 class="page-heading text-center"><span>Enter Your Email</span> </h3>
</div>
<div class='modal-body' style='height:300px'>
<br/>
<form action='' method='post'>
<div class='col-lg-12 col-sm-12 col-md-12 text-center'>
<input type='email' class='form-control hei42' name='unemail'/><br/><br/>
</div>
<div class='col-lg-12 col-sm-12 col-md-12 text-center'>
<input type='submit' class='btn subcribe btn-lg' value='Unsubscribe' name='unsubmit'>
</div>
</form>
<div class='col-lg-4 col-sm-4 col-md-4 text-center'>
<?php if(isset($_POST['unsubmit'])){
	$unemail=$_POST['unemail'];
	$qu1=$conn->query("DELETE from subscriber where email='$unemail'");
	if($qu1){
		echo "<h1>Unsubscribe Successfully</h1>";
	}else{
		echo "<h1>Sorry</h1>";
	}
}
?>
</div>
</div></div></div>
</div>
</div>
</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>
<?php ob_flush(); ?>