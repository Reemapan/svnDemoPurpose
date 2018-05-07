<?php include_once 'inc/configuration2.php';
//$con = mysqli_connect('localhost','root','','hss');
?>
<html>
<head>
<title>Testing</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="jquery.bootstrap-growl.min.js"></script>
<script src="jquery.bootstrap-growl.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='m/css/css.css' type='text/css'>
<style>
div:hover .rotate {
    -webkit-transform:rotate(360deg);
    -moz-transform:rotate(360deg);
    -o-transform:rotate(360deg);
}
</style>

</head>
<body>
<!-- PROVIDED BY MARCELO MARTINS - Bootply @mmartins -->
<div class="hidden navbar navbar-default navbar-fixed-bottom" role="navigation">
<div class="container">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
<ul class="nav navbar-nav">
<form class="navbar-search navbar-form" method="get" action="">
<input type="text" class="form-control" placeholder="Search" name="s">
</form>
</ul>
</div>
</div>
</div>

<?php
echo "<br>";
if(isset($_POST['submit_label'])){
$too=trim($_POST['too']);
$addres=trim($_POST['addr']);
$phn=trim($_POST['phn']);
$q3=mysqli_query($con,"insert into label2  (too,address,contact) values('$too','$addres','$phn')");
if($q3){
echo "done";
}else{
echo "fail";
}
} ?>
<!---
<form method='post' action=''>
<input type='text' placeholder='too' name='too'/><br/>
<textarea placeholder='address' name='addr'></textarea><br/>
<input type='text' placeholder='Contact No' name='phn'/><br/>
<input type='Submit' name='submit_label' value='copy'/>
</form>
-->
<?php

$labb="<div>
<div style='text-align:center;'> <img  src='https://www.skillizen.com/image/logo.png'> </div>
<div>
<h3 style='color:red;'>Is your Child ready to face Real World Challenges?</h3>
<h3 style='color:red;'>Does your  Child's School teach any Life Skills at all? </h3>

<h3 style='color:red;'>Would you like to make your Child a Better Decision Maker?</h3><br>

<p>After very successful summer workshops on Critical Life Skills, Skillizen is starting a regular weekend batch of Life Skills Transfer to young children between 10 -16 Years,  At C-402, Nirvana Courtyard, Sector -50, Gurgaon / Coworkin, 39- Nehru Place, New Delhi.</p> <br><br>

<b style='color:red;'>Subject:</b> Critical Life Skills sessions for children (*10-16 years) at New Delhi/ Gurgaon.<br><br>

<b style='color:red;'>Background Research:</b> The Critical Life Skills curriculum was conceived at Harvard University during my research work on how to make young citizens better decision makers in personal and professional lives. The research concluded that such skills can be transferred most effectively during the brains, hardwiring phase between 6-16 years. Hence Critical Skills was clearly the missing piece from the prevalent  and ancient school curriculums(primarily derived from 16th century European school curriculums). This led to the genesis of Skillizen, the world's 1st Evidence Backed, Criterion Referenced and Real World Integrated Critical Skills Curriculum.<br><br>

<b style='color:red;'>What are 21st century Critical Life Skills?</b> They are a portfolio of Critical Skills that are required for every young child to grow as an independent and autonomous individual. It further enables the children to engage with and to lead the real world.<br><br>

<b style='color:red;'>Unique Transfer Process:</b> The skills transfer process include <br><br>
<ul>
<li>Skills concepts,
<li>Case stories,
<li>Group skilling games
<li>Role plays
<li>Real World decision making through the Skillizen Situation Simulator.
</li><br>

