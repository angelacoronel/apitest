<?php
require_once 'vendor/autoload.php';
$google_client = new Google_Client();
$google_client->setClientId('404566657343-8vuefhffu82dik7hg7g1g6lukmo3dr53.apps.googleusercontent.com');
$google_client->setClientSecret('C6-WypdO-TuLJXNY1JCPQCRI');
$google_client->setRedirectUri('https://apitest-ledesma.herokuapp.com/');
$google_client->addScope('email');
$google_client->addScope('profile');

session_start();
?>
