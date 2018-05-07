<!doctype html>
<html>
<head>
<title>Track Results</title>
<link rel="icon" href="image/favicon.ico" type="image/gif" sizes="16x16">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="m/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src='js/min.js'></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
<?php
include_once 'inc/configuration1.php';
include_once 'inc/configuration2.php';

echo "<h1>".$_SERVER['REMOTE_ADDR']."</h1>"
?>
<div class="row"><div class="col-lg-12">
<center><table class='table table-striped'border="2" cellpadding='20'>
<thead><tr align='center'><th>NO</th><th>ip</th><th>Total Hits</th><th>Device</th><th>Time</th><th>city</th><th>country</th><th>trending</th>
<th>world</th><th>sports</th><th>life</th><th>entertainment</th><th>good news</th><th>Last Seen</th><th>sub</th></tr></thead><tbody>
<?php
$qr3=mysqli_query($con,"SELECT country from track_report order by country");
$countr=null;
$count_c=0;
$count_cn=0;

while($r3=mysqli_fetch_array($qr3)){
$ct=$r3['country'];
if($ct!=$country){
$country=$ct;
++$count_c;
}
}
$qr4=mysqli_query($con,"SELECT city from track_report order by city");
while($r4=mysqli_fetch_array($qr4)){
$cn=$r4['city'];
if($cn!=$countr){
$countr=$cn;
++$count_cn;
}
}
$x=1;
$dat=date('d:m:Y');
$qr=mysqli_query($con,"SELECT * from track_report where date like '$dat%' order by date desc,datet desc");
$y=1;

while($r=mysqli_fetch_array($qr)){
$ip=trim($r['ip']);
$ct=$r['country'];
if($ct==null){
$y++;
	
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ip"));
$country = $geo["geoplugin_countryName"];
$city = $geo["geoplugin_city"];
$query1=mysqli_query($con,"UPDATE track_report set city='$city', country='$country' where ip='$ip'");
}
}
echo "affected rows = ". $y;
echo "<br>";
echo "Total Country = ". $count_c;
echo "<br>";
echo "Total City = ". $count_cn;
echo "<br>";
echo "Total Records = ".$row=mysqli_num_rows($qr);
$i=1;
$qry=mysqli_query($con,"select * from track_report");
while($run=mysqli_fetch_array($qry)){
$up=$run['ip'];
$qrr=mysqli_query($con,"update track_report set id='$i' where ip='$up'");
$i++;
}
date_default_timezone_set('Asia/Kolkata');
$dat=date('d:m:Y');

$q=mysqli_query($con,"SELECT * from track_report where date like '$dat%' order by datet desc,date desc");
while($r=mysqli_fetch_array($q)){
$ip=$r['ip'];
$clicks=$r['clicks'];
$hour=$r['timeh'];
$min=$r['timem'];
$sec=$r['times'];
$country = $r["country"];
$city = $r["city"];
$date = $r["date"];
$trending= $r["trending"];
$sports= $r["sports"];
$life= $r["life"];
$world= $r["world"];
$entertainment= $r["entertainment"];
$good_news= $r["good_news"];
$device=$r['device'];
echo "<tr align='center'><td>".$x++."</td><td>".$ip."</td><td>".$clicks."</td><td>".$device."</td><td>".$hour." : ".$min." : ".$sec."</td><td>".$city."</td>
<td>".$country."</td><td>".$trending."</td><td>".$world."</td><td>".$sports."</td><td>".$life."</td>
<td>".$entertainment."</td><td>".$good_news."</td><td>".$date." ".$r['datet']."</td><td>".$r['sub_clicks']."</td></tr>";
}


?>
</tbody>
</table>
</center></div></div>
</body>
</html>