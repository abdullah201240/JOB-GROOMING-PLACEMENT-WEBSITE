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


?>







<!DOCTYPE html>
<html>

<head>
  <title>Vacancy List</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@300;500&family=Roboto&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>

  <!-- Navigation Bar -->
  <div class="topnav">
    <a href="#" class="active">
      <img src="images/logo.png" alt="logo" class="logo-image">
    </a>
    <a href="home.php"><i class="fa fa-home"></i> Home</a>
    <a href="form.php"><i class="far fa-clipboard"></i> Job Vacancy</a>
    <a href="vacancy.php"><i class="fa fa-list-alt"></i> Vacancy List</a>
    <a href="apply.php"><i class="fas fa-clipboard-list"></i> Apply List</a>


    <div style="margin-left: 34%;">
      <input style="box-shadow: 0px 1px 3px 3px #0e0c3d; width: 300px;" class="form-control font-bold" id="myInput"
        type="text" placeholder="Search..." onkeyup="search()">
    </div>

    <div class="popup-card">
      <button class="topavatar-button" onclick="showPopup()">
        <img src="<?php echo $img ?>" class="topavatar avatar-overlay" alt="Overlay Avatar">
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

  <div class="container" id="jobList">

    <h1
      style="background: linear-gradient(90deg, rgba(0,88,208,0.9024859943977591) 0%, rgba(133,69,252,0.9136904761904762) 50%, rgba(222,199,47,0.7792366946778712) 100%); text-align:center; font-weight:bolder;">
      Job List</h1>
    <table class="table table-bordered text-center">
      <tr style="background-color: #6a5396; color: white;">
        <td>Job ID</td>
        <td>Company</td>
        <td>Vacancy</td>
        <td>Job Type</td>
        <td>Location</td>
        <td>Working Day</td>
        <td>Working Hour</td>
        <td>Holiday</td>
        <td>Salary</td>
        <td>Status</td>
        <td>Action</td>
        <td>Applicant</td>
      </tr>
      <tr>
        <?php
        $sql = "SELECT * FROM `vacancy` WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $i = 1;
        while ($row = mysqli_fetch_array($result)) {
          $id = $row["id"];
          ?>
          <tbody style="background-color: #dcd2fc;" id="myTable">

            <td>
              <?php echo $i; ?>
            </td>
            <td>
              <?php echo $row['Company_Name'] ?>
            </td>
            <td>
              <?php echo $row['Vacancy'] ?>
            </td>
            <td>
              <?php echo $row['Job_Type'] ?>
            </td>
            <td>
              <?php echo $row['Location'] ?>
            </td>
            <td>
              <?php echo $row['Working_day'] ?>
            </td>
            <td>
              <?php echo $row['Working_hour'] ?>
            </td>
            <td>
              <?php echo $row['Holiday'] ?>
            </td>
            <td>
              <?php echo $row['Salary'] ?>
            </td>
            <td>
              <?php echo $row['status'] ?>
            </td>
            <td>
              <?php echo "<a href='vacancydelete.php?id=$id'><button type='button' class='btn btn-danger'>Delete</button></a></td>" ?>


            <td>
              <button class="btn btn-primary" onclick="showApplicantList(<?php echo $id ?>)">View</button>
            </td>
            <?php $i = $i + 1;
        } ?>
        </tbody>
      </tr>
    </table>
  </div>

  <div class="container" id="applicantList" style="display: none;">
    <div style="display: flex; align-items: center; justify-content: center;">
      <button id="back" onclick="goBack()">Job List</button>
    </div>
    <hr>

    <h1
      style="background: linear-gradient(90deg, rgba(0,88,208,0.9024859943977591) 0%, rgba(133,69,252,0.9136904761904762) 50%, rgba(222,199,47,0.7792366946778712) 100%); text-align:center; font-weight:bolder;">
      Applicant List</h1>
    <table class="table table-bordered text-center" id="myTable">
      <thead>
        <tr style="background-color: #6a5396; color: white;">
          <td>User ID</td>
          <td>Name</td>
          <td>Address</td>
          <td>Email</td>

          <td>CV</td>

        </tr>
      </thead>
      <tr>
        <tbody style="background-color: #e2d4fa;">

         

        </tbody>
      </tr>
    </table>

  </div>

  <footer>
    <p class="p-3 bg-gray text-center">2023 All Rights Reserved. Design by Team ECHO</p>
  </footer>



  <script>

    function showApplicantList(id) {
      var jobList = document.getElementById("jobList");
      var applicantList = document.getElementById("applicantList");

      jobList.style.display = "none";
      applicantList.style.display = "block";


      $(document).ready(function () {
        // Function to fetch and populate table data
        function fetchTableData() {
          var parameter1 = id;
          $.ajax({
            url: 'showdata.php?param1=' + parameter1,
            type: 'GET',
            success: function (response) {
              // Update the table with the received data
              $('#myTable tbody').html(response);
            }
          });
        }



        // Initial load of the table data
        fetchTableData();




      });







    }

    function goBack() {
      var jobList = document.getElementById("jobList");
      var applicantList = document.getElementById("applicantList");

      jobList.style.display = "block";
      applicantList.style.display = "none";
    }

    $(document).ready(function () {
      $("#myInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function () {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

  </script>

  <style>
    /* General Styles */
    body {
      margin: 0;
      padding: 0;
      font-family: 'Roboto', sans-serif;
      background: #f0f3fa;
    }

    .container {
      justify-content: center;
      align-items: center;
      padding: 20px;
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
      padding: 10px;
      height: 40px;
      position: fixed;
    }

    td,
    tr,
    th {
      text-align: center;
      padding: 8px;
      border: 1px solid #848191 !important;
    }

    #back {
      background-color: #0058d0;
      border-radius: 20px;
      font-size: 17px;
      color: white;
      width: 100px;
      height: 50px;
      border: 3px solid #dec72f;
      text-decoration: underline;
    }

    #back:hover {
      background-color: grey;
    }
  </style>
</body>

</html>