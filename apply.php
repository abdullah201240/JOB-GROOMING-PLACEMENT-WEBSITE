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
  $uid = $data['id'];


}


?>





<!DOCTYPE html>
<html>

<head>
  <title>Apply List</title>
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

  <div class="container">

    <h1
      style="background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(104,45,253,0.8772759103641457) 100%); text-align:center; font-weight:bolder;">
      Apply List</h1>
    <table class="table table-bordered text-center">
      <tr style="background-color: #172e7a; color: white;">
        <td>User ID</td>
        <td>Name</td>
        <td>Address</td>
        <td>Email</td>
        <td>Image</td>
        <td>CV</td>
        <td>Remove</td>

      </tr>
      <?php
      $sql = "SELECT * FROM `apply` WHERE uid='$uid'";
      $result = mysqli_query($conn, $sql);
      $i = 1;
      while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];




        ?>
        <tr>
          <tbody style="background-color: #dcd2fc;" id="myTable">
            <td>
              <?php echo $i; ?>
            </td>
            <td>
              <?php echo $row['name']; ?>
            </td>
            <td>
              <?php echo $row['address']; ?>
            </td>
            <td>
              <?php echo $row['email']; ?>
            </td>
            <td><img src="<?php echo $row['image'] ?>" alt="<?php echo $row['name']; ?>" height="100px" weight="100px"></td>
            <td><a href="<?php echo $row['cv']; ?>">CV</a></td>
            <td><?php echo"<a href='applyremove.php?id=$id'><button type='button' class='btn btn-danger'>Remove</button></a>"?></td>
          </tbody>
        </tr>
      <?php  $i=$i+1;} ?>
    </table>

  </div>

  <footer>
    <p class="p-3 bg-gray text-center">2023 All Rights Reserved. Design by Team ECHO</p>
  </footer>



  <script>
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
  </style>
</body>

</html>