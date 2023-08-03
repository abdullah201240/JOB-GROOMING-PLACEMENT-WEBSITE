<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'vendor/autoload.php';

// init configuration
$clientID = '549644313500-deobaf7q3spkc7rvkr8uj2297g0utaqe.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/web/vlogin.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
  $id=  $google_account_info->id;
  $picture=  $google_account_info->picture;
  
  include 'db.php';
  $sql="SELECT * FROM `users` WHERE email='$email'";
  
  $result = mysqli_query($conn, $sql);
	$data = $result->fetch_assoc() ;
	$num = mysqli_num_rows($result);
	if ($num == 1){
        session_start();
    $_SESSION['user_email'] = $email ;
    header("location: home.php");
   

  }

  
  else{
    $sql1="INSERT INTO `users`( `name`, `email`,  `token`, `image`,password,phone) VALUES ('$name','$email','$id','$picture','','')";
    mysqli_query($conn, $sql1);
    session_start();
    $_SESSION['user_email'] = $email ;
    

    header("location: home.php");
  }

 

  // now you can use this profile info to create account in your website and make user logged in.
} 
?>