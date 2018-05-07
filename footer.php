<!--Footer start here -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=143841086348981";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<footer>
<div class="container">
<div class="row">
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
<?php
include_once "inc/configuration3.php";
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
$ipaddress = trim($ipaddress);
date_default_timezone_set("Asia/Kolkata");
$date=date('d:m:Y')." ".date('H:i A');
$query=$conn->query("select * from track_report where `ip`='".$ipaddress."'");
if($query->num_rows==0){
$query1=$conn->query("INSERT INTO track_report (ip,date,device) VALUES('".$ipaddress."','$date','DESKTOP')");
}

$query=$conn->query("select * from track_report where ip='$ipaddress' ");
$row=$query->fetch_assoc();
$sec=$row['clicks'];
$sec=$sec+1;
$query=$conn->query("update track_report set clicks='$sec' where ip='$ipaddress'");
?>
<h4 class="footer-subhead">Newzworm app Download Now...</h4>
<div class="app-menu">
<ul>
<li><a href="https://play.google.com/store/apps/details?id=com.newzworm.newzworm&hl=en" target="_blank"><img src="https://www.newzworm.com/img/googleplay.png" alt="Play Store App" class="img-responsive"/></a></li>
<!--li><a href="#" target="_blank"><img src="img/applestore.png" alt="IOS app" class="img-responsive">  </a></li> -->
</ul>
</div>
<div class="social-media">
<ul>
<li><a href="https://www.facebook.com/newzworm/" target="_blank"><i class="fa fa-facebook"></i></a></li>
<li><a href="https://twitter.com/newzworm/" target="_blank"><i class="fa fa fa-twitter"></i></a></li>
<!--li><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li-->
<li><a href="https://plus.google.com/106514798874929932268" target="_blank"><i class="fa fa-google-plus"></i></a></li>
</ul>
</div>
</div>
<div class="col-md-2 col-lg-2 col-sm-2 col-xs-5">
<h4 class="footer-subhead">Links</h4>
<div class="footer-menu">
<ul>
<li><a href="about-us.php">About </a></li>
<li><a href="privacy-policy.php"> Privacy Policy </a></li>
<li><a href="contact.php">Contact Us</a></li>
<li><a href="archive.php">Archives</a></li>
</ul>
</div>
</div>
<div class="col-md-2 col-lg-2 col-sm-2 col-xs-7">
<h4 class="footer-subhead">Categories</h4>
<div class="footer-menu">
<ul>
<?php
$cat1="WORLD";
$cat2="LIFE";
$cat3="SPORTS";
$cat4="GOODNEWS";
$cat5="ENTERTAINMENT";
$cat6="TRENDING";
echo "
<li><a href='".$cat1."/1'> World</a></li>
<li><a href='".$cat2."/1'> Life</a></li>
<li><a href='".$cat3."/1'> Sports </a></li>
<li><a href='".$cat4."/1'> Good News </a></li>
<li><a href='".$cat5."/1'> Entertainment</a></li>
<li><a href='".$cat6."/1'> Trending</a></li>";
?>
</ul>
</div>
</div>
<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
<?php

include_once 'inc/configuration2.php';
// define variables and set to empty values
$emailErr = "";
$email = "";
$submes = "";

if(isset($_POST["subsubmit"]))
{
$semail = $_POST["semail"];
$que41 = $conn->query("SELECT email FROM subscriber WHERE email='$semail'");
$row41 = $que41->num_rows;

if($row41>0) {
	setcookie("subscribe","done",time()+24*60*60*361);
$emailErr = "$semail Already Subscribed";
$email = $semail;
echo "<script type='text/javascript'>alert('$emailErr');</script>";
}else{
date_default_timezone_set("Asia/Kolkata");
$sdate   	=  date("d:M:Y");
$stime 		= date("h:i:A");
$que1 = $conn->query("insert into subscriber (email) values('".$semail."')");

if($que1){ 
setcookie("subscribe","done",time()+24*60*60*361);
$submes = "Thanks For Subscription";
echo "<script type='text/javascript'>alert('$submes.". $_COOKIE['subscribe']."');</script>";	}
else{
echo mysqli_error();
}
}
}
?>
<h4 class="footer-subhead form-group">Get News in your Inbox</h4>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="input-group form-group">
<input type="text" class="form-control hei42" placeholder="Enter your email id" name="semail" value="<?php echo $email;?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter valid email id" required="required">
<div class="input-group-btn out-bg">
<button class="btn subcribe" type="submit" name="subsubmit">SUBSCRIBE</button>
</div>
</div>
</form>

