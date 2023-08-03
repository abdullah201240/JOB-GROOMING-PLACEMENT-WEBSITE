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
  <title>Home</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@300;500&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



</head>
<body>

  <!-- Navigation Bar -->
  <div class="topnav">
    <a href="home.php" class="active">
      <img src="images/logo.png" alt="logo" class="logo-image">
    </a>
    <a href="home.php"><i class="fa fa-home"></i> Home</a>
    <a href="form.php"><i class="far fa-clipboard"></i> Job Vacancy</a>
    <a href="vacancy.php"><i class="fa fa-list-alt"></i> Vacancy List</a>
    <a href="apply.php"><i class="fas fa-clipboard-list"></i> Apply List</a>


    <div style="margin-left: 32%;">
      <input style="box-shadow: 0px 1px 3px 3px #0e0c3d; width: 300px;" class="form-control font-bold" id="myInput" type="text" placeholder="Search..." onkeyup="search()">
    </div>

    <div class="popup-card">
      <button class="topavatar-button" onclick="showPopup()">
        <img src="<?php echo$img ?>" class="topavatar avatar-overlay" alt="<?php echo$img ?>">
      </button>
      <div class="popup-content" id="popupContent">
        <a href="profile.php"><i class="fa fa-user"></i> See Profile</a>
        <hr>
        <a href="index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
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

  <!-- Main Content -->
  <div class="container">
    <!-- Left Column - Profile Card -->
    <div class="left-column">
      <div class="profile-card">
        <div class="profile-body">
          <div class="profile-image">
            <img src="<?php echo$img ?>" class="avatar" alt="Avatar">
            <div class="profile-image-overlay"></div>
            <img src="<?php echo$img ?>" class="avatar avatar-overlay" alt="Overlay Avatar">
            <span class="profile-name"><?php echo$name ?></span>
          </div>
        </div>
      </div>

      <div class="about-section">
        <div class="about-card">
          <div class="about-header">
            <p>About</p>
          </div>
          <div class="about-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum lorem eu justo congue, sit amet consequat elit ullamcorper.</p>
          </div>
        </div>
      </div>
      <br>
    </div>
    <div class="post post-card-shadow">
    <?php
    $sql = "SELECT * FROM `vacancy` WHERE `status`='Accept'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) {
      $id=$row['id'];

      $sql1="SELECT COUNT(`jobid`) as number FROM `question` WHERE `jobid`='$id'";
      $result1 = mysqli_query($conn, $sql1);
      while ($row1 = mysqli_fetch_array($result1)) {
        $number=$row1['number'];
        
      }


    ?>

    <!-- Center Column - Job Post -->
    
      <div class="post-header">
        <img src="./images/280754006_3191186317805391_3647170404101630606_n.jpg" alt="Company Logo" class="company-logo">
       <h2>Abdullah Al Sakib</h2>
      </div>

      <div class="post-info">
      <h2> Company Name:<?php  echo$row['Company_Name'] ?></h2>
        <h4>POSITION: <?php echo$row['Job_Type']?></h4>
        <p>Vacancy: <?php echo$row['Vacancy']?></p>
        <p>Working day: <?php echo$row['Working_day']?></p>
        <p>Working hour: <?php echo$row['Working_hour']?></p>
        <p>Holiday: <?php echo$row['Holiday']  ?></p>
        <p>Salary: <?php echo$row['Salary']  ?></p>
        <p><?php echo$row['Details']?></p>
        
      </div>

      <div class="post-content">
        <img src="<?php echo$row['image']?>" alt="Job Image" class="job-image">
      </div>
      <div class="post-footer">
        <button class="apply-button" onclick="apply(<?php echo $row['time']?>,<?php echo $number; ?>,<?php echo$row['id'] ?>)">Apply Now</button>
      </div>
    
   
    <?php } ?>
    </div>

    <div id="popup" class="popup">
      <div class="popupcontent">
        <span class="close-button" onclick="closePopup()">&times;</span>
        <h3>Quiz Information</h3>
        <p>Total MCQs: <span id="mcqCount"></span></p>
        <p>Time Limit: <span id="timeLimit"></span> minutes</p>
        
        
        <form action="mcq.php" method="post"  >
        <input type="text" name="jobid" id="demo" hidden>
        <button class="start-button" id="stbtn">&nbspStart Quiz&nbsp</button>
        </form> 
        
      </div>
    </div>

    <!-- Right Column - Advertisement Cards -->
    <div class="right-column">
    <div class="advertisement-card">
      <div class="alert-icon">
        <i class="fas fa-exclamation-circle"></i>
      </div>
      <h3>Advertisement 1</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <a href="#" class="read-more-link">Read More</a>
    </div>

    <div class="advertisement-card">
      <div class="alert-icon">
        <i class="fas fa-exclamation-circle"></i>
      </div>
      <h3>Advertisement 2</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <a href="#" class="read-more-link">Read More</a>
    </div>
  </div>
  </div>

    <footer>
      <p class="p-3 bg-gray text-center">2023 All Rights Reserved. Design by Team ECHO</p>
    </footer>


    <script>
      function apply(time,number,id){
      

        var mcqCount = number;
        var timeLimit = time;
        var inputField = document.getElementById("demo");
      
          inputField.value = id;

        $("#mcqCount").text(mcqCount);
        $("#timeLimit").text(timeLimit);

        $("#popup").css("display", "block");
      

      
    }
    function closePopup() {
        $("#popup").css("display", "none");
      }
    </script>

  <script>
    function search() {

      var searchInput = document.getElementById("myInput").value.toLowerCase();

      var elements = document.getElementsByClassName("post");
      var cards = document.getElementsByClassName("advertisement-card");

      // Loop through the elements and check if the search input matches the content
      for (var i = 0; i < elements.length; i++) {
        var content = elements[i].innerText.toLowerCase();
        if (content.includes(searchInput)) {
          elements[i].style.display = "block";
        } else {
          elements[i].style.display = "none";
        }
      }

      // Loop through the advertisement cards and check if the search input matches the content
      for (var i = 0; i < cards.length; i++) {
        var content = cards[i].innerText.toLowerCase();
        if (content.includes(searchInput)) {
          cards[i].style.display = "block";
        } else {
          cards[i].style.display = "none";
        }
      }
    }
  </script>
  <style>
  /* General Styles */
  body {
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
  }

  .container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 20px;
  }

  /* Left Column */
  .left-column {
    flex-basis: 25%;
    margin-right: 20px;
  }


  /* Right Column */
  .right-column {
    flex-basis: 25%;
    margin-left: 20px;
  }

  .advertisement-card {
    background-color: #F6F6F6;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    position: relative;
    margin: 20px 20px;
  }

  .advertisement-card .alert-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    color: black;
  }


  .read-more-link {
    color: blue;
    text-decoration: none;
  }

  .read-more-link:hover {
    text-decoration: underline;
  }

  /* Post */
  .post {
    flex-basis: 50%;
    border: 1px solid #ccc;
    background-color: #F6F6F6;
    border-radius: 5px;
    padding: 10px;
  }

  .post-info {
    flex-grow: 1;
    margin: 0 20px;
  }

  .post-info h4 {
    font-family: 'Inter Tight', sans-serif;
    margin: 1px 0;
  }

  .post-info p {
    font-family: 'Inter', sans-serif;
    margin: 5px 0;
  }
  .post-header {
    display: flex;
    align-items: center;
    margin: 0 20px;
  }

  .post-header .company-logo {
    width: 50px;
    height: 50px;
    margin-right: 10px;
    border-radius: 50%;
  }

  .post-content {
    margin-top: 10px;
    margin: 0 20px;
  }

  .job-image {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
  }

  .post-footer {
    margin-top: 10px;
    text-align: right;
  }

  .apply-button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin: 0 20px;
  }

  .apply-button:hover {
    background-color: #45a049;
  }

  .edit-profile-button {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 8px 16px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .edit-profile-button:hover {
    background-color: #45a049;
  }

  .profile-card {
    background-color: #F6F6F6;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border: 1px solid #ccc;
    margin: 0 20px;
  }

  .profile-image {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .profile-image img {
    width: 80%;
    height: auto;

  }

  .profile-name {
    margin-top: 10px;
    font-weight: bolder;
    padding-left: 50px;
  }


  .profile-image-overlay {
    position: absolute;
    bottom: -5px;
    left: 25%;
    transform: translateX(-50%);
    background-color: white;
    width: 60px; /* Updated width */
    height: 60px; /* Updated height */
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

  .post-card-shadow {
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  .about-section {
    margin-top: 20px;
  }

  .about-card {
    border-radius: 5px;
    background-color: #F6F6F6;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border: 1px solid #ccc;
    margin: 0 20px;
  }

  .about-header {
    background-color: #D9D9D9;
    padding: 10px;
    text-align: center;
  }

  .about-header p {
    margin: 0;
    font-weight: bold;
  }

  .about-body {
    text-align: center;
    background-color: #F6F6F6;
    margin: 0 10px;
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
    padding: 12px 14px;
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

  .topnav input[type=text] {
    padding: 6px;
    margin-top: 8px;
    font-size: 17px;
    border: none;
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
      display: none;
      flex-direction: column;
      white-space: nowrap;
      overflow: hidden;
      max-width: 150px;
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

    footer {
      background-color: #D9D9D9;
      color: black;
      text-align: center;
      bottom: 0;
      width: 100%;
      padding: 2px;
      height: 40px;
    }

    .popup {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 9999;
    }

    .popupcontent {
      background-color: #fff;
      width: 300px;
      height: 200px;
      padding: 20px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
    }

    .close-button {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 24px;
      cursor: pointer;
    }

    #stbtn{
      height: 42px;
      color: white;
      text-align: center;
      font-size: 17px;
      border-radius: 20px;
      background-color: #303670;
      transition: background-color 0.3s ease;
    }
    #stbtn:hover{
      background-color: #555;
    }
  </style>

</body>
</html>
