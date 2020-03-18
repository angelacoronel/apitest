<?php
require_once 'vendor/autoload.php';

//google ------ credits: john paul maja :D <3 
$google_client = new Google_Client();
$google_client->setClientId('947482041440-33e8qh9nlu3vemrq1brcp9jdbb1a582v.apps.googleusercontent.com');
$google_client->setClientSecret('ACl_dvm1FbABsfeSpnR9QxvX');
$google_client->setRedirectUri('https://localhost/etact-maja/index.php');
$google_client->addScope('email');
$google_client->addScope('profile');


session_start();
// credits: john paul majaaaaaa
?>