</div>
</div>
</div>

<div class="container-fluid">
<div class="row">

<div class="col-md-12">
<hr/>
<p class="copyright">&copy; 2016 newzworm.com. All rights reserved.</p>
</div>

</div>
</div>

</footer>

<div id="weath" class="modal fade">
<div class='modal-dialog modal-sm'>
<div class='modal-content'>
<div class='modal-body' style='height:300px'>
<div id='location' style="font-size:20px;font-weight:bolder;"></div>
<hr/>
<div>
<div class='col-lg-3 col-sm-3 col-md-3 text-center'><div id='weather'> </div>
</div>
<div class='col-lg-9 col-sm-9 col-md-9' style="border-left:1px solid #ccc">
<div class='temp' style="font-size:24px;font-weight:bolder;"></div>
<div id='mic'></div>
<div id='desc'></div>
<div id='rise'></div>
<div id='set'></div>
<span id='low'></span> <span id='high'></span>
</div></div></div></div></div></div>

<div id='popupl' class='text-justify'>
<div><h3>Location of the news<i class='fa fa-times pull-right cross' style='color:red'></i></h3></div>
<hr/>
<div class='row' style="background-color:#3e61ef;color:#fff">

<div class='col-lg-12 text-center'><h5><span id='distance'>Wait...</span></h5></div>
</div>
<div class='col-lg-12'><div class='row' style='border-bottom:2px dashed black'><i class='fa fa-plane'></i></div></div>
<div class='row'>

<iframe id='myframe' frameborder="0" style="border:0;" src="" allowfullscreen>
</iframe>
</div>
<div class='row'>
<div class='col-lg-4 text-center' style="background:;height:100px;border-radius:5px;">
<h4>Your Location</h4>
<div id='your_location'></div>
</div>
<div class='col-lg-4'>
</div>
<div class='col-lg-4 text-center' style="background:;height:100px;border-radius:5px;">
<h4>News Location</h4>
<div id='Newslocation'><?php echo $country?></div>
</div></div>
<hr/>
<div class='row text-left'>
<div class='col-lg-12'><b>About News Location</b></div>
<div class='col-lg-6'>
<h6 class='name' style='background-color:#ff2;border-radius:5px;color:#f00;padding:2px;'></h6>
<h6 class='languages' style='background-color:#0061ff;border-radius:5px;color:#fff;padding:2px;'></h6>
<h6 class='capital' style='background-color:#ffa500;border-radius:5px;color:#fff;padding:2px;'></h6>
<h6 class='region' style='background-color:#fa00ff;border-radius:5px;color:#fff;padding:2px;'></h6>
<h6 class='subregion' style='background-color:#ff4c00;border-radius:5px;color:#fff;padding:2px;'></h6>
</div>
<div class='col-lg-6'>
<h6 class='callingCodes' style='background-color:#ff4c00;border-radius:5px;color:#fff;padding:2px;'></h6>
<h6 class='population' style='background-color:#ff0033;border-radius:5px;color:#fff;padding:2px;'></h6>
<h6 class='currencies' style='background-color:#19ff00;border-radius:5px;color:#f00;padding:2px;'></h6>
<h6 class='timezones' style='background-color:#ffa500;border-radius:5px;color:#fff;padding:2px;'></h6>
</div></div>
</div>

