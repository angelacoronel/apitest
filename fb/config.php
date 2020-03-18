<?php

require_once 'vendor/autoload.php';

if (!session_id())
{
    session_start();
}

$facebook = new \Facebook\Facebook([
  'app_id'      => '1485657388278332',
  'app_secret'     => 'b409862b4dcb94ff4238acae4fc71939',
  'default_graph_version'  => 'v2.10'
]);

?>
