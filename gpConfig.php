<?php
//Include Google client library 
require_once 'src/Google_Client.php';
require_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '578250057590-fqdb229bnp11s1vl89ncp11rj7qr141a.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'GhRFzFWQU6oZux4rjqm2N-05'; //Google client secret
$redirectURL = 'https://www.newzworm.com'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to Skillizen.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>