<div id='popup2' class='text-justify'>
<div><h4>
<?php?>
About News<button class='btn btn-danger btn-xs pull-right cross'><i class='fa fa-times'></i></button></h4></div>
<hr/>
<div class='row' style="background-color:#3e61ef;color:#fff">
<div class='col-lg-12 text-center'><h3><span id='distanc'></span></h3></div>
</div>
<div class='col-lg-12'>
<div class='row' style='border-bottom:2px dashed black'><hr/></div>
</div>
<div class='col-lg-12' id='information'>

</div>
</div>


<div id='overlay'></div>
<div id='subs' class='text-center' style='background:#fff;width:600px;border:2px solid #ccc;border-radius:10px;padding:20px'>
<div class='row'>
<i class='fa fa-times pull-right clos' id='clos' style='padding-right:20px;'></i>
<div class='col-lg-6' style='border-right:2px solid #ccc;'>
<img src='img/newspaper.jpg' alt='' style="height:150px"/>
</div>
<div class='col-lg-6' style='padding-top:20px;'>
<img src='img/newzworm.png' alt='' class='img-responsive'/>
</div>
</div>
<div class='row'>
<div class='col-lg-6' style='border-right:2px solid #ccc;'>
<br/><b>Home Delivery</b><sub>(India only)</sub><br/>
<i class='fa fa-inr'></i>449 for the first 6 months
</div>
<div class='col-lg-6'>
<br/><b>Digital access</b><br/>
Save 50% off the regular rate
</div>
</div>
<div class='row'>
<div class='col-lg-6' style='border-right:2px solid #ccc;'>
<br/><a href='subscribe' class='btn btn-success btn-sm'>Subscribe</a>
</div>
<div class='col-lg-6'>
<br/><a href='DigitalSubscription.php' class='btn btn-success btn-sm'>Subscribe</a>
</div>
</div>
<div class='row text-center'><br/>Already a subscriber? <a>Sign In</a></div>
</div>

<?php
if(isset($_POST['csubmit'])){
	$cname=$_POST['cname'];
	$ccomment=$_POST['ccomment'];
	$cemail=$_POST['cemail'];
	$quer=$conn->query("insert into review (name,email,comment,date) values('$cname','$cemail','$ccomment','".date('d-m-Y')."')");
}
?>
<!-- jQuery -->
<!-- End outer wrapper -->
<script src='m/js/push.min.js'></script>
<script src='js/min.js'></script>
<script src="js/jquery.bootstrap.newsbox.js"></script>
<script src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
<script src="js/bootstrap.min.js"></script>

<script>
<?php 
for($i=0;$i<3;$i++){
$qr=$conn->query("SELECT * from news_update order by rand()");
$rr=$qr->fetch_assoc();
$cat=trim($rr['categoury']);
$titl=trim($rr['new_title']);
$catg=str_replace(" ","-",$cat);
$varo=str_replace(" ","-",$titl);
$varo=str_replace("?","",$varo);
$varo=str_replace("&","",$varo);
 ?>
	
Push.create("<?php echo trim($rr['new_title']) ?>", {
    body: "<?php echo trim($rr['slider_dis']) ?>",
    icon: "m/<?php echo trim($rr['image_url']) ?>",
    timeout: 50000,
    onClick: function () {
        window.location.href= '<?php echo $catg."/".$varo."/".$rr['new_id'] ?>';
        this.close();
    }
});
<?php } ?>
</script>
<script>
$(document).ready(function(){
$("a").click(function(){
var ip = $.trim('<?php echo $ipaddress?>');
$.ajax({
type:'POST',
url:"ajax/tracking.php",
data:{ip:ip},
});
});
});

var ip = $.trim('<?php echo $ipaddress?>');
setInterval(function(){
$.ajax({
type:'GET',
url:'ajax/updatetime.php',
data:{ip:ip},
});
},1000);

</script>

<script>