<b style='color:red;'>Skills Covered</b>: The Skillizen Curriculum includes portfolio of 25 Critical skills, some prominent ones are the following skills:-<br><br>
<ul>
<li>-Leadership Skills to Lead Others
<li>-Self Management Skills to Lead Self
<li>-Goal Setting Skills
<li>-Economic Common Sense
<li>-Personal Finance Sense
<li>-Virtual Productivity Skills
<li>-Researching Skills
<li>-Negotiation Skills
<li>-Team Leading Skills
<li>-Critical Thinking & Problem-Solving Skills
<li>-Communication Skills to Engage and Influence the world.
</ul><br>
<b style='color:red;'>Skills Transfer Outcomes:</b> While the skills transferred will be useful all through the adult life of your child but immediate impact can be felt though:--<br><br>
<b>
<br> a) Higher level of awareness and comprehension of economic phenomenon around them
<br>b) Create & Track Personal Goal Setting plan
<br>c) Significantly higher level of personal ownership of goals and personal decisions.
<br>d) Stronger communication skills
<br>e) Much better group and community dynamics
</b> <br>
<b style='color:red;'>Schedule & Location:</b>  The Delhi group sessions are scheduled to start from next Sunday Morning at the Coworking space at 3rd floor, 39-Nehru Place.These sessions are planned to be held once a week on Sunday morning for 2 hours, continuing throughout the year with some breaks during the long vacations and school examination periods.
<br><br>
<b style='color:red;'>Fees:</b> The fees per participant per month will be Rs.4000/-+GST for 8 sessions of 1 hour over 4 meetings. The fee will be collected once every 3 months. The total amount payable upon joining will be Rs 13,800/- by cash/cheque in favor of Skillizen Learning Solutions Pvt. Ltd.
<br><br>
<br>
Feel free to give me a call if you would like to have any more information regarding the sessions. It is my pleasure to invite you to visit our website www.skillizen.com to get more insights about critical life skills.
<br><br><br>
Regards,
<br>
Sidharth Tripathy<br>
Founder & CEO, Skillizen Learning Global.<br>
CoFounder, Indian School of Entrepreneurship<br>
Founder & Chief Editor, NEWZWORM.com, world's largest news source for 8-18 years<br>
+91-9313361681<br><br>

* Age is no bar, it is stated only as a broader guideline, any child who can converse in English and interact freely with other children is ready for real world skilling. In fact, if your child is not so social types, then he needs it even more urgently than anybody else. <br>
<img src='https://www.newzworm.com/poster.jpg' style='height:200px'>
</div>
";

$headerso  = "MIME-Version: 1.0" . "\r\n";
$headerso .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headerso .= "From:himanshugupta@skillizen.com \r\n";
$subjecto = "International Life Skills Olympiad 2017-18 (Harvard University Alumni)";

$olympiad="<div style='border:10px solid #ed1c24;border-radius:20px;padding:10px 10px;width:900px;'>
<div style='padding:10px 10px;margin-bottom:5px;float:left;border-radius:10px;background:#fff;'>
<img src='http://iskillsolympiad.org/new_img/Web_logo1.png' width='300px'/>
<p><b>World's 1<sup>st</sup> Olympiad of Critical Life Skills</b> for grade IV-XII school students</p>
</div>
<div style='padding:10px 10px;margin-bottom:5px;border-radius:10px;background:#fff;'>
<img src='http://iskillsolympiad.org/img/harvard.png' width=100px'/>
</div>
<div style='padding:10px 10px;font-size:16px;border-radius:10px;background:#fff;height:500px;clear:both;text-align:center;'>
<hr style='border:1px solid #ed1c24;margin:0px '/>
<div style='text-align:left;'>
<h1 style='color:#ed1c24;text-align:center;'>Congratulations..!!!</h1>

Dear Runjun Bujar Barua, <br/><br/>

Warm Greetings! You have successfully Registered your child in the International Life Skills Olympiad 2017-18. We congratulate you on taking the first step for assessing the Real World Skill levels of your child.<br/><br/>

You are just one step away from testing your child's Life Skills readiness at Global Level.

<br/><br/>
kindly complete your registration by clicking on below link and login...
<h3><a href='https://iskillsolympiad.org/loginiso.php'>https://iskillsolympiad.org/loginiso.php</a></h3>
<br/>
<b>User ID:</b> drpranjitbarman1969@gmail.com
<br/><br/>
<b>Default Password:</b> barman1234
<br/>
<br/>
</div></div></div>";

