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
<title>News world | Search Results</title>
<link rel="icon" href="image/favicon.ico" type="image/gif" sizes="16x16">
<meta https-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="m/css/style.min.css" rel="stylesheet" type="text/css">
<link href="m/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="m/css/css.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet"></head>
<body>
<div id="popupoverlay"></div>
<div id='popup'>
<div id="popupbody"></div>
<div id="popupfooter" class='text-right'></div>
</div>
<?php include "header.php"; ?>
<?php
$search= $_GET['search'];
$qr1=mysqli_query($con,"select * from news_update where news_content1 like '%$search%' or news_content2 like '%$search%' or news_content3 like '%$search%' or new_title like '%$search%' or slider_dis like '%$search%' or categoury like '%$search%' order by new_id desc");
$rw1=mysqli_num_rows($qr1);
?>
<div class="container">
<br>
<div class="row">
<div class="col-lg-12 col-xs-12 col-sm-12">
<div class="news-box clearfix panel panel-default panel-body">
<h3 class="page-heading"><span>Search Results for "<?php echo $_GET['search']?>" <?php echo $rw1?> Results Found</span> </h3>
<div class='clearfix'></div>
<?php 
if($rw1==0){
?>
<div class='row srchnt'>
<div class='col-lg-6'>
<ul>
<li>Sorry, we did not find any results.
<li>Make sure all words are spelled correctly.
<li>Try different keywords.
<li>Try more general keywords.
<li>Try fewer keywords.
</ul>
</div>
<div class='col-lg-6 text-center'>
<ul>
<li><i class='glyphicon glyphicon-search'></i>
</ul>
</div>
</div>
<?php
}else{
	
while($r1=mysqli_fetch_array($qr1)){
	$var=$r1[0];
$q1 = mysql_query("SELECT * from news_update where new_id=".$var." and categoury like 'W%'");
$pk1 = mysql_num_rows($q1);
if($pk1>0){
$gh1="world-tag";
}
$q2 = mysql_query("SELECT * from news_update where new_id=".$var." and categoury like 'L%'");
$pk2 = mysql_num_rows($q2);
if($pk2>0){
$gh1="life-tag";
}
$q3 = mysql_query("SELECT * from news_update where new_id=".$var." and categoury like 'S%'");
$pk3 = mysql_num_rows($q3);
if($pk3>0){
$gh1="sport-tag";
}
$q4 = mysql_query("SELECT * from news_update where new_id=".$var." and categoury like 'G%'");
$pk4 = mysql_num_rows($q4);
if($pk4>0){
$gh1="good-tag";
}
$q5 = mysql_query("SELECT * from news_update where new_id=".$var." and categoury like 'E%'");
$pk5 = mysql_num_rows($q5);
if($pk5>0){
$gh1="enter-tag";
}
$q6 = mysql_query("SELECT * from news_update where new_id=".$var." and categoury like 'T%'");
$pk6 = mysql_num_rows($q6);
if($pk6>0){
$gh1="trand-tag";
}
	
?>
<div class='row'>
<div class='col-lg-4 col-md-4 col-sm-4'>
<span class='<?php echo $gh1?>'><?php echo $r1[6] ?></span>
<img src='m/<?php echo $r1['image_url']?>' class='img-responsive'/>
</div>
<div class='col-lg-8 col-md-8 col-sm-8'>
<?php 
echo "<div>
<h3>$r1[1]</h3>
<small>$r1[12] $r1[13] $r1[14] $r1[9]</small>
";//<div class='know-news'>Know<div class='know-news-red'><span>The News</span> </div></div>";
echo"<p class='thnews-txt'>";
$countru=trim($r1[19]);
if(!empty($countru)){
$country=trim($r1[19]);
$quert = mysqli_query($con,"Select * from country where name='$country'");
$row10 = mysqli_fetch_array($quert);
$flag=$row10['flag'];
$address=trim($r1[18]);
echo preg_replace("/".$address."/","<b class='gm' value='$address'><img src='m/flags/$flag' width=20px height=20px> $0 <i class='fa fa-map-marker'></i>  </b>",$r1[2]);	
}
else{
	echo $r1[2];
}
$catg=trim($r1[6]);
$catg=str_replace(" ","-",$catg);
$varo=str_replace(" ","-",$r1[1]);
$varo=str_replace("?","",$varo);
echo"<a href='".$catg."/".$varo."/$r1[0]' data-toggle='' data-target='' style='color:#00f;'> READ MORE</a></p>";
?>
</div>
</div>
</div>
<hr style='border-color:#ff3e30;'/>
<?php 
}
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