$(document).ready(function(){
$(".volume-button").click(function(){
if($(".down2").css("display")=="none"){
$(".down2").show();
responsiveVoice.cancel();
responsiveVoice.pause();
$(".up2").hide();
}else{
$(".up2").show();
$(".up1").hide();
$(".down1").show();
$(".down2").hide();
responsiveVoice.resume();
}
});

$(".volume-buttonn").click(function(){
if($(".down1").css("display")=="none"){
$(".down1").show();
responsiveVoice.cancel();
responsiveVoice.pause();
$(".up1").hide();
}else{
$(".up1").show();
$(".up2").hide();
$(".down1").hide();
$(".down2").show();
responsiveVoice.resume();
}
});
});
</script>

<!--on click News slider script -->
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
showDivs(slideIndex += n);
}

function showDivs(n) {
var i;
var x = document.getElementsByClassName("mynews");
if (n > x.length) {slideIndex = 1}
if (n < 1) {slideIndex = x.length}
for (i = 0; i < x.length; i++) {
x[i].style.display = "none";
}
//x[slideIndex-1].style.display = "block";
}
</script>
<!--vertical News slider script -->
<script type="text/javascript">
$(function () {
$(".vertical-slide").bootstrapNews({
newsPerPage: 4,
autoplay: true,
pauseOnHover:true,
direction: 'up',
newsTickerInterval: 4000,
onToDo: function () {
//console.log(this);
}
});
});
</script>
<!--Share menu toggle script here -->
<script>
$(document).ready(function() {
$('.share-menu').click(function(){
//get collapse content selector
var collapse_content_selector = $(this).attr('href');

//make the collapse content to be shown or hide
var toggle_switch = $(this);
$(collapse_content_selector).toggle(function(){
if($(this).css('display')=='none'){
//toggle_switch.html('Show');//change the button label to be 'Show'
}
});
});
});
</script>
<!-- Meaning popup end -->
<script>
$('.wordmeaning').click(function(event){
var wor = $(this).attr("title");
$.post("ajax/meaning.php",{wor:wor},function(data){
$('#popup').css('left',event.pageX);      // <<< use pageX and pageY
$('#popup').css('top',event.pageY + 15);
$('#popup').css('display','inline');
$('#popup').css('display','inline');
$('#popupoverlay').css('display','inline');
$("#popup").css("position", "absolute");  // <<< also make it absolute!
$("#popupbody").html(data);
});
});

$(".v").click(function(event){
$('#popup').css('left',event.pageX);      // <<< use pageX and pageY
$('#popup').css('top',event.pageY + 15);
$('#popup').css('display','inline');
$('#popup').css('display','inline');
$('#popupoverlay').css('display','inline');
$("#popup").css("position", "absolute");  // <<< also make it absolute!

var alt = $(this).attr("title");
$("#popupbody").html(alt);
});

$("#popup").click(function(){
$('#popupoverlay').hide();
$("#popup").hide({width:0,height:0},1500);
});
$("#popupoverlay").click(function(){
$('#popupoverlay').hide();
$("#popup").hide({width:0,height:0},1500);
});
$("#popupbody").click(function(){
$('#popupoverlay').hide();
$("#popup").hide({width:0,height:0},1500);
});
</script>
<script >
function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
var R = 6371; // Radius of the earth in km
var dLat = deg2rad(lat2-lat1);  // deg2rad below
var dLon = deg2rad(lon2-lon1);
var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * Math.sin(dLon/2) * Math.sin(dLon/2);
var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
var d = R * c; // Distance in km
return d;
}

function deg2rad(deg) {
return deg * (Math.PI/180)
}


