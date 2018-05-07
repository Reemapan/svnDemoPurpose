<?php
include_once 'fb/inc/facebook.php';
//include_once 'fb/User.php';

$redirectURI = 'http://www.newzworm.com'; // Callback URL
$redirectURI = 'http://localhost/himanshu/newzworm/'; // Callback URL

$facebook = new Facebook(array(
  'appId'  => '1522812711080286',
  'secret' => '65b21855f11e94943043d1e5f1c4473d'
));
$fbUser = $facebook->getUser();

if($fbUser){
	$fuser=$facebook->api("/me","GET");
 $session_ad="{$fuser['name']}";
 "<br>";
	 session_start();
	 //Put user data into session
	 $_SESSION["value"] = "123123123qwe";
 	 $_SESSION["name"]= $session_ad;
}
else{
	$fbUser = NULL;
	$loginUR = $facebook->getLoginUrl(array($redirectURI,'scope'=>'email'));
	echo $outpu = "<a href='".$loginUR."'><div class='btn-group btn-group-justified btn btn-danger ab'> Facebook</div></a>";
}
?>
