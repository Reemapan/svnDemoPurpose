<?php ob_start();
/* if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://www.' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
} */
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>News world | About</title>
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
			<!--<div class="text-center form-group"> <img src="image/about-file.jpg" class="img-circle about-img" /></div> -->
			<div class="news-box clearfix panel panel-default panel-body text-justify">
				<!--<img src="image/sticer.png" class="sicker hidden-xs hidden-sm" /> -->
				<h3 class="page-heading"><span>About Us</span> </h3>
					<p class="iner-cont">The world is changing every single day and the dynamics of this changing world need to be kept a track of. It is surreal how kids are expected to stay ahead of their times and excel in everything these days, without being given the right exposure to adequate information. Newzworm is that change! Newzworm is that revolutionary news feed for 8-18 Years Young; which will lead them to progressive thinking and innovation. It is classy, crisp, and easy to digest news from around the world specially curated for the young minds. It will not only help kids stay updated with the latest news, but also mean that they can use this knowledge to help create better avenues for the future. </p>
					<p class="iner-cont"><b>Target Audience</b></p>
					<p class="iner-cont">-Although in a broad sense we know Newzworm is for kids, we have to now define what exactly the reader is likely to be to the detail. </p>
					<p class="iner-cont">-We are creating content for the farmer’s son living in Saharanpur, for the London teenager, for the American pre-teen, the Polish shoemaker’s kid, the Nigerian school goer, basically for every part of the world. </p>
					<p class="iner-cont">-This means we cannot write in a tone or a dialect that is even mildly offensive to anyone. We need to write unbiased and true to the essence of NEWSWORM, making it possible for every aspect to be well researched, every fact to be confirmed over and over and the message to be enlightening the world with positive information!</p>
			</div>
				<!--Bid add start here -->	
				<!--Bid add end here -->
		</div>
	</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>
<?php ob_flush(); ?>