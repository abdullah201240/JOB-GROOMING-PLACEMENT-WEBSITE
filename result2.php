<?php

session_start();
$email=$_SESSION['user_email'];
include 'db.php';
  $sql="SELECT * FROM `users` WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
	$data = $result->fetch_assoc() ;
	$num = mysqli_num_rows($result);
	if ($num == 1){
    $name=$data['name'];

$img=$data['image'];
   

  }


?>






<!DOCTYPE html>
<html>
<head>
  <title>Job Post</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@300;500&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


</head>
<body>

  <!-- Navigation Bar -->
  <div class="topnav">
    <a href="home.php" class="active">
      <img src="images/logo.png" alt="logo" class="logo-image">
    </a>
    <a href="home.php"><i class="fa fa-home"></i> Home</a>
    <a href="vacancy.php"><i class="far fa-clipboard"></i> Job Vacancy</a>

    <div class="popup-card">
      <button class="topavatar-button" onclick="showPopup()">
        <img src="<?php echo$img ?>" class="topavatar avatar-overlay" alt="Overlay Avatar">
      </button>
      <div class="popup-content" id="popupContent">
        <a href="profile.php"><i class="fa fa-user"></i> See Profile</a>
        <hr>
        <a href="index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </div>
    </div>
  </div>

<div class="container">
<h1  class=h1; style="color:#e60206; font-size: xxx-large;">Opps <i class="far fa-frown-open" style="color: #f00000;"></i></h1>
<p class=p1; style="color:#e60206 ; font-size: xx-large;">You got <?php
$s=$s-1;
$mark=$k/$s;

$mark=$mark*100;
echo$mark?>% marks</p>
<p class=p1; style="color:#4CAF50; font-size: xx-large;">At least you need 80% marks for applys</p>
<p class=p2; style="color:black ; font-size: xx-large;">Suggested course for you ! </p>


  <div id="parent">
    <div class="child">
      <a href="#">  <img src="images/img2.png"></a>
    </div>
    <div class="child">
      <a href="#">  <img src="images/img1.jpg"></a>
    </div>
    <div class="child">
      <a href="#">  <img src="images/img3.jpg"></a>
    </div>

</div>

</div>



  <script>
    function showPopup() {
      var popupContent = document.getElementById("popupContent");
      popupContent.classList.toggle("show");
    }

    // Close the popup when clicking outside of it
    window.addEventListener('click', function(event) {
      var popupContent = document.getElementById("popupContent");
      if (!event.target.matches('.popup-card') && !event.target.matches('.topavatar') && !event.target.matches('.avatar-overlay')) {
        if (popupContent.classList.contains('show')) {
          popupContent.classList.remove('show');
        }
      }
    });
    </script>


</body>

<style>
  /* General Styles */
  body {
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    background: #f0f3fa;
  }

  .profile-image-overlay {
    position: absolute;
    bottom: -5px;
    left: 25%;
    transform: translateX(-50%);
    background-color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    z-index: 1;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .profile-image img.avatar-overlay {
    position: absolute;
    bottom: -5px;
    left: 25%;
    transform: translateX(-50%);
    width: 60px;
    height: 60px;
    border-radius: 50%;
    z-index: 2;
  }

  .topnav {
    position: relative;
    align-items: center;
    box-sizing: border-box;
    height: 60px;
    background: #D9D9D9;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
    display: flex;
  }


  .topnav a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 10px 14px;
    text-decoration: none;
    font-size: 17px;
    border-radius: 20px;
    background-color: #333;
    transition: background-color 0.3s ease;
    margin: 0 5px;
  }

  .topnav a:hover {
    background-color: #555;
  }


  .topnav a.active {
    background-color: #D9D9D9;
    color: white;
  }

  .topnav .logo-image {
    width: 50px;
    height: 32px;
    border-radius: 2px;
    display: flex;
  }

    .topavatar {
      position: relative;
      width: 50px;
      height: 50px;
      margin-right: 10px;
      border-radius: 50%;
      border: 2px solid #ccc;
    }

    .popup-card {
      position: relative;
      display: inline-block;
      z-index: 1;
      margin-left: auto;
    }

    .popup-content {
      position: absolute;
      background-color: black;
      min-width: 120px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      padding: 10px;
      z-index: 3;
      right: 0;
      display: none; /* Hide the popup content by default */
      flex-direction: column;
      white-space: nowrap;
      overflow: hidden;
      max-width: 150px; /* Adjust the max-width as needed */
    }

    .popup-content a {
      padding: inherit;
      text-decoration: none;
      color: white;
      background: none;
    }

    .popup-content a:hover {
      background-color: #555;
      border-radius: 0%;
    }

    .popup-content.show {
      display: block;
      border-radius: 0%;
    }

    .topavatar-button {
      background: none;
      border: none;
      padding: 0;
      cursor: pointer;
    }
  .container {
    text-align: center;
  }
    .h1 {
      text-align: center;
    }
    .p1 {
      text-align: center;
    }
    .p2 {
      text-align: center;
    }

    .btn{
        background-color:#46f0a0;
        color:black;
        font-weight: bold;
        height: 50px;
        width: 150px;
        border:2px solid white;
        border-radius: 20px;
        box-shadow: 0 8px 16px rgba(10,10,100,0.5);
    }

    #parent {
      display: grid;
      justify-content: center;
      align-items: center;
      grid-template-columns: repeat(3, 1fr);
      margin-top: 4%;
    }

    .child {
      height: 260px;
      width: 300px;
      border: 2px solid  #0e0c3d;
      border-radius: 15px;
      background-color: #D9D9D9;
      box-shadow: 0 8px 16px 0 rgba(80, 80, 138, 0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto;
      overflow: hidden;
    }

    .child:hover {
        opacity: 0.5;
      }


      .child img {
        height: 260px;
        width: 300px;
        justify-content: center;
        display: flex;
      }

  </style>

</html>
