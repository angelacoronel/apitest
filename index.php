<?php

$module = (isset($_GET['module']) && $_GET['module'] != '') ? $_GET['module'] : '';
$page = !isset($_GET['page']) ? 1 : $_GET['page'];

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
<html>
<head>
<style>
    body{
        background-color: #212529;
        color: #fff;
    }
	table{
		border: 0px solid blue;
		width: 100%;
		text-align: center;
		
	}
	th, td{
		border: 1px solid #ddd;
		padding: 10px;

	}
	.head{
		background-color: #45a29e;
		color: #1f2833;
		font-weight: bold;
	}
	tr:nth-child(even) {background-color: #141a20;}
	a {
		color: #66fcf1;
	}
	select{
		height: 2rem;
	}
	</style>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body id="bodyfit">
<div id="wrap-admin">
            <div class="sticky-content">
                <h2 class="welcomeheader">API Test</h2>
                <div class="empty-small"></div>
                <ul>
                    <li><a href="index.php?module=home">Home</a></li>  
                    <li><a href="index.php?module=prod">Products</a></li>
                    <li><a href="index.php?module=cat">Categories</a></a></li> 
                    &ensp; 
                </ul>
</div>
<div id="content-admin">
   <div id="empty-content-admin"></div>
       <div id="content-admin-wrap">
<?php
        if($login_button == ''){
        switch($module){
            
            case 'prod':
                require_once 'prodList.php';
            break;
            case 'home':
                require_once 'home.php';
            break;
            case 'product':
                require_once 'prodData.php';
            break;
            case 'addProd':
                require_once 'addProd.php';
            break;
            case 'editProd':
                require_once 'editProd.php';
            break;
            case 'deleteProd':
                require_once 'deleteProd_pro.php';
            break;
            case 'cat':
                require_once 'catList.php';
            break;
            case 'catData':
                require_once 'catData.php';
            break;
            default:
                require_once 'home.php';
            break;
            }
        }else{
            echo '<div align="center">'.$login_button . '</div>';
          }
        ?>
        </div>
        </div>
</body>
</html>