$olympiad;

$email=array('dilipsharmaudr@gmail.com'
,'kuljinder.kaur7@gmail.com'
,'yasmeenfatimahossain@gmail.com'
,'surendra.dubey@psipl.co.in'
,'rrdeshpremy@gmail.com'
,'vanshikapatil1806@gmail.com'
,'maya.jhanwar@gmail.com'
,'dhirajborole@gmail.com'
,'sujaysagar@gmail.com'
,'stars_161196@yahoo.com'
,'priyakc21@rediffmail.com'
,'aryanshekhar1980@gmail.com'
,'mansient.7979@gmail.com'
,'jishblessenk@gmail.com'
,'pujaagni22@gmail.com'
,'dineshkulkarni@hotmail.com'
,'ram.sethu@essar.com'
,'mihir_shah777@yahoo.co.in'
,'manishahodge3@gmail.com'
,'rajesh.heralgi@gmail.com'
,'vijyedra@rediffmail.com'
,'vidyapuri@rediffmail.com'
,'pallavi.madan80@gmail.com'
,'anujsarkar276@gmail.com'
,'susheelkumar.y@gmail.com'
,'vinaypadwal40447@gmail.com'
,'aniketkumanat@gmail.com'
,'adityaagarwal279@gmail.com'
,'sonalirc5999@gmail.com'
,'adityanivangune00@gmail.com'
,'anpokale5556@gmail.com'
,'mahesh869@gmail.com'
,'karuneshphale564@gmail.com'
,'rohanbharti40@gmail.com'
,'malharpawar7889@gmail.com'
,'sidpawar1303@gmail.com'
,'aniketsatar2001@gmail.com'
,'shubhamshah2801@gmail.com'
,'shelkekhush4@gmail.com'
,'chiragpokharana99@gmail.com'
,'baratevighnesh777@gmail.com'
,'kamleshpuranik55@gmail.com'
,'herambmane143@gmail.com'
,'smitgadhatra14@gmail.com'
,'yashsuryawanshi@gmail.com'
,'nishadashish702@gmail.com'
,'vw25042@gmail.com'
,'siddharthalhat30@gmail.com'
,'gaherwarrohit86@gmail.com'
,'dattatraygawade1234@gmail.com'
,'sanketmarney53@gmail.com'
,'abhishekpote6752@gmail.com'
,'gautampawar434@gmail.com'
,'vijayvarma626@gmail.com'
,'tejaspadule324@gmail.com'
,'yashkarnarat33@gmnail.com'
,'yogeshyadav01@gmail.com'
,'nohitpatel@gmail,.com'
,'ganamohite125@gmail.com'
,'sulokhep202gmail.com'
,'omdeshmukh74191@gmail.com'
,'ajayshende2000@gmail.com'
,'pushkarbendre18@gmail.com'
,'gauravkangne2001@gmail.com'
,'shubhamdindore9511@gmail.com'
,'saurabh tayad2001@gmail.com'
,'shubhamrajkumarmisal123@gmail.com'
,'vedvansh1323@gmail.com'
,'supriya2001@gmail.com'
,'divyaraut5613@gmail.com'
,'rutujautteka@gmail.com'
,'nitinrathod123456@gmail.com'
,'omtodkar27@gmail.com'
,'pathansarfraj999@gmail.com'
,'bharatgonte@gmail.com'
,'sanjayrathos1999@gmail.com'
,'jambaba8889@gmail.com'
,'mainuddinalagi786@gmail.com'
,'vishvnathmali1234@gmail.com'
,'sakshijori09@gmail.com'
,'shubhangispotdar@gmail.com'
,'poojamahamuni123@gmail.com'
,'ishkhade@gmail.com'
,'ankitamahangade2004@gmail.com'
,'rutujachavan132002@gmail.com'
,'koushiktike007@gmail.com'
,'aishdhamdhere11@gmail.com'
,'saurabh2101@gmail.com'
,'ankitahalande@gmail.com'
,'madhuyadav@gmail.com'
,'adeshyenpure777@gmail.com'
,'vishalpawar6051@gmail.com'
,'omkarnaik052@gmail.com'
,'derkarvaibhav567@gmail.com'
,'deepakshinde2001@gmail.com'
,'abhishekkadam81982@gmail.com'
,'ravipawar@gmail.com'
,'harshaluttarkar123@gmail.com'
,'samadhantalekar@gmail.com'
,'devidasborkar23@gmail.com'
,'harshadkhalge23@gmail.com'
,'chaitanyajadhav32@gmail.com'
,'aadeshthmbare123@gmail.com'
,'abhisheksakpal@gmail.com'
,'anilchaudhary69352@gmail.com'
,'shubhamdhage1430@gmail.com'
,'siddharthdhumal@gmail.com'
,'sahilmastud1234@gmail.com'
,'ritikvishwarkama298@gmail.com'
,'shrawankumar12@gmail.com'
,'sindemangal1201@gmail.com'
,'thebestmahesh91@gmail.com'
,'sahilchawan9351@gmail.com'
,'varunm@gmail.com'
,'maheshjvane23@gmail.com'
,'shreyas@gmail.com'
,'dineshaadmane@gmail.com'
,'sahilraut0123@gmail.com'
,'snehaljori@gmail.com'
,'akshada42@gmail.com'
,'kajalchikane12@gmail.com'
,'kajalgavade@gmail.com'
,'sonalikakade@gmail.com'
,'apeekshababbar@gmail.com'
,'mansishedge43@gmail.com'
,'suvarnakasar54@gmail.com'
,'akashadadhondiba@gmail.com'
,'anujak76@gmal.com'
,'shilpamodak87@gmaail.com'
,'bhagyashrilaxaman@gmail.com'
,'vrushalig43@gmail.com'
,'tejasgonate4@gmail.com'
,'manendarsapkal2001@gmail.com'
,'akashlandge7115@gmail.com'
,'saurabhpalkar099@gmail.com'
,'vaijenathjadhav7930@gmail.com'
,'ashutoshkondhare3321@gmail.com'
,'pratiknangude@gmail.com'
,'vishwaspathare1611@gmail.com'
,'gauravborge2681@gmail.com'
,'khandareganesh@gmail.com'
,'tejassawant516@gmail.com'
,'pratikd32@gmail.com'
,'golepratik@gmail.com'
,'bhaveshchoudhary8286@gmail.com'
,'ashmitamattere@gmail.com'
,'ankitapawar12@gmail.com'
,'manishakokare@gmail.com'
,'aswinic14@gmail.com'
,'tejab12@gmail.com');
//print_r($email);
//sidh.tripathy@gmail.com
$tooo="himanshugupta9467@gmail.com";
/*if(mail($tooo,$subjecto,$olympiad,$headerso)){
echo'done<br>';
}else{
echo 'fail';
}
$q5=mysqli_query($con,"select * from emails limit 2241,150");

/* while($r3=mysqli_fetch_array($q5)){
echo $tooo=$r3['email'];
if(mail($tooo,$subjecto,$olympiad,$headerso)){
echo'done<br>';
}else{
echo 'fail';
}
} */

