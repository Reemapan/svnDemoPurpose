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
<title>Subscribe | News world </title>
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
<h3 class="page-heading"><span></span> </h3>
<div class="col-lg-12 col-xs-12 col-sm-12">
<h1>We hope you've enjoyed your free articles.</h1>
</div>
<div class="col-lg-6 col-xs-6 col-sm-6">
<h4>Continue reading by subscribing to newzworm.com for just $9.99 per year.</h4>
<a href='DigitalSubscription.php' class='btn btn-danger btn-lg'>Subscribe Newzworm Prime Now</a><hr/>
<big>Already a member? </big>
<a data-target='#login-modal' data-toggle='modal' class='btn btn-info'>Log in</a>
<a href='index.php' class='btn btn-primary'>Back To Home</a>
</div>
<div class="col-lg-6 col-xs-6 col-sm-6">
<img src='img/newzworm.png' class='img-responsive'>
</div>
<div class='clearfix'></div>
<h2><i class='fa fa-angle-double-down'></i> Your articles left to read <i class='fa fa-angle-double-down'></i></h2>
<?php
$q1=$conn->query("select * from news_update order by new_id desc limit 4");
while($r1=$q1->fetch_assoc()){
echo "<div class='row'>
<div class='col-lg-4 col-md-4 col-sm-4'>
<img src='m/".$r1['image_url']."' class='img-responsive'/>
</div>
<div class='col-lg-8 col-md-8 col-sm-8'>
<div>
<h3>".$r1['new_title']."</h3>
<small>".$r1['udate']." ". $r1['umonth']." ".$r1['uyear']." ".$r1['news_day']."</small>
";
echo"<p class='thnews-txt'>";
echo strip_tags($r1['news_content1']);
echo"</p>
</div>
</div>
</div><hr/>";
}
?>
</div>
</div>
</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>
<?php ob_flush(); ?>