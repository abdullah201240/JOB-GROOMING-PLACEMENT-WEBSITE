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
  $email = $data['email'];
  $phone = $data['phone'];
  $id = $data['id'];
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $phone = $_POST['phone'];
  $img_name = $_FILES['file']['name'];
  $tmp_name = $_FILES['file']['tmp_name'];
  $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
  $img_ex_lc = strtolower($img_ex);
  $allowed_exs = array("jpg", "jpeg", "png");
  if (in_array($img_ex_lc, $allowed_exs)) {
    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
    $img_upload_path = 'uploads/' . $new_img_name;
    move_uploaded_file($tmp_name, $img_upload_path);
    $sql = "UPDATE `users` SET `name`='$name',`phone`='$phone',image='$img_upload_path' WHERE id='$id'";
    mysqli_query($conn, $sql);
  }
  $sql = "UPDATE `users` SET `name`='$name',`phone`='$phone' WHERE id='$id'";
    mysqli_query($conn, $sql);
}

?>



<!DOCTYPE html>
<html>

<head>
  <title>Edit Profile</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@300;500&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
    <div class="topnav-right">

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
  </div>




  <div class="container">
    <div class="card">
      <div class="col-md-3">
        <div class="text-center">
          <img src="<?php echo $img ?>" class="avatar img-circle img-thumbnail" alt="avatar">
          <h6>Upload a different photo...</h6>
          <input type="file" class="form-control">
        </div>
        <br>
        <button class="btn btn-primary btn-round btn-light-blue" type="submit">Save Changes</button>
      </div>
      <div class="col-md-9">
        <h2 style="background-color: #0e0c3d; color: white; padding: 10px; display: inline-block; width: fit-content;"><?php echo $name ?></h2>
        <p><strong>Email:</strong> <?php echo $email ?></p>
        <p><strong>Phone:</strong> <?php echo $phone ?></p>
        <br>
        <br>
        <button type="button" style="width:200px" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Edit</button>

      </div>
    </div>
  </div>

  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          <center>
            <div class="modal-body">
              <h1>Image</h1>

              <img src="<?php echo $img ?>" alt="" height="100px" width="100px">
              <br>
              <input type="file" name='file' value="<?php echo $img ?>">

              <h1>Name</h1>
              <input type="text" name='name' value="<?php echo $name ?>">
              <h1>Phone</h1>
              <input type="text" name='phone' value="<?php echo $phone ?>">

            </div>
          </center>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
  </div>

  <footer>
    <p class="p-3 bg-gray text-center">2023 All Rights Reserved. Design by Team ECHO</p>
  </footer>

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
  <style>
    /* General Styles */
    body {
      margin: 0;
      padding: 0;
      font-family: 'Roboto', sans-serif;
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
      border: 2px solid grey;
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

    .topnav-right {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      /* Align items to the right */
      margin-left: auto;
      margin-right: 16px;
    }

    .topnav-right a {
      margin-left: 10px;

    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: #555;
    }

    .card {
      width: 100%;
      max-width: 600px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.9);
      border-radius: 6px;
      padding: 20px;
      background: #D9D9D9;
      margin-bottom: 100px;
    }

    @media (min-width: 768px) {
      .card {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        gap: 20px;
      }

      .card .col-md-3 {
        flex: 0 0 auto;
        width: 30%;
        max-width: 30%;
      }

      .card .col-md-9 {
        flex: 0 0 auto;
        width: 70%;
        max-width: 70%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-top: 8%;
        margin-left: 5%;
      }

    }

    .avatar {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
    }

    .btn {
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      height: 40px;
      font-weight: 600;
    }

    .btn:hover {
      background-color: #555;
      /* Add hover background color */
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
  </style>
</body>

</html>