$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From:Newzworm@newzworm.com \r\n";

$subject = "Registration Successfull";

$message ="<html><head>
<meta name='viewport' content='width=device-width, initial-scale=1' />
</head>
<body>
<div style='background:#ed1c24;border-radius:20px;padding:10px 10px;width:100vw;'>
<div style='padding:10px 10px;margin-bottom:5px;text-align:center;border-radius:10px;background:#fff;'>
<img src='https://www.newzworm.com/img/logodemo.png' width='500px'/>
</div>
<div style='padding:20px 10px;padding-top:0px;margin-bottom:5px;border-radius:10px;text-align:center;background:#fff; background-image:url(https://www.newzworm.com/img/crowd2.jpg); background-repeat:no-repeat;background-size:cover;'>
<span style='width:500px;font-weight:bolder;font-size:18px;'>Newzworm is  the world's 1st news app specifically curated and created for 8-18 years young.  Currently read by young global citizens from 144 countries and 2000+ cities across the world.</span>
<div><a href=''><img src='https://www.newzworm.com/img/googleplay.png' style='margin-right:100px;width:100px'/></a>
<a href=''><img src='https://www.newzworm.com/img/applestore.png' style='width:100px;margin-left:20px;'/></a>
</div></div>";
$message .="
<div style='padding:10px 10px;font-size:20px;border-radius:10px;background:#fff;height:350px'>
<div style='height:100%;'>
<h3>Dear Subscriber,<br/><br/>
Congratulation! Welcome to newzworm family. You are successfully subscribed our weekly newspaper for 1  year. You will recieve your newspaper in next 7-10 working days.
<br/><br/>
You are our valued reader and any suggestions from you are most welcome.
<br>
<br>
Regards
<br>
Newzworm Team </h3>

