<?php

include('google/config.php');
include('fb/config.php');
$google_client->revokeToken();
session_destroy();
header('location:index.php');

?>