if(navigator.geolocation){
navigator.geolocation.getCurrentPosition(function(position){
var latitude=position.coords.latitude;
var longitude= position.coords.longitude;
$.getJSON("https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(SELECT%20woeid%20FROM%20geo.places(1)%20WHERE%20text=%27("+latitude+","+longitude+")%27)%20and%20u=%27c%27%20&format=json",function(a){
//to show current condition

var location = a.query.results.channel.title;
var city=a.query.results.channel.location.city;
var country=a.query.results.channel.location.country;
var humidity =a.query.results.channel.atmosphere.humidity;
var visibility = a.query.results.channel.atmosphere.visibility;
var sunrise=a.query.results.channel.astronomy.sunrise;
var sunset=a.query.results.channel.astronomy.sunset;
var image=a.query.results.channel.image.url;
var temp=a.query.results.channel.item.condition.temp;
var des=a.query.results.channel.item.condition.text;
var high=a.query.results.channel.item.forecast[0].high;
var low=a.query.results.channel.item.forecast[0].low;
$('#location').html(city+", "+country);
$('#your_location').html(city+", "+country);

$('#desc').html(des);
$('#set').html("Sunset : "+sunset);
$('#rise').html("Sunrise : "+sunrise);
$('.temp').html(temp + String.fromCharCode(176)+"C");
$('#high').html(" to "+high + String.fromCharCode(176)+"C");
$('#low').html(low + String.fromCharCode(176)+"C");
$('#mic').html("Humidity " + humidity + "%");

$(document).ready(function(){
$('.gm').click(function(){
var alpha2=$(this).attr("title");
var city1=$(this).attr("name");
$('#Newslocation').html(city1);

jQuery.getJSON("https://restcountries.eu/rest/v1/alpha/"+alpha2+"",function(a){
		name=a.name;
		callingCodes=a.callingCodes;
		capital=a.capital;
		region=a.region;
		subregion=a.subregion;
		population=a.population;
		currencies=a.currencies;
		timezones=a.timezones[0];
		languages=a.languages[0];
		$('.name').html("Country : " +name);
		$('.callingCodes').html(" Calling Code : "+callingCodes);
		$('.capital').html("Capital : "+capital);
		$('.region').html("Region : "+region);
		$('.subregion').html("Subregion : "+subregion);
		$('.population').html("Population : "+population);
		$('.currencies').html("currency : "+currencies);
		$('.timezones').html("Time-Zone : "+timezones);
		$('.languages').html("Languages : "+languages);
	});


$.post("ajax/latitude.php",{city:city1},function(data){
var latitude1=data.substring(0, data.indexOf(','));
var latt=latitude1+",";
var longitude1=data.replace(latt,'');
$.getJSON("https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(SELECT%20woeid%20FROM%20geo.places(1)%20WHERE%20text=%27("+latitude1+","+longitude1+")%27)%20and%20u=%27c%27%20&format=json",function(b){
var city1=b.query.results.channel.location.city;
var country1=b.query.results.channel.location.country;
var iflocation="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDTrZglfe4HazFQzQn5Z99hXnXLwsR7aBc&origin="+city+"&destination="+city1+"&zoom=1";
document.getElementById('myframe').src = iflocation;
});
var distance=getDistanceFromLatLonInKm(latitude,longitude,latitude1,longitude1);
var distance = Math.round(distance);
$('#distance').html("You are "+distance+" km <i class='fa fa-paper-plane' area-hidden='true'></i> away from here");
});
});
});
});
});
}
</script>
<script>
$(document).ready(function(){
$('.gm').click(function(){
if($('#popupl').css('right')=='0px'){
$('#popupl').animate({right:'-100%',},1000);
$('#popupl').css({display:'none'});
}else{
$('#popupl').css({display:'block'});
$('#popupl').animate({right:'0px',},1000);

}
});
$('.cross').click(function(){
$('#popupl').animate({right:'-100%',},1000);
});
});
</script>

<script>
$(document).ready(function(){
$('#clos').click(function(){
$('#subs').css({display:'none'});
$('#overlay').css({display:'none'});
});
});
$(document).ready(function(){
$('#overlay').click(function(){
$('#subs').css({display:'none'});
$('#overlay').css({display:'none'});
});
});
$(document).ready(function(){
$('.himanshu').click(function(event){
$('#subs').css('right',"80px");      // <<< use pageX and pageY
$('#subs').css('top',event.pageY + 25);
$('#overlay').css({display:'block'});
$('#subs').css({display:'block'});
});
});
</script>

<script type="text/javascript">
function googleTranslateElementInit() {
new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>