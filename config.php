<?php
include('google/config.php');

$login_button = '';

if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 
 if(!isset($token['error']))
 {

  $google_client->setAccessToken($token['access_token']);


  $_SESSION['access_token'] = $token['access_token'];

  $google_service = new Google_Service_Oauth2($google_client);


  $data = $google_service->userinfo->get();


  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}

if(!isset($_SESSION['access_token']))
{
 $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="sign-in-with-google.png" /></a>';
}
?>

<?php
include('fb/config.php');
$facebook_output = '';

$facebook_helper = $facebook->getRedirectLoginHelper();

if(isset($_GET['code'])){
 if(isset($_SESSION['access_token'])){
  $access_token = $_SESSION['access_token'];
 }else{
  $access_token = $facebook_helper->getAccessToken();
  $_SESSION['access_token'] = $access_token;
  $facebook->setDefaultAccessToken($_SESSION['access_token']);
 }
 $_SESSION['user_id'] = '';
 $_SESSION['user_name'] = '';
 $_SESSION['user_first_name'] = '';
 $_SESSION['user_last_name'] = '';
 $_SESSION['user_email_address'] = '';
 $_SESSION['user_image'] = '';
 $graph_response = $facebook->get("/me?fields=name,first_name,last_name,email", $access_token);
 $facebook_user_info = $graph_response->getGraphUser();
 if(!empty($facebook_user_info['id'])){
  $_SESSION['user_image'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
 }
 if(!empty($facebook_user_info['name'])){
  $_SESSION['user_name'] = $facebook_user_info['name'];
 }
 if(!empty($facebook_user_info['name'])){
  $_SESSION['user_first_name'] = $facebook_user_info['first_name'];
 }
 if(!empty($facebook_user_info['name'])){
  $_SESSION['user_last_name'] = $facebook_user_info['last_name'];
 }
 if(!empty($facebook_user_info['email'])){
  $_SESSION['user_email_address'] = $facebook_user_info['email'];
 }
}else{

    $permissions = ['email'];
    $facebook_login_url = $facebook_helper->getLoginUrl('https://apitest-ledesma.herokuapp.com/', $permissions);  
 
    $facebook_login_url = '<div align="center"><a href="'.$facebook_login_url.'"><img src="images/facebook.png" /></a></div>';
}

?>