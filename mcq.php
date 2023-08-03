<?php

session_start();
$email = $_SESSION['user_email'];
include 'db.php';
$sql = "SELECT * FROM `users` WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$data = $result->fetch_assoc();
$num = mysqli_num_rows($result);
if ($num == 1) {
  $name = $data['name'];

  $img = $data['image'];


}

$id = $_POST['jobid'];
?>




<!DOCTYPE html>
<html>

<head>
  <title>MCQ</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@300;500&family=Roboto&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script>@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");</script>



</head>

<body>

  <!-- Navigation Bar -->
  <div class="topnav">
    <a href="home.php" class="active">
      <img src="images/logo.png" alt="logo" class="logo-image">
    </a>
    <a href="home.php"><i class="fa fa-home"></i> Home</a>
    <a href="vacancy.php"><i class="far fa-clipboard"></i> Job Vacancy</a>
    <div class="search-container">
      <form action="/action_page.php">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
    <div class="popup-card">
      <button class="topavatar-button" onclick="showPopup()">
        <img src="<?php echo $img; ?>" class="topavatar avatar-overlay" alt="Overlay Avatar">
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
    window.addEventListener('click', function (event) {
      var popupContent = document.getElementById("popupContent");
      if (!event.target.matches('.popup-card') && !event.target.matches('.topavatar') && !event.target.matches('.avatar-overlay')) {
        if (popupContent.classList.contains('show')) {
          popupContent.classList.remove('show');
        }
      }
    });
  </script>

  <div class="container">

    <h1 style="font-size: xx-large; text-align: center; font-weight: bolder;" id="timer">Time <i class="bi bi-stopwatch"
        style="font-weight: bolder;"></i></h1>
    <br>
    <form action="mcqans.php" method="post">
      <input type="text" name="jobid" value="<?php echo $id ?>" hidden>
      <div id="parent">

        <?php
        $sql5 = "SELECT * FROM `vacancy` WHERE id='$id'";
        $result5 = mysqli_query($conn, $sql5);
        while ($row5 = mysqli_fetch_array($result5)) {
          $time=$row5['time'];
          $intValue = intval($time);
        }


        $i = 1;
        $sql = "SELECT * FROM `question` WHERE `jobid`='$id'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {




          ?>
          <div class="radio-group">
            <h3>Question
              <?php echo $i ?>:
            </h3>
            <p>
              <?php echo $row['question'] ?>
            </p>
            <div class="radio-option">
              <input type="radio" id="q1a" name="<?php echo $i ?>" value="<?php echo $row['option1'] ?>">
              <label for="q1a">A.
                <?php echo $row['option1'] ?>
              </label>
            </div>
            <div class="radio-option">
              <input type="radio" id="q1b" name="<?php echo $i ?>" value="<?php echo $row['option2'] ?>">
              <label for="q1b">B.
                <?php echo $row['option2'] ?>
              </label>
            </div>
            <div class="radio-option">
              <input type="radio" id="q1c" name="<?php echo $i ?>" value="<?php echo $row['option3'] ?>">
              <label for="q1c">C.
                <?php echo $row['option3'] ?>
              </label>
            </div>
            <div class="radio-option">
              <input type="radio" id="q1d" name="<?php echo $i ?>" value="<?php echo $row['option4'] ?>">
              <label for="q1d">D.
                <?php echo $row['option4'] ?>
              </label>
            </div>
          </div>
          <?php
          $i = $i + 1;
        } ?>
      </div>
      <br>
      <br>
      <button class="submit-button" type="submit">Submit</button>
  </div>
  </form>
 
  <script>
    var times=<?php echo $intValue ; ?>;
    console.log(times);
    var timerDisplay = document.getElementById('timer');
    var totalSeconds = times * 60; // 10 minutes

    function updateTimer() {
      var minutes = Math.floor(totalSeconds / 60);
      var seconds = totalSeconds % 60;

      var formattedTime = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
      timerDisplay.textContent = formattedTime + "min";

      if (totalSeconds === 0) {
        clearInterval(intervalId);
        alert('Timer completed!');
      } else {
        totalSeconds--;
      }
    }

    var intervalId = setInterval(updateTimer, 1000);
  </script>








  <script>

    $(".submit-button").on("click", function () {
      var answers = {};

      $("input[type=checkbox]:checked").each(function () {
        var question = $(this).attr("name");
        var answer = $(this).val();
        answers[question] = answer;
      });
      console.log(answers);

      alert("Answers submitted successfully!");
    });
  </script>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Roboto', sans-serif;
    }

    .container {
      text-align: center;
    }

    .submit-button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin: 0 20px;
      font-weight: bold;
    }

    .submit-button:hover {
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
    }

    .profile-image-overlay {
      position: absolute;
      bottom: -5px;
      left: 25%;
      transform: translateX(-50%);
      background-color: white;
      width: 60px;
      /* Updated width */
      height: 60px;
      /* Updated height */
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
      padding: 14px 16px;
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

    .topnav .search-container {
      margin-left: auto;
      margin-right: 16px;
    }

    .topnav input[type=text] {
      padding: 6px;
      margin-top: 8px;
      font-size: 17px;
      border: none;
    }

    .topnav .search-container button {
      float: right;
      padding: 6px 10px;
      margin-top: 8px;
      margin-right: 16px;
      background: #555;
      font-size: 17px;
      border: none;
      cursor: pointer;
    }

    .topnav .search-container button:hover {
      background: grey;
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

    #parent {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      justify-content: center;
      grid-gap: 35px
    }

    .radio-option {
      display: flex;
      align-items: center;
      margin-bottom: 8px;
      margin: 0 0 8px 25%;
    }

    .radio-option input[type="radio"] {
      margin-right: 5px;
    }

    .radio-option label {
      display: inline-block;
      vertical-align: middle;
    }
  </style>
</body>

</html>