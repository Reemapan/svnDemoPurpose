<?php
//Include Facebook SDK
require_once 'inc/facebook.php';

/*
 * Configuration and setup FB API
 */
$appId = '1522812711080286'; //Facebook App ID
$appSecret = '65b21855f11e94943043d1e5f1c4473d'; // Facebook App Secret
$redirectURL1 = 'http://newzworm.com'; //Callback URL
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));
$fbUser = $facebook->getUser();
?>