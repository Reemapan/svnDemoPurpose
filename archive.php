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
<title>News world | Archive News</title>
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
<h3 class="page-heading"><span>Archive News</span> </h3>
<div class='clearfix'></div>
<form action='' method='GET'>
<div class='col-lg-2 col-sm-2 col-md-2 text-center'>
<h3>Select Year</h3>
<select class='form-control year' name='year'>
<option></option>
<option value='2016'>2016</option>
<option value='2017'>2017</option>
</select>
</div>
<div class='col-lg-3 col-sm-3 col-md-3 text-center'>
<h3>Select Month</h3>
<select class='form-control month' name='month'>
<option></option>
<option value='01'>January</option>
<option value='02'>Feburary</option>
<option value='03'>March</option>
<option value='04'>April</option>
<option value='05'>May</option>
<option value='06'>June</option>
<option value='07'>July</option>
<option value='08'>August</option>
<option value='09'>September</option>
<option value='10'>October</option>
<option value='11'>November</option>
<option value='12'>December</option>
</select>
</div>
<div class='col-lg-3 col-sm-3 col-md-3 text-center'>
<h3>Select Week</h3>
<select class='form-control week' name='week'>
<option></option>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
</select>
</div>
<div class='col-lg-2 col-sm-2 col-md-2 text-center'>
<h3>Select Day</h3>
<select class='form-control day' name='day'>
<option></option>
<option value='Monday'>Monday</option>
<option value='Tuesday'>Tuesday</option>
<option value='Wednesday'>Wednesday</option>
<option value='Thrusday'>Thrusday</option>
<option value='Friday'>Friday</option>
<option value='Saturday'>Saturday</option>
</select>
</div>
<div class='col-lg-2 col-sm-2 col-md-2 text-center'>
<h3>&nbsp;</h3>
<input type='submit' class='form-control btn-danger'/>
</div>
</form>

<?php
if(isset($_GET['year'])){
?>
<script src='js/min.js'></script>
<script>
$('.year').val('<?php echo $_GET['year']?>');
$('.month').val('<?php echo $_GET['month']?>');
$('.week').val('<?php echo $_GET['week']?>');
$('.day').val('<?php echo $_GET['day']?>');
</script>

<?php
$year=trim($_GET['year']);
$month=trim($_GET['month']);
$week=trim($_GET['week'])*7;
$day=trim($_GET['day']);
$wek=$week-7;
echo "<div class='row form-group'>";
if(empty($month) && empty($week) && empty($day)){

$que31 = $conn->query("SELECT * from news_update where uyear='$year' limit 0,200");
}else if(empty($week) && empty($day)){

$que31 = $conn->query("SELECT * from news_update where uyear='$year' and umonth='$month'");
}else if(empty($day)){

$que31 = $conn->query("SELECT * from news_update where uyear='$year' and umonth='$month' and udate>='$wek' and udate<='$week'");
}else{

$que31 = $conn->query("SELECT * from news_update where uyear='$year' and umonth='$month' and udate>='$wek' and udate<='$week' and news_day='$day'");
}
while($row31 = $que31->fetch_assoc()){
echo "<div class='col-md-4 col-lg-3 col-sm-4 col-xs-12'>
<div class='cat-box'>";
$varo=str_replace(" ","-",$row31['new_title']);
$varo=str_replace("?","",$varo);
$var=trim($row31['categoury']);
$varo2=str_replace(" ","-",$var);

echo "<a href='$varo2/".$varo."/".$row31['new_id']."'>
<img src='m/".$row31['image_url']."' class='img-responsive' alt='".$row31['new_title']."' title='".$row31['new_title']."'/>
<h3>". $row31['new_title']."</h3></a>
<p>".strip_tags($row31['slider_dis'])."</p>
<div class='cat-datebox'>".$row31['udate']." ". $row31['umonth']." ". $row31['uyear']." ".$row31['news_day']."</div>
</div>
</div>";}
?>
</div>
<?php
}else{
?>
<div class='row form-group'  style='height:300px'>
</div>
<?php } ?>
</div></div></div>
</div>
<?php include "footer.php"; ?>
</body>
</html>
<?php ob_flush(); ?>