</div>
</div>
<hr style='border:2px solid #ff006e;margin:0px;opacity:0;background:#ed1c24;'/>
";
$message .=
"<span><small style='color:#fff;font-size:10px;font-weight:bolder;'>delivered by Skillizen Learning Global Pte. Ltd. 16 Raffles Quay, #41-01 Hong Leong Building, Singapore, Central Region 048581,Singapore</small></span>
</div>
</body></html>
";
 $message;

if(isset($_POST['subs'])){
$email ="himanshugupta9467@gmail.com,sidh.tripathy@gmail.com";

if(mail($email,$subject,$meslab,$headers)){
echo"success";
}else{
echo "fail";
}
}
?>
<!--<form action='' method='post'><button type='submit' name='subs' class='btn btn-success'>Update Subscribers</button></form>

<!--ILSO Registration-->
<?php 

$er='info@rscadd';
//$q5=mysqli_query($con,"delete from emails where email='$er'");
$co='UK';
$Coun='United Kingdom';
$q4=mysqli_query($con,"update news_update set country='$Coun' where country='$co'");
$q4=mysqli_query($con,"select email from emails limit 1920,180");
$rr=mysqli_num_rows($q4);
echo '<br/>';

$ILSO1="<img src='http://iskillsolympiad.com/images/ILSO.png'/><br/>";
$ILSO="<a href='https://iskillsolympiad.org/'><img src='http://iskillsolympiad.com/images/onestep.jpg'/></a><br/>";
$aas="<a href='http://iskillsolympiad.com/images/ebrochure.pdf'>Download e-Brochure</a><br/>
<a href='http://iskillsolympiad.com/images/ILSO2017Samples.zip'>Download Syllabus</a><br/>
";
$x=0;

while($r4=mysqli_fetch_array($q4)){
	 $toILSO=$x++."=".$r4['id']."=";
	 $toILSO=$r4['email'];
	//echo "<br>";	
	/*
if(mail($toILSO,$subjecto,$ILSO,$headerso)){
echo "mail gaya";
}else{
echo "fail";
} */
}
?>
<a class='hidden' href='http://iskillsolympiad.com/images/rgform.png'>Download Registration Form</a><br/>

<!----Label Generate Here start---->
<?php
for($x=0;$x<=10;$x++){
echo "";
$by='post';
$q1=mysqli_query($con,"Select * from nluser where sendby='$by' limit 1,10");

$tho='Principal';
//$q1=mysqli_query($con,"Select * from labels limit 243,100");
while($r1=mysqli_fetch_array($q1)){
echo "<div class='col-lg-4 col-sm-4 col-md-4'>";
echo "<b>From : </b> Newzworm : C-402, 4th Floor, Nirvana Courtyard, Sector 50, Nirvana Country, Gurugram, HR, Gurugram, Haryana 122018<br/>";

echo "<b>To </b> : ".$r1['name']."<br/>";
//echo "<b>To </b> : ".$r1['too']."<br/>";
echo "<b>Parent's Name</b> : ".$r1['parents_name']."<br/>";

echo "<b>Address</b> : ".$r1['address']."<br/>".$r1['city']." ".$r1['country']." ".$r1['code']."<br/><hr/>";
//echo "<b>Address</b> : ".$r1['address']."<br/>".$r1['contact']."<br/><hr/>";
echo "</div>";
}
echo "";

}

