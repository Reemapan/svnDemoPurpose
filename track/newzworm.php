<!doctype html>
<html>
<head>
<title>Newzworm Track Results</title>
<link rel="icon" href="../image/favicon.ico" type="image/gif" sizes="16x16">
<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../m/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
    <style>
        .warning{
            color:#fff;
            background-color:#f00;
        }
        .success{
            color:#fff;
            background-color:#0f0;
        }
    </style>
<body>
<li><a href="#clicks_user"  >Active Users</a><br/></br>
<li><a href="#register_user" >Registered Users</a>

<?php
include_once '../inc/configuration2.php';

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
	echo "<h3 style='position:fixed'>
	
	<br>Your IP <br>".$ipaddress." 
	</h3>";
	 $_SERVER['SERVER_PORT'];   $_SERVER['SERVER_ADDR'];
 md5(
    $_SERVER['REMOTE_ADDR'] .
    $_SERVER['HTTP_USER_AGENT']
);
	 $ipaddress = trim($ipaddress);

	$q=mysqli_query($con,"SELECT * from track_report where ip='".$ipaddress."'");
	$r=mysqli_fetch_array($q);
	 $click=$r['clicks'];
?>

	
<center>
<div id="register_user"></div>
<div class="row" id="" ><div class="col-lg-12">
<?php	$s = "select * from nluser order by id desc";
$resource = mysqli_query($con,$s);
$tot=mysqli_num_rows($resource);

echo "
<br> Total Manual Registration :".$tot."
";
$count = mysqli_num_rows($resource);
	echo "<center><table class='table table-striped' border='1' width='1200' >";
	echo "<thead><tr style='color:#F00; font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:center;'>";
    echo "<td width='50'>ID</td>";
   	echo "<td width='150'>Name</td>";
	echo "<td width='150'>Parent Name</td>";
	echo "<td width='150'>Email ID</td>";
	echo "<td width='150'>Address</td>";
	echo "<td width='100'>Start Date</td>";
	echo "<td width='100'>End Date</td>";
		echo "<td width='100'>Contact</td>";
	echo "<td width='100'>Plan</td>";
	echo "<td width='100'>Payment</td>";
	echo "<td width='100'>Month</td>";
	echo "</tr><thead><tbody>";
  $i=1;
while($row = mysqli_fetch_array($resource))
{
    if($row['payment']==1){
        $class='success';
        $rem=$row['total_issue']-$row['sent_issue'];
        if($row['total_issue']==$row['sent_issue']){
            $rr=mysqli_query($con,"update nluser set payment=0 where id='".$row['id']."'");
        }
        if($rem<4){
            $class='warning';
        }
    }else{
        $class='danger';
    }
    echo "<tr style='color:#333; font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:center;' class='$class'>";
    echo "<td>".$i++."</td>";
    echo "<td>".$row['name']."</td>";
	echo "<td>".$row['parents_name']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row['address']." ".$row['city']."</td>";
	echo "<td>".$row['start_date']."</td>";
	echo "<td>".$row['end_date']."</td>";
	echo "<td>".$row['mobile']."</td>";
	echo "<td>".$row['plan']."</td>";
	echo "<td>"; 
    if($row['payment']=='1'){
        echo 'Paid'; 
    }else{ 
        echo 'Unpaid'; 
    } echo "</td>";
	echo "<td>".$row['month']."</td>";
	
    echo "</tr>";
 }
 ?></tbody>
 </table> </div></div>

<div id="clicks_user"></div>
<div class="row"><div class="col-lg-12">
	
	<center><table class='table table-striped' border="2" cellpadding='20' >
<thead><tr align='center'><th>NO</th><th>ip</th><th>Total Hits</th><th>DEVICE</th><th>Time</th><th>city</th><th>country</th>
<th>Register attempt</th><th>trending</th>
<th>world</th><th>sports</th><th>life</th><th>entertainment</th><th>good news</th><th>Last Seen</th></tr></thead><tbody>
<?php $x=1;
$qr=mysqli_query($con,"SELECT * from track_report order by country");
$countr=null;
$count_c=0;
$count_cn=0;

	while($r=mysqli_fetch_array($qr)){
		$ip=trim($r['ip']);
		$ct=$r['country'];
		$cn=$r['city'];
		$last_date=$r['date'];
		$mn=$r['datem'];
		if(!$mn){
		$mn=substr($last_date,3,2);
		$yr=substr($last_date,6,4);
		$dt=substr($last_date,0,2);
		$tm=substr($last_date,10);
		$q6=mysqli_query($con,"update track_report set datedt='$dt',datem='$mn', dateyr='$yr', datet='$tm' where ip='$ip'");
		}
		if($ct!=$country){
		$country=$ct;
		++$count_c;	
		}
		if($ct==null){
		/* $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ip"));
		$country = $geo["geoplugin_countryName"];
		$city = $geo["geoplugin_city"]; */
		//$query1=mysql_query("UPDATE track_report set city='$city', country='$country' where ip='$ip'");
	}
	}
$qr1=mysqli_query($con,"SELECT city from track_report order by city");
	while($r1=mysqli_fetch_array($qr1)){
		$cn=$r1['city'];
		if($cn!=$countr){
			$countr=$cn;
			++$count_cn;
		}
		}
echo "<h1>Active Users</h1><br>Total Records = ".$row=mysqli_num_rows($qr);
	echo "<br>";
	echo "No of Country = ".$count_c;
	echo "<br>";
	echo "No of City = ".$count_cn;
	echo "<br>";
$i=1;
/* 	$qry=mysql_query("select * from track_report");
	while($run=mysql_fetch_array($qry)){
	$up=$run['ip'];
	$qrr=mysql_query("update track_report set id='$i' where ip='$up'");
	$i++;
	} */
	
$q=mysqli_query($con,"SELECT * from track_report where `clicks` > 0 OR `world` > 0 OR `entertainment` > 0 
OR `sports` > 0 OR `life` > 0 OR `trending` > 0 OR `good_news` > 0 order by id desc limit 1000");
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
		$login_attempt=$r['login_attempt'];
		$device=$r['device'];
	echo "<tr align='center'><td>".$x++."</td><td>".$ip."</td><td>".$clicks."</td><td>".$device."</td><td>".$hour." : ".$min." : ".$sec."</td><td>".$city."</td>
	<td>".$country."</td><td>".$login_attempt."</td><td>".$trending."</td><td>".$world."</td><td>".$sports."</td><td>".$life."</td>
	<td>".$entertainment."</td><td>".$good_news."</td><td>".$date." ".$r['datet']."</td></tr>";
	}
?></tbody>
</table>
</center></div></div>	
<script src='../js/min.js'></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
</body>				
</html>