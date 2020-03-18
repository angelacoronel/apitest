<?php //------ credits: john paul maja :D <3 

require_once 'vendor/autoload.php';

if (!session_id())
{
    session_start();
}

// Call Facebook API 

$facebook = new \Facebook\Facebook([
  'app_id'      => '568286157120937',
  'app_secret'     => '1e3a40ac75b79a33fbf48f70731d4616',
  'default_graph_version'  => 'v2.10'
]);

?>