//session_start();

if(isset($_POST['tz'])){
$timezone=$_POST['txl'];
date_default_timezone_set($timezone);
//echo date('d-m-s');
echo "<h3>Date : ".date("H:i:s")."</h3>";
echo "<br/>";
echo "<h3>Time : ".date("d.m.Y")."<h3>";
$_SESSION['tz']=$timezone;
}
$tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
//print_r($tzlist);
?>
<!--div class='col-lg-4'>
<form method='post' class='form' action=''>
<select class='form-control' name='txl'>
<?php
$x=0;
while($tzlist[$x]){ ?>
<option <?php //echo ($tzlist[$x]==$_SESSION['tz'])?"selected":"" ?>
value='<?php echo $tzlist[$x]; ?>'><?php echo $tzlist[$x]; ?></option>";
<?php
$x++;
} ?>
<input class='btn' type='submit' name='tz'>
</select>
</form>
</div-->
<script src="https://www.gstatic.com/firebasejs/4.6.2/firebase.js"></script>
<script>
// Initialize Firebase
var config = {
apiKey: "AIzaSyBL6OMMKsjmoUiQz3ShM_TEPOb9AAyXTDE",
authDomain: "newzworm-436cf.firebaseapp.com",
databaseURL: "https://newzworm-436cf.firebaseio.com",
projectId: "newzworm-436cf",
storageBucket: "newzworm-436cf.appspot.com",
messagingSenderId: "152855713965"
};
firebase.initializeApp(config);

const messaging= firebase.messaging();
messaging.requestPermission()
.then(function(){
console.log('have Permission');
return messaging.getToken();

})

.then(function(token){
console.log(token);
})

.catch(function(err){
console.log('Error Occured'+ err );
})

messaging.onMessage(function(payload){
console.log('onMessage: ', payload)
})
</script>
<!--Label Generate Here End->

<hr/>
<form enctype='multipart/form-data' method='post' action=''>
<input type='file' name='filll'/>
<input type='submit' name='filsub'/>
</form>
</body>
</html>
<-->
<?php
if(isset($_POST['filsub'])){
$file_name=$_FILES['filll']['name'];
$tmp_name=$_FILES['filll']['tmp_name'];
$path="add/";
$to='Principal';
move_uploaded_file($tmp_name,"$path/$file_name");
$file=fopen("$path/ggn.txt","r");
while(!feof($file)){
$cont=trim(fgets($file));
$q3=mysqli_query($con,"Select * from emails where email='$cont')");
if($r3=mysqli_num_rows($q3)==0){
$q4=mysqli_query($con,"insert into emails (email) values('$cont')");
if($q4){
echo "done";
}	
}
//$q4=mysqli_query($con,"insert into labels (too,address) values('$to','$cont')");
}
}
date_default_timezone_set('Asia/Kolkata');
echo $date = date("H:i:s");
echo $time = date("d.m.Y");

/*
https://www.newzworm.com/paymentof.php?student_name=sedfas&parent_email=Vesn@gmail.com&parent_name=fsfsdfs
*/
?>
<!--

#newzworm #news #updates #NewsForKids

Abhinav 8130525651
payments.helpdesk@paytm.com
deepti 8218175329
madhav 8800675875
moshin 9953320613

paytm Merchant  0120-33663377
SUM 9243113113

MID : 4934580
Key : rjQUPktU
Salt : e5iIg1jwi8

Below is the test card details for doing a test transaction in the testing mode.

Card No - 5123456789012346
Expiry - 05/2020
CVV - 123
Name - Test
236213775
radhika 9205516511
DESKTOP-6QPJQJ5
himansh@123
skillizen@123!
pranav aws 9871420808
-->